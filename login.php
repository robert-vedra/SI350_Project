<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


//check if LOG.txt exists
if (file_exists('LOG.txt')) {
    //open the file for reading
    $file = fopen('LOG.txt', 'r');

    if ($file) {
        // Skip header line
        fgets($file);

        while (($line = fgets($file)) !== false) {
            //get each line
            $fields = explode("\t", trim($line));

            //check username and password match
            if ($fields[1] === $username) {
                if ($fields[3] === $password) {
                    session_start();
                    $_SESSION['username'] = $username;
                    header("Location: requestReport.php");
                    exit;
                }
            }
            
        }
        header("Location: login.html?error=1");
        sleep(1);
        exit;
    }
}
