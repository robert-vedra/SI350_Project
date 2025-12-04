<?php
session_start();

$username = trim($_POST['username']);
$password = trim($_POST['password']);

//check if LOG.txt exists
if (file_exists('LOG.txt')) {

    //open the file for reading
    $file = fopen('LOG.txt', 'r');

    if ($file) {

        //skip the header line
        fgets($file);

        while (($line = fgets($file)) !== false) {

            //get each line
            $fields = explode("\t", trim($line));

            //check username match (case-insensitive)
            if (strcasecmp($fields[1], $username) === 0) {

                //check password match
                if ($fields[2] === $password) {

                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;

                    header("Location: index.php");
                    exit;
                }
            }
        }

        fclose($file);
    }
}

//login failed
header("Location: login.php?error=1");
exit;
?>
