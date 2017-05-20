<?php
include_once '/prod/peacebase/utility/api/sent_mail.php';
include_once '/prod/peacewebsite/main/capabiliti/agilecrm/CurlLib/curlwrap_v2.php';
$sent_mail = new SentMail();

				
$contact_name = isset($_REQUEST['contact_name']) ? $_REQUEST['contact_name'] : '';
$contact_email = isset($_REQUEST['contact_email']) ? $_REQUEST['contact_email'] : '';
$contact_number = isset($_REQUEST['contact_number']) ? $_REQUEST['contact_number'] : '';
$form_type = isset($_REQUEST['form_type']) ? $_REQUEST['form_type'] : 'a form';

if(isset($contact_email)){
	send_email($contact_name,$contact_email,$contact_number, $_REQUEST);
	crm_contact_create_update($contact_name,$contact_email,$contact_number, $_REQUEST);
	echo 'success';
}

function send_email(){
		global $sent_mail;
		global $contact_name;
		global $contact_email;
		global $contact_number;
		global $form_type;
		global $_REQUEST;
		
		$to = 'sales@qustn.com';
		$to_name = 'Sales Group';
		$from = 'admin@qustn.com';
		$from_name = 'Capabiliti Website';
		$subject = 'New Lead submitted '.$form_type.' - '.$contact_email;
		$message = '<div style="max-width:600px;">New Request from website, details are :&nbsp;</div><div><br><table width="100%">';
		
		// echo $message; die;
		foreach($_REQUEST as $user_data_key => $user_data_value){
			$user_data_key = ucwords(str_replace("_"," ",str_replace("contact_","",$user_data_key)));
			if(is_array($user_data_value)){
				$message .= '<tr><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;">&nbsp;</td><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;"><b>'.$user_data_key.' </b></td><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;"> '.implode(" , ",$user_data_value).'</td></tr>';
			}else{
				$message .= '<tr><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;">&nbsp;</td><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;"><b>'.$user_data_key.'</b> </td><td style=" border-bottom: 1px solid #eee; padding: 10px 8px;"> '.$user_data_value.'</td></tr>';
			}
		}
		$message .= '</table></div>';
		// echo $message;
		$response = $sent_mail->sendMail($to, $to_name, $from, $from_name, $subject ,$message, false);
		 // echo $response;
		// echo 'success';
}
function crm_contact_create_update(){
		global $sent_mail;
		global $contact_name;
		global $contact_email;
		global $contact_number;
		global $form_type;
		global $_REQUEST;
		
	
	
	$contact_json = array(
		"properties" => array(
			array(
				"name" => "email",
				"value" => $contact_email,
				"type" => "SYSTEM"
			),
			array(
				"name" => "phone",
				"value" => $contact_number,
				"type" => "SYSTEM"
			)		
		)
	);
	$contact_json_input = json_encode($contact_json);
	$contact4 = curl_wrap("contacts", $contact_json_input, "POST", "application/json");



	$contact_id = curl_wrap("contacts/search/email/".$contact_email, null, "GET", "application/json");
	$contact_id = json_decode($contact_id, true);
	$contact_id = $contact_id['id'];

	$update_contact_json = array(
		  "id"=>$contact_id, //It is mandatory field. Id of contact
		  "properties"=>array(
			array(
			  "name"=>"first_name",
			  "value"=>$contact_name,
			  "type"=>"SYSTEM"
			)
		  )
		);
	$update_contact_json = json_encode($update_contact_json);
	curl_wrap("contacts/edit-properties", $update_contact_json, "PUT", "application/json");

	$tag_array = array();
	foreach($_REQUEST as $user_data_key => $user_data_value){
			if($user_data_key == "contact_name" || $user_data_key == "contact_number" || $user_data_key == "contact_email") continue;
			$user_data_key = ucwords(str_replace("_"," ",str_replace("contact_","",$user_data_key)));
			if(is_array($user_data_value)){
				$tag_array[] = preg_replace('/[^A-Za-z0-9\-]/', ' ', $user_data_key.' '.implode(" , ",$user_data_value));
			}else{
				$tag_array[] = preg_replace('/[^A-Za-z0-9\-]/', ' ', $user_data_key.' '.$user_data_value);
			}
		}
	
	$contact_tag_json = array(
		"id" => $contact_id, //It is mandatory field. Id of contact
		"tags" => $tag_array
	);
	$contact_tag_json = json_encode($contact_tag_json);
	curl_wrap("contacts/edit/tags", $contact_tag_json, "PUT", "application/json");


	
	 // $contact_data = $contact_name.','.$contact_email.','.$contact_number.','.$interested_in.','.$course_name.','.$user_message.''.PHP_EOL;
	 // $crm_contact_file = fopen('agilecrm/contacts.csv', 'a') ;
	 // fwrite($crm_contact_file, $contact_data);	
}




?>