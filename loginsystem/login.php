<?php session_start(); 
include_once('includes/config.php');
// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$dec_password=$password;
$useremail=$_POST['uemail'];
$ret= mysqli_query($con,"SELECT id,fname FROM users WHERE email='$useremail' and password='$dec_password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{

$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
header("location:../index1.php");

}
else
{
echo "<script>alert('Neplatné používateľské meno alebo heslo.');</script>";
}
}

if(isset($_SESSION['status']))
{
    ?>
    <div class="alert alert-success">
        <h5><?= $_SESSION['status']; ?></h5>
    </div>
    <?php
    unset($_SESSION['status']);
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Prihlásenie používateľa |</title>
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
    <h3 class="text-center font-weight-light my-4">Prihlásenie používateľa</h3></div>
                                    <div class="card-body">
                                        
                                        <form method="post">
                                            
<div class="form-floating mb-3">
<input class="form-control" name="uemail" type="email" placeholder="meno@priklad.com" required/>
<label for="inputEmail">Email</label>
</div>
                                            

<div class="form-floating mb-3">
<input class="form-control" name="password" type="password" placeholder="heslo" required />
<label for="inputPassword">Heslo</label>
</div>


<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
<a class="small" href="password-recovery.php">Zabudli ste heslo?</a>
<button class="btn btn-primary" name="login" type="submit">Prihlásiť</button>
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
