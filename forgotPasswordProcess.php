<?php 

require "connection.php";
require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    if(empty($email)){
        echo("Please Enter Your email !!!");
    }else{
        $rs = Database::search("SELECT * FROM `user` WHERE `email` ='".$email."'");
        $n = $rs->num_rows;

        if($n == 1){

            $code = uniqid();

            Database::iud("UPDATE `user` SET `verification_code`='".$code."' WHERE
            `email`='".$email."'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'ma20lindu@gmail.com';
            $mail->Password = 'pnehesosxczwagzj';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('ma20lindu@gmail.com', 'Reset Password');
            $mail->addReplyTo('ma20lindu@gmail.com', 'Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Forgot Password Verification Code';
            $bodyContent = '<h1 style=""color:green">Your Verification Code is : '.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if(!$mail->send()){
                echo("Verification code sending failed");
            }else{
                echo("success");
            }

        }else{
            echo("Invalid Email address");
        }
    
    }

     
}
