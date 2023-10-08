<?php
session_start();

include('includes/config.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,verify_status FROM users WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0)
    {
        $row = mysqli_fetch_array($verify_query_run);
        if($row['verify_status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users SET verify_status ='1' WHERE verify_token='$clicked_token' LIMIT 1 ";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run)
            {
                $_SESSION['status'] = "Vas email bol uspesne verifikovany.";
                header("Location: login.php");
                exit(0);
            }
            else
            {
                $_SESSION['status'] = "Verifikacia neuspesna";
                header("Location: login.php");
                exit(0);
            }
        }
        else
        {
            $_SESSION['status'] = "Email uz je aktivovany. Prosim prihlaste sa";
            header("Location: login.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "Tento token neexistuje";
        header("Location: login.php");
    }
}
else
{
    $_SESSION['status'] = "Nemate pristup";
    header("Location: login.php");
}

?>