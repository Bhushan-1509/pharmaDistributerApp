<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PHPMailerController extends Controller
{
    public function sendMail($request){
        require "vendor/autoload.php";
        $mail = new PHPMailer(true);


        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->SMTPAuth = true;
            $mail->Username = env('ADMIN_MAIL_ADDRESS');   //  sender username
            $mail->Password = 'Roboscript@1245';       // sender password
            $mail->SMTPSecure = 'ssl';                  // encryption - ssl/tls
            $mail->Port = 465;                          // port - 587/465
            $mail->Priority = 1;
            $mail->setFrom(env('ADMIN_MAIL_ADDRESS'), 'Laravel Admin');
            $mail->addAddress(env('ADMIN_MAIL_ADDRESS'));
            $mail->isHTML(false);                // Set email content format to HTML
            $mail->Subject = "Got query from customer";
            $mail->Body    = "Query here ....";

            $res = $mail->send();
            dd($res);
            return $res;
        }
        catch (Exception $e) {
            return back()->with('error','Message could not be sent.');
        }

    }


}
