<?php
session_start();

include('includes/config.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;  
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

function sendemail_verify($fname,$email,$verify_token)
{
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "nahodnybot117@gmail.com";
    $mail->Password = "uuoxozvyklxqwgpy";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("nahodnybot117@gmail.com","ZiPlay-no-reply");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Verifikacny email - ZiPlay";

    $email_template = "
        <h2>Registrovali ste sa na ZiPlay</h2>
        <h5>Overte svoj email kliknutim dole na link</h5>
        <br/><br/>
        <a href='http://localhost/web/loginsystem/verify-email.php?token=$verify_token'> Klikni </a>
        ";

        $mail->Body = $email_template;
        $mail->send();
}

if(isset($_POST["register_btn"]))
{
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $password = $_POST["password"];
    $verify_token = md5(rand());

    // Email existuje alebo nie
    $check_email_query = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($con,$check_email_query );

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['status'] = "Email už existuje";
        header("Location: signup.php");
    }
    else
    {
        $query = "INSERT INTO users (fname, lname, email, contactno, password, verify_token) VALUES ('$fname','$lname','$email','$contact','$password','$verify_token')";
        $query_run = mysqli_query($con, $query);

        if($query_run)
        {
            sendemail_verify("$fname","$email","$verify_token");

            $_SESSION['status'] = "Registracia uspesna! Prosim overte vasu email adresu";
            header("Location: signup.php");
        }
        else
        {
            $_SESSION['status'] = "Registracia neuspesna";
            header("Location: signup.php");
        }
    }
}

?>