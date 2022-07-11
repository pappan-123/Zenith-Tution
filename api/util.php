<?php 

	require_once __DIR__.'/constants/Messages.php';
	require_once __DIR__.'/constants/HTTPStatus.php';
	require_once __DIR__.'/core.php';
	require_once __DIR__.'/RegexUtil.php';

	require_once __DIR__.'/exceptions/MissingKeyException.php';
	require_once __DIR__.'/exceptions/MissingHeaderException.php';
	require_once __DIR__.'/exceptions/InvalidEmailException.php';
	require_once __DIR__.'/exceptions/InvalidFirstNameException.php';	
	require_once __DIR__.'/exceptions/InvalidLastNameException.php';
	require_once __DIR__.'/exceptions/InvalidGenderException.php';
	require_once __DIR__.'/exceptions/InvalidDOBException.php';
	require_once __DIR__.'/exceptions/InvalidMobileException.php';
	require_once __DIR__.'/exceptions/InvalidTokenException.php';
	require_once __DIR__.'/exceptions/InvalidPincodeException.php';
	require_once __DIR__.'/exceptions/UploadedFileNotFoundException.php';
	require_once __DIR__.'/exceptions/UnsupportedFileTypeException.php';
	require_once __DIR__.'/exceptions/GenericException.php';


	require_once __DIR__.'/lib/PHPMailer-master/src/PHPMailer.php';
	require_once __DIR__.'/lib/PHPMailer-master/src/SMTP.php';
	require_once __DIR__.'/lib/PHPMailer-master/src/Exception.php';

	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;


	function validateRequiredInputParameters($requiredInputKeys, $arrayToBeSearchedForInputKeys){
		foreach ($requiredInputKeys as $value) {
			if( !isset($arrayToBeSearchedForInputKeys[$value]) ){
				throw new MissingKeyException($value);
				return false;
			}
		}
		return true;
	}

	function validateRequiredHeaderParameters($requiredHeaderKeys, $arrayToBeSearchedForHeaderKeys){
		foreach ($requiredHeaderKeys as $value) {
			if( !isset($arrayToBeSearchedForHeaderKeys[$value]) ){
				throw new MissingHeaderException($value);
				return false;
			}
		}
		return true;
	}

	function isValidNumber($number){
		
		if(!preg_match(RegexUtil::NUMERIC_REGEX, $number)){
			return false;
		}else{
			return true;			
		}

	}

	function isValidMobileNumber($mobile){  

		$sanitizedMobile = trim($mobile);
		$lengthOfMobile = strlen($sanitizedMobile);

		if($lengthOfMobile == 0){
			throw new EmptyMobileException();
			return false;
		}

		if ($lengthOfMobile == 10) {
			
			if(!preg_match(RegexUtil::MOBILE_REGEX, $sanitizedMobile)){
				throw new InvalidMobileException();
				return false;
			}

		}elseif ($lengthOfMobile == 13){
			if(!preg_match(RegexUtil::MOBILE_REGEX, substr($sanitizedMobile, -10) )){
				throw new InvalidMobileException();
				return false;
			}

			if(!isValidCountryCode(substr($sanitizedMobile, 0, 3))){
				throw new InvalidMobileException();
				return false;
			}		
		}else{

			throw new InvalidMobileException();
			return false;
		}
		
		return true;
	}

	function isValidCountryCode($countryCode){
		if($countryCode != "+91"){
			throw new InvalidMobileException();
			return false;	
		}
		return true;
	}

	function isValidName($name){
		
		if(preg_match(RegexUtil::ALPHABET_REGEX, $name)){
			return true;
		}else{
			return false;		
		}
		
	}

	function isValidFirstName($name){
		
		if(isValidName($name)){
			return true;		
		}else{
			throw new InvalidFirstNameException();
			return false;
		}

	}

	function isValidLastName($name){
		
		if(isValidName($name)){
			return true;				
		}else{
			throw new InvalidLastNameException();
			return false;
		}

	}

	function isValidEmail($emailId){
		
		if(preg_match(RegexUtil::EMAIL_REGEX, $emailId)){
			return true;				
		}else{
			throw new InvalidEmailException();
			return false;
		}
	
	}

	function isValidDOB($dob){
		
		if(isValidNumber($dob) && (time() > $dob) ){
			return true;
		}else{
			throw new InvalidDOBException();
			return false;					
		}

	}

	function isValidPincode($pincode){

		if(!preg_match(RegexUtil::PINCODE_REGEX, $pincode)){
			throw new InvalidPincodeException();
			return false;
		}
		
		return true;
	}


	function isValidImage($uploadedImageFile){
	
		if(
			$uploadedImageFile["name"] != "" 
			||
			$uploadedImageFile["name"] != NULL		

		){

			$fileExt = strtolower(pathinfo($uploadedImageFile["name"], PATHINFO_EXTENSION));

			if($fileExt == "jpg" || $fileExt == "jpeg" || $fileExt == "webp" || $fileExt == "png" || $fileExt == "gif"){

				return true;	
			
			}else{
				
				throw new UnsupportedFileTypeException();
				
				return false;			
			}
		
		}

		throw new UploadedFileNotFoundException();
		
		return false;
	}

	function isValidPdf($uploadedPdfFile){
	
		if(
			$uploadedPdfFile["name"] != "" 
			||
			$uploadedPdfFile["name"] != NULL		

		){

			$fileExt = strtolower(pathinfo($uploadedPdfFile["name"], PATHINFO_EXTENSION));

			if($fileExt == "pdf"){

				return true;	
			
			}else{
				
				throw new UnsupportedFileTypeException();
				
				return false;			
			}
		
		}

		throw new UploadedFileNotFoundException();
		
		return false;
	}


	function isInteger($value){
		
		if(preg_match(RegexUtil::NUMERIC_REGEX, $value)){
			
			return true;
		
		}else{

			throw new GenericException(Messages::SOMETHING_WENT_WRONG, "Integer expected but some other data type found.", HTTPStatus::BAD_REQUEST);
									
		}

	}

	function isFloat($value){
		
		if(preg_match(RegexUtil::FLOAT_REGEX, $value)){
			
			return true;
		
		}else{

			throw new GenericException(Messages::SOMETHING_WENT_WRONG, "Float expected but some other data type found.", HTTPStatus::BAD_REQUEST);
									
		}

	}
	
	function getMoneyFormat($number){
		return number_format($number,2);
	}
	
	function ellipsize($text, $length = 50){

		if( strlen( $text) > $length && $length > 3) {
		    /*$text = explode( "\n", wordwrap($text, $length));
		    $text = $text[0] . '...';*/
		    $text = substr( $text, 0, $length - 3)."...";
		}

		return $text;
	}

	function sanitizeString($str){
		return addslashes(trim($str)); 
	}

	function sendEMail($fromMailId = "", $fromMailPassword = "", $fromMailName = "", $toMailId = "", $mailSubject = "", $mailBody = ""){

		$mail = new PHPMailer(true);
		try {
		    //Server settings
		    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
		    $mail->isSMTP();                                            // Send using SMTP
		    $mail->Host       = 'smtp.hostinger.in';                    // Set the SMTP server to send through
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = $fromMailId;                     // SMTP username
		    $mail->Password   = $fromMailPassword;                               // SMTP password
		    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
		    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

		    //Recipients
		    $mail->setFrom($fromMailId /*'customerquery@needzindia.com'*/, $fromMailName);
		    $mail->addAddress($toMailId);     // Add a recipient
		    //$mail->addCC('admin@needzindia.com');

		    /*// Attachments
		    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name*/

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $mailSubject;//'Here is the subject';
		    $mail->Body    = $mailBody;//'This is the HTML message body <b>in bold!</b>';
		    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    //echo 'Message has been sent';
		    return true;
		} catch (Exception $e) {
		    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		    throw new GenericException("Mail not sent", $mail->ErrorInfo, HTTPStatus::INTERNAL_SERVER_ERROR);
		    
		}

	}


?>
