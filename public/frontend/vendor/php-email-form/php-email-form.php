<?php 




class PHP_Email_Form {
    
    public $ajax = false, $to = '', $from_name = '', $from_email = '', $subject = '', $msg = 'xx', $smtp = [];
    
    
    public function add_message($value, $title){
         $this->msg .= '<p>'.$title.': '.$value.'</p>';
    }
    
    
    public function send(){
        $mail = new PHPMailer(); 
    // 	$mail->SMTPDebug  = 3;
    	$mail->IsSMTP(); 
    	$mail->SMTPAuth = true; 
    	$mail->SMTPSecure = $this->smtp['encryption']; 
    	$mail->Host = $this->smtp['host'];
    	$mail->Port = 465; 
    	$mail->IsHTML(true);
    	$mail->CharSet = 'UTF-8';
    	$mail->Username = $this->smtp['username'];
    	$mail->Password = $this->smtp['password'];
    	$mail->SetFrom($this->smtp['username']);
    	$mail->Subject = $this->subject;
    	$mail->Body = $this->msg;
    	$mail->AddAddress($this->to);
    	$mail->SMTPOptions=array('ssl'=>array(
    		'verify_peer'=>false,
    		'verify_peer_name'=>false,
    		'allow_self_signed'=>false
    	));
    	if(!$mail->Send()){
    		echo $mail->ErrorInfo;
    	}else{
    		return 'OK';
    	}
        
       
    }
    
}





?>