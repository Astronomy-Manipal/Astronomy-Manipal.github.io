<?php
global $config;
require_once("config/configure.php");
require_once("config/tables.php");

class MySqlDriver implements DB
{
	var $sql;
	var $rs;
	var $rq;
	var $numrows;
	var $limit;
    var $noofpage;
	var $offset;
	var $page;
	var $style;
	var $parameter;
	var $activestyle;
	var $buttonstyle;
	private $host;
	private $user;
	private $pass;
	private $database;
	private $cnx;

    function __construct() {
	    global $config; 
		$this->host = $config['server'];
		$this->user = $config['user'];
		$this->pass = $config['pass'];
		$this->database = $config['database'];
    	$this->cnx = mysqli_connect($this->host,$this->user,$this->pass,$this->database) or die("Cannot connect to MySQL" . mysqli_error());
    }	

	// Select Query
	function selectQry($table,$condition,$val,$limitS,$limitE) 
	{
		if(!$condition){
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table;
			else
				$sql="select * from ".$table." limit ".$limitS.", ".$limitE;
		}
		else {
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." where ".$condition;
			else
				$sql="select * from ".$table." where ".$condition." limit ".$limitS.", ".$limitE;
		}
		
		$rq = $this->fn_mysql_prepare_params($sql, $val);
		return $rq;
	}
	
	// Select With Order By Condition//////////////////////////////////////////////////
	
	function selectOrderQry($table,$condition,$val,$orderby,$limitS,$limitE) 
	{
		if(!$condition){
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." order by ".$orderby;
			else
				$sql="select * from ".$table." order by ".$orderby." limit ".$limitS.", ".$limitE;
				$rq = $this->executeQry($sql);
		}
		else {
			if((!$limitS) && (!$limitE))
				$sql="select * from ".$table." where ".$condition." order by ".$orderby;
			else
				 $sql="select * from ".$table." where ".$condition." order by ".$orderby." limit ".$limitS.", ".$limitE;
				$rq = $this->fn_mysql_prepare_params($sql, $val);
		}
		
		//echo $rq;
		return $rq;
	}
	
	///////////////////////////////////////////////////////////////////////
	
// mysql_query_params() wrapper. takes two arguments. first
// is the query with '?' placeholders in it. second argument
// is an array containing the values to substitute in place
// of the placeholders (in order, of course).
function fn_mysql_prepare_params ($query, $phs = array()) {

    foreach ($phs as $ph) {
       //$ph = "'" . mysql_real_escape_string($ph) . "'";
    	$ph_escp =  (is_int($ph)? $ph : (NULL===$ph ? 'NULL': "'". mysqli_real_escape_string ($this->cnx, $ph)."'"));
	 
	 
		
		$query = substr_replace(
                $query, $ph_escp, strpos($query, '?'), 1
         );
		 
    }
 //echo $query."<br />";
	
   $dataSet=$this->executeQry($query);
   
   //echo $dataSet;
   return $dataSet;
}


//function to check duplicates, based on result of query
// if returned no of rows greater than zero, it means
// duplicate rows are found	
function fn_checkdup($pField,  $pQry, $pArr=array()) {
	$nrows=0;
	
	$rs = fn_mysql_prepare_params(
        $pQry,
        $pArr
    );
	//$fq = mysql_fetch_array($rq);
	$nrows=mysql_num_rows($rs);
	return $nrows;
}		
	
	function editRec($table,$frmval,$condition)
	{
		$sql="update ".$table." set ".$frmval." where ".$condition;
		$dataSet=$this->executeQry($sql);
		return $dataSet;
	}

	function executeQry($sql) 
	{
		if (!is_string($sql)) {
            //throw new Exception("Illegal parameter. Must be string.");
			die("Illegal parameter. Must be string.");
        }
		else {
		$rsSet = mysqli_query($this->cnx, $sql) or die(mysqli_error($this->cnx));
		}
		if (!$rsSet) {
			$this->throwMysqlException();
		die(@mysqli_errno());}			
		else
			return $rsSet;
			//echo $rsSet;
	}
	
	function insert_id()
	{
		return mysqli_insert_id();
	}
	
	/*function deleteval($tbl,$con){
		//$this->dbConnect();
		$sql="delete from ".$tbl." where ".$con;
		$result=mysql_query($sql) or die(mysql_error());
	}	*/
	function getResultRow($DataSet) 
	{
		return mysql_fetch_array($DataSet);
	}
	function getResultObject($DataSet) 
	{
		return mysql_fetch_object($DataSet);
	}
	function getTotalRow($DataSet) {
		return mysql_num_rows($DataSet);
	}
	function addParameter($param)
	{
		$allParam=$allParam;
	}
	
	function throwMysqlException($addToMessage = "") {
        if (is_string($addToMessage)) {
            $message = $addToMessage ." \n". @mysql_error($this->dbConnect());
        }
        else {
            $message = @mysql_error($this->dbConnect());
        }
        //throw new Exception($message, @mysql_errno($this->dbConnect()));
		die(@mysql_errno($this->dbConnect()));
    }

     function fetchValue($tbl, $field,$val, $con){
	    //$this->dbConnect();
		$sql="select ".$field." from ".$tbl." where ".$con;
		$result = $this->fn_mysql_prepare_params($sql, $val);
		$rows=mysql_num_rows($result);
		$rec=mysql_fetch_object($result);
		$val=$rec->$field;
	    return $val;	
    }

    function updateValue($tbl,$con,$val){
		//$this->dbConnect();
		$sql="update ".$tbl." set ".$val." where ".$con;
		$result=mysql_query($sql) or die(mysql_error());
    }	

