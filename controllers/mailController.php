<?php

/**
* 
*/
class MailController
{
    private $mFrom = ""; // from mail
    private $mPass = ""; // mails's password
    private $name = "Nguyen Tien Viet";
    private $mReplyAddress = "tienvietnguyen1110@gmail.com";
    private $mReplyName = "Nguyen Tien Viet";
    
    function __construct(argument)
    {
        # code...
    }

    function sendMail($subject, $content, $nTo, $mTo, $diachicc = '', $attachents = "") {
        
        $mail             = new PHPMailer();
        $body             = $content;
        $mail->IsSMTP(); 
        $mail->CharSet   = "utf-8";
        $mail->SMTPDebug  = 0; 
        $mail->SMTPAuth   = true; 
        $mail->SMTPSecure = "ssl";
        $mail->Host       = "smtp.gmail.com";        
        $mail->Port       = 465;
        $mail->Username   = $mFrom;
        $mail->Password   = $mPass;
        $mail->SetFrom($mFrom, $name);
        
        $ccmail = explode(',', $diachicc);
        $ccmail = array_filter($ccmail);
        if(!empty($ccmail)){
            foreach ($ccmail as $k => $v) {
                $mail->AddCC($v);
            }
        }
        $mail->Subject    = $subject;
        $mail->MsgHTML($body);
        $address = $mTo;
        $mail->AddAddress($address, $nTo);
        $mail->AddReplyTo($mReplyAddress, $mReplyName);

        if ($attachents != "" && is_array($attachents)) {
            
            $mail->AddAttachment($file,$filename);    
        }        
        
        return $mail->Send();
    }
}