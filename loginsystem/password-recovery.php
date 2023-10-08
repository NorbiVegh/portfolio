<?php
include('includes/config.php');
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';

$mail = new PHPMailer;
if(isset($_POST['send'])){


$femail=$_POST['femail'];

$row1=mysqli_query($con,"select email,password,fname from users where email='$femail'");
$row2=mysqli_fetch_array($row1);
if($row2>0)
{
$toemail = $row2['email'];
$fname = $row2['fname'];
$subject = "Obnova hesla";
$password=$row2['password'];
$message = "Vaše heslo je ".$password;
$mail->isSMTP();                            // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                     // Enable SMTP authentication
$mail->Username = 'nahodnybot117@gmail.com';    // SMTP username
$mail->Password = 'uuoxozvyklxqwgpy'; // SMTP password
$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                          // TCP port to connect to
$mail->setFrom('nahodnybot117@gmail.com','ZiPlay-no-reply');
$mail->addAddress($toemail);   // Add a recipient
$mail->isHTML(true);  // Set email format to HTML
$bodyContent=$message;
$mail->Subject =$subject;
$bodyContent = 'Milý'." ".$fname;
$bodyContent .='<p>'.$message.'</p>';
$mail->Body = $bodyContent;
if(!$mail->send()) {
echo  "<script>alert('Správa nemohla byť odoslaná.');</script>";
echo 'Chyba pri odosielaní e-mailu.: ' . $mail->ErrorInfo;
} else {
   echo  "<script>alert('Vaše heslo bolo úspešne odoslané.');</script>";
}

}
else
{
echo "<script>alert('Email nie je zaregistrovaný u nás.');</script>";   
}
}






?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Resetovanie hesla |</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../fontawesome/css/all.css">
        <link rel="icon" type="image/x-icon" href="../obrazky/logo-big.png">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
<h2 align="center">Systém registrácie a prihlásenia.</h2>
<hr />
<h3 class="text-center font-weight-dark my-4">Obnova hesla.</h3></div>
<div class="card-body">

<div class="small mb-3 text-muted">Zadajte svoju e-mailovú adresu a pošleme vám heslo na vašu e-mailovú adresu.</div>


<form method="post">
                                           
<div class="form-floating mb-3">
<input class="form-control" name="femail" type="email" placeholder="name@example.com" required />
<label for="inputEmail">Email</label>
</div>

<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="login.php">Späť na prihlásenie</a>
<button class="btn btn-primary" type="submit" name="send">Resetovať heslo</button>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="signup.php">Potrebujete účet? Zaregistrujte sa!</a></div>
                        <div class="small"><a href="index.php">Naspäť</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
       <?php include('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