    function singleValue($tbl,$con){
	    //$this->dbConnect();
		$sql="select * from ".$tbl." where ".$con;
        $result=mysql_query($sql) or die(mysql_error());
		$rec=mysql_fetch_object($result);
	    return $rec;	
    }

    function deleteRec($table,$condition,$val)
    {
		if(!$condition){
			$sql="delete from ".$table;
			$dataSet=$this->executeQry($sql);
		}
		else{
			$sql="delete from ".$table." where ".$condition;
			$dataSet=$this->fn_mysql_prepare_params($sql, $val);
		}
		//$dataSet=$this->executeQry($sql);
		
		return $dataSet;
    }
	
	
// Paging Test	
	
	function paging($query,$val) {
			$this->offset=0;
			$this->page=1;
			$this->sql=$query;
			$rq = $this->fn_mysql_prepare_params($query,$val);
			//$this->rs=mysql_query($this->sql);
			$this->numrows=mysql_num_rows($rq);
	}
	function getNumRows() {
			return $this->numrows;
	}
	function setLimit($no) {
	        if($no)  
			$this->limit=$no;
			else
			$this->limit=10;
	}
	function getLimit() {
			return $this->limit;
	}
	function getNoOfPages() {
			return ceil($this->noofpage=($this->getNumRows()/$this->getLimit()));
	}
	function getPageNo() {
			$str="";
			$str=$str."<table width='100%' style='border:0px none;' align='right'><tr>";
			$str=$str."<td width='100%' align='right' valign='top' height='25'>";
			if($this->getPage()>1) {
				$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()-1).$this->getParameter()."' class='".$this->getStyle()."'>Prev </a>|&nbsp;";
			}
			
			if($this->getPage() > 6)
			{   
			    $l = 1;
				for($i=$this->getPage()-1;$i>0;$i--) {
					$arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					if($l == 5)
					break;
					$l++;
				}
				if($this->getNoOfPages()-$this->getPage() < 5)
				{
				   $start = $i -1;
				   $diff = $this->getNoOfPages()-$this->getPage();
				   $loop = 5-$diff;
				   for($m = 1; $m<=$loop; $m++) {
				     if($start>0)
				     $arr[] = "<a href='".$_SERVER['PHP_SELF']."?page=".$start.$this->getParameter()."' class='".$this->getStyle()."'>".$start."</a>&nbsp;"; 
				     $start--;
					} 
				}
				$arrrev = array_reverse($arr);
				foreach($arrrev as $val)
				  $str = $str.$val;
			}
			
			$current = $this->getPage();
			if($current > 6)
			{   
			    $k = 1;
				for($i=$current;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
					if($k == 6)
					break;
					$k++;
				}
			}
			else
			{
				$j = 1;
				for($i=1;$i<=$this->getNoOfPages();$i++) {
					if($i==$this->getPage()) {
						$str=$str."<span class='".$this->getActiveStyle()."'>".$i."&nbsp;</span>";
					}
					else {
						$str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".$i.$this->getParameter()."' class='".$this->getStyle()."'>".$i."</a>&nbsp;";
					}
				   if($j == 11)
				   break;
				   $j++;
				}
			  if($this->getNoOfPages() > $i+1)
			  {
			    $str=$str."<a href='".$_SERVER['PHP_SELF']."?page=".($i+1).$this->getParameter()."' class='".$this->getStyle()."'>.. </a>";
			  }

			
			}
			
			if($this->getPage()<$this->getNoOfPages()) {
				$str=$str."|<a href='".$_SERVER['PHP_SELF']."?page=".($this->getPage()+1).$this->getParameter()."' class='".$this->getStyle()."'> Next</a>";
			}
			$str=$str."</td>";
			$str=$str."</tr></table>";
			return $str;
	}
	function getOffset($page) {
			if($page>$this->getNoOfPages()) {
				$page=$this->getNoOfPages();
			}
			if($page=="") {
				$this->page=1;
				$page=1;
			}
			else {
				$this->page=$page;
			}
			if($page=="1") {
				$this->offset=0;
				return $this->offset;
			}
			else {
				for($i=2;$i<=$page;$i++) {
					$this->offset=$this->offset+$this->getLimit();
				}
				return $this->offset;
			}
	}
	function getPage() {
			return $this->page;
	}
	function setStyle($style) {
			$this->style=$style;
	}
	function getStyle() {
			return $this->style;
	}
	function setActiveStyle($style) {
			$this->activestyle=$style;
	}
	function getActiveStyle() {
			return $this->activestyle;
	}
	function setButtonStyle($style) {
			$this->buttonstyle=$style;
	}
	function getButtonStyle() {
			return $this->buttonstyle;
	}
	function setParameter($parameter) {
			$this->parameter=$parameter;
	}
	function getParameter() {
			return $this->parameter;
	}
	
	public function errno() 
	{ 
		return mysql_errno($this->link); 
	} 
	public function error() 
	{ 
		return mysql_error($this->link); 
	} 
	public static function escape_string($string) 
	{ 
		return mysql_real_escape_string($string); 
	} 
	public function query($query) 
	{ 
		return mysql_query($query); 
	} 
	public function fetch_array($result, $array_type = MYSQL_BOTH) 
	{ 
		return mysql_fetch_array($result, $array_type); 
	} 
	public function fetch_row($result) 
	{ 
	   return mysql_fetch_row($result); 
	} 
	public function fetch_assoc($result) 
	{ 
	   return mysql_fetch_assoc($result); 
	} 
	public function fetch_object($result) 
	{ 
	   return mysql_fetch_object($result); 
	} 
	public function num_rows($result) 
	{ 
	   return mysql_num_rows($result); 
	} 
	public function curPageInfo() {
    return substr($_SERVER["REQUEST_URI"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
	}

}
?>
