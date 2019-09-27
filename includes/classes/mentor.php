<?php

//require_once("thumbnail.inc.php");
//require_once('includes/classes/PHPMailer.php');
//session_start();

global $config;
require_once("config/configure.php");
require_once("config/tables.php");

class Mentor extends MySqlDriver {
	//**********************
	//create a connection 
	//**********************
	//MySqlDriver $obj= new MySqlDriver();       
	
	public function Connect()
	{
		global $config; 
		$host = $config['server'];
		$user = $config['user'];
		$pass = $config['pass'];
		$database = $config['database'];
		$cnx = mysqli_connect($host,$user,$pass,$database) or die("Cannot connect to MySQL" . mysqli_error());
		return $cnx;
	}	
		
		
	function addData($con,$_post)
	{
		$last_id= mysqli_insert_id();
		$uniqid=substr(uniqid(rand()),0,4);
		$uniqueid= $uniqid.$last_id;
		
		$email = $_POST['email'];
		
		echo "Unique ID: ".$uniqueid;
		
		$sql_user = "INSERT INTO ".USER." (user_id, unique_id, email, password, status) values ('$last_id', '$uniqueid', '$email', 'password12345' ,'I')";
		mysqli_query($con, $sql_user) or die(mysqli_error($con));
	
		
		$firstName = $_post['firstName'];
		$lastName = $_post['lastName'];
		$gender = $_POST['gender'];
		$mobile = $_POST['mobile'];
		$dob = $_POST['dob'];
		$first_heard = $_POST['firstHeard'];
		$country = $_POST['country'];
		$state = $_POST['state'];
		$district = $_POST['district'];
		$address1 = $_POST['addressLine1'];
		$address2 = $_POST['addressLine2'];		
		$address3 = $_POST['addressLine3'];
		$pinCode = $_POST['pinCode'];
		$linkedin = $_POST['linkedin'];
		$facebook = $_POST['facebook'];
		$webpage = $_POST['webpage'];
		$highestDegree = $_POST['highestDegree'];
		$highestDegreeOther = $_POST['highestDegreeOther'];
		$specialisation = $_POST['specialisation'];
		$specialisationOther = $_POST['specialisationOther'];
		$institute = $_POST['institute'].",".$_POST['institute_district'].",".$_POST['institute_state'];
		$yearOfCompletionOfHighestDegree = $_POST['yearOfCompletionOfHighestDegree'];
		$langs = $_POST['langs'];
		
		if($_POST['nationality']==='other')
		{
			$state = 37;
			$district = 716;
		}
		else
		{
			$country ='' ;
		}
		
		if($_POST['specialisation']!=8)
		{
			$specialisationOther="";
		}
		
		if($_POST['highestDegree']!=6)
		{
			$highestDegreeOther="";
		}
		//echo $firstName."_".$lastName."_".$gender."_".$email."_".$mobile."_".$dob."_".$state."_".$district."_".$address1."_".$address2."_".$address3."_".$linkedin."_".$facebook."_".$webpage."_".$highestDegree."_".$specialisation."_".$institute."_".$yearOfCompletionOfHighestDegree."_".$languages."_".$lang;

		$sql_primary = "INSERT INTO ".PRIMARY." (unique_id, first_name, last_name, gender, email, mobile, dob, first_heard, country_id ,state_id, district_id, pincode, address_line_1, address_line_2, address_line_3, linkedin, facebook, webpage, highest_degree, highest_degree_other, specialisation, specialisation_other, institute, completion_year, languages, status, updated_on) values ('$uniqueid','$firstName', '$lastName', '$gender', '$email', '$mobile', '$dob', '$first_heard','$country', '$state', '$district', '$pinCode','$address1', '$address2', '$address3', '$linkedin', '$facebook', '$webpage', '$highestDegree', '$highestDegreeOther', '$specialisation', '$specialisationOther', '$institute', '$yearOfCompletionOfHighestDegree', '$langs', 'I', CURRENT_TIMESTAMP)";
		mysqli_query($con, $sql_primary) or die(mysqli_error($con));
	
		$registerAs = $_POST['registerAs'];
		$employedByAIM = $_POST['employedByAIM'];
		$currentOrganization = $_POST['currentOrganization'];
		$typeOfOrganization = $_POST['typeOfOrganization'];
		$typeOfOrganizationOther = $_POST['typeOfOrganizationOther'];
		$designation = $_POST['designation'];
		$workArea = $_POST['workArea'];
		$workAreaOther = $_POST['workAreaOther'];
		$workExperienceWithCurrentOrganization = $_POST['workExperienceWithCurrentOrganization'];
		$totalWorkExperience = $_POST['totalWorkExperience'];
		$professionalAwards = $_POST['professionalAwards'];
		
		if($_POST['AIMpartner']==='no')
		{
			$employedByAIM = "";
		}
		else
		{
			$currentOrganization = $employedByAIM;
			$typeOfOrganizationOther = $employedByAIM;
			$typeOfOrganization = "";
		}
		
		if($_POST['typeOfOrganization']!=10)
		{
			$typeOfOrganizationOther="";
		}
		
		if($_POST['workArea']!=14)
		{
			$workAreaOther="";
		}
		
		$sql_professional = "INSERT INTO ".PROFESSIONAL." (unique_id, email, registering_as, employed_by, curr_org, type_org, type_org_other, designation, work_area, work_area_other, exp_curr_org, exp_total, professional_awards) values ('$uniqueid', '$email', '$registerAs', '$employedByAIM', '$currentOrganization', '$typeOfOrganization', '$typeOfOrganizationOther', '$designation', '$workArea', '$workAreaOther' ,'$workExperienceWithCurrentOrganization', '$totalWorkExperience', '$professionalAwards')";
		mysqli_query($con, $sql_professional) or die(mysqli_error($con));
	
		$experienceStudents = $_POST['experienceStudents'];
		$experienceStartups = $_POST['experienceStartups'];
		$experienceCorporateEnvironment = $_POST['experienceCorporateEnvironment'];
		$mentoringForm = $_POST['mentoringForm'];
		$hoursCommit = $_POST['hoursCommit'];
		$choice1State = $_POST['choice1State'];
		$choice1District = $_POST['choice1District'];
		$choice1 = $_POST['choice1'];
		$choice2State = $_POST['choice2State'];
		$choice2District = $_POST['choice2District'];
		$choice2 = $_POST['choice2'];
		$choice3State = $_POST['choice3State'];
		$choice3District = $_POST['choice3District'];
		$choice3 = $_POST['choice3'];
		$choice4State = $_POST['choice4State'];
		$choice4District = $_POST['choice4District'];
		$choice4 = $_POST['choice4'];
		$choice5State = $_POST['choice5State'];
		$choice5District = $_POST['choice5District'];
		$choice5 = $_POST['choice5'];
		$choice6State = $_POST['choice6State'];
		$choice6District = $_POST['choice6District'];
		$choice6 = $_POST['choice6'];
		$contributionAreas = $_POST['contributionAreas'];
		
		if($_POST['mentoringExperience']==='no')
		{
			$experienceStudents = 0;
			$experienceStartups = 0;
			$experienceCorporateEnvironment = 0;
		}
		
		$sql_mentoring = "INSERT INTO ".MENTORING_DETAILS." (unique_id, email, studentsExp, startupsExp, corporateExp, mentoringForm, hours, school1_state, school1_district, school1_school, school2_state, school2_district, school2_school, school3_state, school3_district, school3_school, school4_state, school4_district, school4_school, school5_state, school5_district, school5_school, school6_state, school6_district, school6_school, contribution_area) values ('$uniqueid', '$email', '$experienceStudents', '$experienceStartups', '$experienceCorporateEnvironment', '$mentoringForm', '$hoursCommit', '$choice1State', '$choice1District', '$choice1', '$choice2State', '$choice2District', '$choice2', '$choice3State', '$choice3District', '$choice3', '$choice4State', '$choice4District', '$choice4', '$choice5State', '$choice5District', '$choice5', '$choice6State', '$choice6District', '$choice6', '$contributionAreas')";
		mysqli_query($con, $sql_mentoring) or die(mysqli_error($con));
	
		$sectors = $_POST['sectors'];
		$functionals = $_POST['functionals'];
		$srasc_years = $_POST['srasc_years'];
		$srasc_text = $_POST['srasc_text'];
		$ipr_years = $_POST['ipr_years'];
		$ipr_text = $_POST['ipr_text'];
		$ia_years = $_POST['ia_years'];
		$ia_text = $_POST['ia_text'];		
		$pd_years = $_POST['pd_years'];
		$pd_text = $_POST['pd_text'];
		$la_years = $_POST['la_years'];
		$la_text = $_POST['la_text'];
		$mentorReason = $_POST['mentorReason'];
		
		if($_POST['mentorStartup']==='no')
		{
			$sectors = "";
			$functionals = "";
		}
		
		$sql_mentoring_other = "INSERT INTO ".MENTORING_OTHER." (unique_id, email, sector_expertise, functional_expertise, srasc_years, srasc_text, ipr_years, ipr_text, investment_advisory_years, investment_advisory_text, product_development_years, product_development_text, legal_advisory_years, legal_advisory_text, mentor_reason) values ('$uniqueid', '$email', '$sectors', '$functionals', '$srasc_years', '$srasc_text', '$ipr_years', '$ipr_text', '$ia_years', '$ia_text', '$pd_years', '$pd_text', '$la_years', '$la_text', '$mentorReason')";
		mysqli_query($con, $sql_mentoring_other) or die(mysqli_error($con));
	
		$refereeName1 = $_POST['refereeName1'];
		$refereeEmail1 = $_POST['refereeEmail1'];
		$refereeMobile1 = $_POST['refereeMobile1'];
		$refereeRelation1 = $_POST['refereeRelation1'];
		$refereeMOC1 = 'N';
		if($_POST['refereeAIM1']==='no')
		{
			$refereeMOC1 = 'N';
		}
		else
		{
			$refereeMOC1 = 'Y';
		}
		
		$refereeName2 = $_POST['refereeName2'];
		$refereeEmail2 = $_POST['refereeEmail2'];
		$refereeMobile2 = $_POST['refereeMobile2'];
		$refereeRelation2 = $_POST['refereeRelation2'];
		$refereeMOC2 = 'N';
		if($_POST['refereeAIM2']==='no')
		{
			$refereeMOC2 = 'N';
		}
		else
		{
			$refereeMOC2 = 'Y';
		}
		
		$sql_reference_details = "INSERT INTO ".REFERENCE_DETAILS." (unique_id, email, referee1_name, referee1_email, referee1_mobile, referee1_relation, referee1_moc, referee2_name, referee2_email, referee2_mobile, referee2_relation, referee2_moc) values ('$uniqueid', '$email', '$refereeName1', '$refereeEmail1', '$refereeMobile1', '$refereeRelation1', '$refereeMOC1', '$refereeName2', '$refereeEmail2', '$refereeMobile2', '$refereeRelation2', '$refereeMOC2')";
		mysqli_query($con, $sql_reference_details) or die(mysqli_error($con));
	
	}
}

?>







