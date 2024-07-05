<?php
trait Properties {

    // Common properties
    protected $uid; // to store uid from database
    protected $sessionUID; // to store current session UID
    protected $incomingUID; // to store UID of incoming post request
    protected $domain; // to store domain from database
    protected $sessionDomain; // to store domain from session variable
    protected $incomingDomain; // to store domain of incoming post request
    protected $action; // to store action from incoming post request

    // dashboard related properties
    protected $profileFields;
    protected $onBoard;
    protected $onBoardingStep;

    // address related properties
    protected $addresses = array(); // array to store addresses
    protected $add_action = "";
    protected $add_id = "";
    protected $add_type = "";
    protected $add_priority = "";
    protected $add_label = "";
    protected $add_address = "";
    protected $add_country = "";
    protected $add_state = "";
    protected $add_city = "";
    protected $add_zip = "";

    // file upload related properties
    protected $file_mime = ""; // mime type of uploaded file
    protected $file_data = ""; // base64 encoded file data
    protected $file_name = ""; // file description

    // profile related properties
    protected $avatar = ""; // users avatar 
    protected $avatar_mime = ""; // users avatar 
    protected $firstname = ""; // users firstname
    protected $lastname = ""; // users lastname
    protected $gender = ""; // users gender
    protected $dob = ""; // users date of birth
    protected $cc = ""; // users country code
    protected $cn = ""; // users country name
    protected $dc = ""; // users country dial code
    protected $mobile = ""; // users mobile number

    // document upload related properties
    protected $doc_name = ""; // uploaded document name
    protected $doc_type = ""; // uploaded document type

    // personal kyc related properties
    protected $kyc = array(); // array to store kyc information
    protected $id_type = ""; // kyc id type
    protected $id_image = ""; // kyc id photograph
    protected $id_mime = ""; // kyc id photograph mime
    protected $id_status = ""; // personal kyc verification status
    protected $id_status_msg = ""; // personal kyc verification status message
    protected $ap_type = ""; // kyc address proof type
    protected $ap_image = ""; // kyc address proof image
    protected $ap_mime = ""; // kyc address proof image mime
    protected $ap_status = ""; // personal kyc verification status
    protected $ap_status_msg = ""; // personal kyc verification status message

    // business kyb related properties
    protected $kyb = array(); // array to store kyb information
    protected $biz_name = ""; // business or organization name
    protected $biz_url = ""; // website url of business or organization
    protected $biz_desc = ""; // a brief description about the business
    protected $biz_type = ""; // manufacturing, services, retail etc.
    protected $biz_industry = ""; // business industry agri, solar, textile etc
    protected $biz_category = ""; // business category within the industry
    protected $biz_role = ""; // users role in business
    protected $biz_income = ""; // approximate annual income
    protected $biz_employees = ""; // total number of employees
    protected $cert_type = ""; // business registration type (proprietor, private ltd, public ltd, other)
    protected $cert_validity = ""; // validity of registatration as on certificate
    protected $cert_image = ""; // govt issued business registatration certificate (image)
    protected $cert_mime = ""; // mime type of uploaded image
    protected $cert_status = ""; // kyb verification status
    protected $cert_status_msg = ""; // kyb verification status message


    // Settings related properties
    protected $settings = array(); // array to store settings data
    protected $set_action = ""; // settings action
    // preferences related properties
    protected $language = "";
    protected $timezone = "";
    protected $mode = "";
    // communication related properties
    protected $newsletters = "";
    protected $notifications = "";
    // security related properties
    protected $recovery = ""; // users alternate email address
    protected $two_factor = "";
    protected $two_factor_key = "";
    protected $terms = "";
    protected $privacy = "";
    protected $multisite = "";

}
?>
