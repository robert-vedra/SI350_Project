<?php
// --------------------------
// Grab POST form data
// --------------------------
$user     = $_POST['user'] ?? "";
$pass     = $_POST['passowrd'] ?? "";
$email    = $_POST['email'] ?? "";
$company  = $_POST['company'] ?? "";
$team     = $_POST['team'] ?? "";
$position = $_POST['position'] ?? "";
$interests = $_POST['interests'] ?? [];
$addInfo  = $_POST['AddInfo'] ?? "";


// --------------------------
// Required field validation
// --------------------------
if (empty($user) || empty($email) || empty($company) || empty($team)) {
    echo "<b>An error occurred:</b> Please fill out all required fields.<br><br>";

    if (empty($user))    echo "Name is required.<br>";
    if (empty($pass))    echo "Password is required.<br>";
    if (empty($email))   echo "Email is required.<br>";
    if (empty($company)) echo "Company is required.<br>";
    if (empty($team))    echo "Team selection is required.<br>";

    echo "<p><button onclick='history.back()'>Go back</button></p>";
    exit;
}


// --------------------------
// Sanitize multi-line text
// Replace newlines with &&
// --------------------------
$addInfo = str_replace(["\r\n", "\r", "\n"], "&&", $addInfo);
$user    = str_replace(["\r\n", "\r", "\n"], "&&", $user);


// --------------------------
// Convert interests array
// --------------------------
$interestStr = implode(",", $interests);


// --------------------------
// Check if email already registered
// --------------------------
if (file_exists("LOG.txt")) {
    $lines = file("LOG.txt");

    foreach ($lines as $line) {
        $row = str_getcsv($line, "\t");

        // Row[1] = email
        if (isset($row[1]) && $row[1] === $email) {
            echo "<b>An error occurred:</b> Email already registered.<br>";
            echo "<p><button onclick='history.back()'>Go back</button></p>";
            exit;
        }
    }
}


// --------------------------
// Write header if file new
// --------------------------
if (!file_exists("LOG.txt")) {
    $header = "Name\tEmail\tCompany\tTeam\tPosition\tInterests\tAdditionalInfo\n";
    file_put_contents("LOG.txt", $header, FILE_APPEND);
}


// --------------------------
// Build TSV line
// --------------------------
$tsv = $user . "\t" .
       $pass . "\t" .
       $email . "\t" .
       $company . "\t" .
       $team . "\t" .
       $position . "\t" .
       $interestStr . "\t" .
       $addInfo . "\n";


// --------------------------
// Save record to file
// --------------------------
file_put_contents("LOG.txt", $tsv, FILE_APPEND);

?>

<!-- BEGIN CONFIRMATION HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Confirmation</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1>Registration Confirmation</h1>

<p>Thank you, <b><?php echo $user; ?></b>, for registering for USNA Club Sports!</p>

<h3>Your registration details:</h3>

<ul>
  <li><b>Name:</b> <?php echo $user; ?></li>
  <li><b>Password:</b> <?php echo $pass; ?></li>
  <li><b>Email:</b> <?php echo $email; ?></li>
  <li><b>Company:</b> <?php echo $company; ?></li>
  <li><b>Team:</b> <?php echo $team; ?></li>
  <li><b>Position/Role:</b> <?php echo $position ?: "N/A"; ?></li>
  <li><b>Interests:</b> <?php echo $interestStr ?: "None selected"; ?></li>
  <li><b>Additional Info:</b> <?php echo $addInfo ?: "None"; ?></li>
</ul>

<p>If you need to make changes, please <button onclick="history.back()">go back</button>.</p>

</body>
</html>
