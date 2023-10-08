<?php
include('code.php');

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php';



?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrácia používateľov |</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../fontawesome/css/all.css">
        <link rel="icon" type="image/x-icon" href="../obrazky/logo-big.png">
        <script src="https://www.google.com/recaptcha/api.js" async defer></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.confirmpassword.value)
{
alert(' Heslo a Potvrdenie hesla sa nezhodujú');
document.signup.confirmpassword.focus();
return false;
}
return true;
} 



</script>

    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="alert">
                                    <?php
                                        if(isset($_SESSION['status']))
                                        {
                                            echo "<h4>".$_SESSION['status']."</h4>";
                                            unset($_SESSION['status']);
                                        }
                                    ?>
                                </div>
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header">
<h2 align="center">Registrácia používateľov</h2>
<hr />
                                        <h3 class="text-center font-weight-light my-4">Vytvoriť účet</h3></div>
                                    <div class="card-body">
<form method="post" name="signup" action="code.php" onsubmit="return checkpass();">


<div class="row mb-3">
<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="fname" name="fname" type="text" placeholder="Zadajte Vaše meno" required />
<label for="inputFirstName">Meno</label>
</div>
</div>
                                                
<div class="col-md-6">
<div class="form-floating">
<input class="form-control" id="lname" name="lname" type="text" placeholder="Zadajte Vaše priezvisko" required />
 <label for="inputLastName">Priezvisko</label>
</div>
</div>
</div>


<div class="form-floating mb-3">
<input class="form-control" id="email" name="email" type="email" placeholder="Zadajte Váš email" required />
<label for="inputEmail">Email</label>
</div>
 

<div class="form-floating mb-3">
<input class="form-control" id="contact" name="contact" type="text" placeholder="Zadajte Vašu adresu" required />
<label for="inputcontact">Adresa</label>
</div>
        


<div class="row mb-3">
<div class="col-md-6">
 <div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="password" name="password" type="password" placeholder="Vytvorte heslo" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="aspoň jedno číslo,jedno veľké písmeno,jedno male pismeno a 6 alebo viac pismen" required/>
<label for="inputPassword">Heslo</label>
</div>
</div>
                                                

<div class="col-md-6">
<div class="form-floating mb-3 mb-md-0">
<input class="form-control" id="confirmpassword" name="confirmpassword" type="password" placeholder="Zadajte heslo ešte raz" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="aspoň jedno číslo,jedno veľké písmeno,jedno male pismeno a 6 alebo viac pismen" required />
<label for="inputPasswordConfirm">Potvrdiť heslo</label>
</div>
</div>
<div class="g-recaptcha pt-2" style="transform: scale(0.90); 
                            -webkit-transform: scale(0.9); transform-origin: 0 0;
                            -webkit-transform-origin: 0 0;" data-theme="dark"
                            data-sitekey="6LffD6EkAAAAAEfmYfAK-W0dUYN53rhZXyvlj_c3"></div>
</div>

                                            

<div class="mt-4 mb-0">
<div class="d-grid"><button type="submit" class="btn btn-primary btn-block" name="register_btn">Vytvoriť účet</button></div>
</div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3 pt-5">
 <div class="small"><a href="login.php">Máte u nás účet? Prihlásiť sa.</a></div>
  <div class="small"><a href="index.php">Späť</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
         <?php include_once('includes/footer.php');?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
