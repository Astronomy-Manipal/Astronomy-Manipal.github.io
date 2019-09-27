<?php
function __autoload($class_name) {
	
  $file =  'includes/classes/'.$class_name . '.php';
	if($file!="includes/classes/finfo.php")
	{
	if(file_exists($file)) 
	require_once($file);
	else
	die('File Not Found');
	}
}

function headContent()
{
 $headcontent = "<head>";
 $headcontent .= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
 $headcontent .= "<title>".ADMIN_TITLE."</title>";
 $headcontent .= "<link href='css/stylesheet.css' rel='stylesheet' type='text/css' />";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/validation.js'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/common.js' ></script>"; 
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/ajax.js' ></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/changepassword.js'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/perpage.js'></script>";
 $headcontent .= "</head>";
 echo $headcontent;
}

function headContentPlayer()
{
 $headcontent = "<head>";
 $headcontent .= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
 $headcontent .= "<title>".ADMIN_TITLE."</title>";
 $headcontent .= "<link href='css/stylesheet.css' rel='stylesheet' type='text/css' />";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/validation.js'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/swfobject.js' ></script>"; 
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/js.js' ></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/common.js' ></script>"; 
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/ajax.js' ></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/changepassword.js'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/perpage.js'></script>";
 $headcontent .= "</head>";
 echo $headcontent;
}

function headContentFacebox()
{
 $headcontent = "<head>";
 $headcontent .= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />";
 $headcontent .= "<title>".ADMIN_TITLE."</title>";
 $headcontent .= "<link href='css/stylesheet.css' rel='stylesheet' type='text/css' />";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/validation.js'></script>";
 $headcontent .= "<script language='javascript' src='js/common.js' type='text/javascript'></script>";
 $headcontent .= "<script src='facefiles/jquery-1.2.2.pack.js' type='text/javascript'></script>
<link href='facefiles/facebox.css' media='screen' rel='stylesheet' type='text/css' />
<script src='facefiles/facebox.js' type='text/javascript'></script><script type='text/javascript'>jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox()  })</script>"; 
 $headcontent .= "<script language='javascript' src='js/ajax.js' type='text/javascript'></script>";
 $headcontent .= "<script language='javascript' src='js/disable.js' type='text/javascript'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/changepassword.js'></script>";
 $headcontent .= "<script language='javascript' type='text/javascript' src='js/perpage.js'></script>";
 $headcontent .= "</head>";
 echo $headcontent;
}

function headContentFCK()
{
 $headcontentfck = "<head>";
 $headcontentfck .= "<title>".ADMIN_TITLE."</title>";
 $headcontentfck .= "<script language='javascript' type='text/javascript' src='js/validation.js'></script>";
 $headcontentfck .= "<script language='javascript' type='text/javascript' src='js/common.js'></script>";
 $headcontentfck .= "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>";
 $headcontentfck .= "<link href='css/stylesheet.css' rel='stylesheet' type='text/css'>";
 $headcontentfck .= "<link rel='stylesheet' href='windowfiles/dhtmlwindow.css' type='text/css' />";
 $headcontentfck .= "<script type='text/javascript' src='js/fckFunc.js' language='javascript'></script>";
 $headcontentfck .= "<link href='style/class.css' rel='stylesheet' type='text/css'>";
 $headcontentfck .= "<script language='javascript' type='text/javascript' src='js/perpage.js'></script>";
 $headcontentfck .= "</head>";
 echo $headcontentfck;
}

function msgSuccessFail($type,$msg){
  if($type == 'fail'){
  $preTable = "<table class='failMsgTable' align='center' cellpadding='0' cellspacing='0'>
     <tr><td class='failMsg' width='353' align='center' height='25'><img src='img/error.png' width='16' border='0' height='16'>&nbsp;&nbsp;&nbsp;$msg    </td></tr></table>";
  }elseif($type == 'success'){
  $preTable = "<table class='successMsgTable' align='center' cellpadding='0' cellspacing='0'>
     <tr><td class='successMsg' width='353' align='center' height='25'><img src='img/done.gif' width='16' border='0' height='16'>&nbsp;&nbsp;&nbsp;$msg</td></tr></table>";
  }
  return $preTable;
}

function orderBy($pageurl,$orderby,$displayTitle){
	if($_GET[order] == 'ASC') { 
	$order = "DESC";}
	else{ $order = "ASC";}
	if(($_GET[orderby] == $orderby)&&($_GET[order] == 'ASC')){
	$img = "<img src='images/orderup.png' border='0' />";
	}
	elseif(($_GET[orderby] == $orderby)&&($_GET[order] == 'DESC')){
	$img = "<img src='images/orderdown.png'  border='0' />";
	}else{
	$img = "";
	}
	$explodedlink = explode("?",$pageurl);
	$page=antixss($_GET['page']);
	$limit=antixss($_GET['limit']);
	if($explodedlink[1]){
	$display = "<a href='$pageurl&orderby=$orderby&order=$order&page=$page&limit=$limit' class='order'>$displayTitle </a> $img";
	}else{
	$display = "<a href='$pageurl?orderby=$orderby&order=$order&page=$page&limit=$limit' class='order'>$displayTitle</a> $img";
	}
	echo $display; 
}

	//**************** mysql prepared statement for parametrized query *****************
