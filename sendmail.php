<?php
// Send mail

require_once("inc/PHPMailer/PHPMailerAutoload.php");

//goi thu vien
    include_once "inc/PHPMailer/class.smtp.php";
    include_once "inc/PHPMailer/class.phpmailer.php"; 

    $nFrom = "Fujitech JSC";    //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'hcmbk.t24@gmail.com';  //dia chi email cua ban 
    $mPass = "hanthu1110";       //mat khau email cua ban
    $nTo = 'のりこ　かと　さん'; //Ten nguoi nhan
    $mTo = 'viet.nguyen@fujitechjsc.com';   //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = 'Vietさんから、PCがとても遅いので新しいRAMを購入したいとの申請が来ました。6997円？内容が分かり難いのですが、購入方法について教えてください。基本承認します。';   // Noi dung email
    $title = '新しいRAMを購入する';

	$aCC = array(
			array(
				'address' => 'tienvietnguyen1110@gmail.com',
				'name' => 'Nguyen Tien Viet',
			),
			array(
				'address' => 'bui.dinh.thi@miyatsu.vn',
				'name' => 'Bui Dinh Thi',
			),
		);

    //$mail->IsSMTP();  
    $mail->isSMTP();             
    $mail->Host       = "ssl://smtp.gmail.com";    // sever gui mail.        
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    $mail->CharSet  = "utf-8";
    //Ma hoa: ssl (deprecate) or tls
    $mail->SMTPSecure = "ssl";   // sets the prefix to the servier   
    // Port SMPT
    $mail->Port       = 465;//587;         // cong gui mail de nguyen

    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;  // khai bao dia chi email
    $mail->Password   = $mPass;              // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    //$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $title;// tieu de email 
    $mail->isHTML(true);
    $mail->MsgHTML($body);// noi dung chinh cua mail se nam o day.

    foreach ($aCC as $key => $value) {
    	
    	$mail->AddCC($value['address'], $value['name']);
    }

    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    if(!$mail->Send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
         
    } else {
         
        echo 'You sent a mail to ' . $mTo;
    }

    /*Research and test sending email using the PHPMailer on an hour. Ref: 
    http://stackoverflow.com/questions/21937586/phpmailer-smtp-error-password-command-failed-when-send-mail-from-my-server
    http://freetuts.net/huong-dan-gui-mail-trong-php-voi-phpmailer-710.html
    https://www.sitepoint.com/sending-emails-php-phpmailer*/
?>