function chkfileheader($file_header)
	{
       $file_header=strtolower($file_header);
	  
	 if($file_header!='application/pdf' && $file_header!='application/msword' && $file_header!='application/vnd.openxmlformats-officedocument.wordprocessingml.document' )
		{
			return 2;
		}
			
		return 1;	
}	
	
function chkfilemime($file_tmp)
	{
	$finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type=finfo_file($finfo, $file_tmp);
	
    //$file_info = new finfo(FILEINFO_MIME);  
    //$mime_type = $file_info->buffer(file_get_contents($file_tmp)); 
  
	 switch($mime_type) 
	{
       
	case "application/pdf";
      return 1;
	break;
	
	default:
	return 2;
	break;
	}
		
}

// mysql_query_params() wrapper. takes two arguments. first
// is the query with '?' placeholders in it. second argument
// is an array containing the values to substitute in place
// of the placeholders (in order, of course).
function fn_mysql_prepare_params ($query, $phs = array()) {
    foreach ($phs as $ph) {
       //$ph = "'" . mysql_real_escape_string($ph) . "'";
    	$ph_escp =  (is_int($ph)? $ph : (NULL===$ph ? 'NULL': "'". mysql_real_escape_string ($ph)."'"));
	 
		$query = substr_replace(
                $query, $ph_escp, strpos($query, '?'), 1
         );
		 
    }
    //echo $query."<br />";
   return mysql_query($query);
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

// function to generate random number
// parameter passed is  required 'length' of the  random number
function fn_genrandid($pLen) {
	
	$chrstring = "abcdefghijklmnopqrstuvwxyz0123456789";

   
    //echo "Character at ->". substr($chrstring, 26, 1);
	if($pLen>0) 
	{ 
		$rand_id="";
		for($i=1; $i<=$pLen; $i++)
		{
		   mt_srand((double)microtime() * 1000000);
		   $num = mt_rand(1,36);
		   
		   
		   //$rand_id .= assign_rand_value($num);
		   $rand_id .=substr($chrstring, $num-1, 1);
		   //echo "Num ->".$num. "  rand_alphanum->".substr($chrstring, $num-1, 1)."<br />";
		}
	}

	return $rand_id;
	
}

function antixss($str)
	{	
	$check_value = htmlentities($str, ENT_QUOTES);
	$check_value1=filter_var($check_value, FILTER_SANITIZE_STRING);
	return $check_value1;
	}
	
function mysql_prep( $value ) {

		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists( "mysql_real_escape_string" ); // i.e. PHP >= v4.3.0
		if( $new_enough_php ) { // PHP v4.3.0 or higher
			// undo any magic quote effects so mysql_real_escape_string can do the work
			if( $magic_quotes_active ) { $value = stripslashes( $value ); }
			$value = mysql_real_escape_string( $value );
		} else { // before PHP v4.3.0
			// if magic quotes aren't already on then add slashes manually
			if( !$magic_quotes_active ) { $value = addslashes( $value ); }
			// if magic quotes are active, then the slashes already exist
		}
		
		 //$str = '/[^a-zA-Z0-9\.\,\_\-\/\:\ \(\)@#?]/';
			
		//if(!preg_match($str,$value))
		return $value;
}

function getValidFile($value)
{
$allow=array('uploads','atl','declarations');
//print_r($allow);
$value1=explode('/',$value);
if(in_array($value1[1],$allow) && in_array($value1[2],$allow))
return $value;
}

function validate($post)
{
$udise=antixss($post['udise']);
$pname=antixss($post['principalname']);
$pmob=antixss($post['principalphone']);
$pmail=antixss($post['principalemail']);
$pfmscode=antixss($post['pfms_code']);
$pfmsbank=antixss($post['pfms_bank_name']);
$pfmsacc=antixss($post['pfms_ac_no']);
$pfmsholder=antixss($post['pfms_holder_name']);

$msg='';
if(trim($udise)=='')
$msg="UDISE is required!!";

else if(trim($pname)=='')
$msg="Principal name is required!!";

else if(trim($pmob)=='')
$msg="Principal phone no. is required!!";

else if(trim($pmail)=='')
$msg="Principal email is required!!";

else if(trim($pfmscode)=='')
$msg="PFMS Agengy code is required!!";

else if(trim($pfmsbank)=='')
$msg="Bank name is required!!";

else if(trim($pfmsacc)=='')
$msg="Account no. is required!!";

else if(trim($pfmsholder)=='')
$msg="Account holder name is required!!";

return $msg;

}

?>