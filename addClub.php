<?php
session_start();
$loggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true;
?>


<?php //ensure logged in
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit;
}

//process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $team = $_POST['team'] ?? '';
    $captain = $_POST['captain'] ?? '';
    $practice = $_POST['practice'] ?? '';
    $nextComp = $_POST['nextComp'] ?? '';

    //append to clubs.txt
    if ($team && $captain && $practice && $nextComp) {
        $line = "$team | $captain | $practice | $nextComp\n";
        file_put_contents("clubs.txt", $line, FILE_APPEND);
        $msg = "Club added.";
    } else {
        $msg = "Fill all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="styles.css">
<title>Add Club</title>
</head>
<body>

<?php include 'navbar.php'; ?>


<h1>Add New Club</h1>

<?php if(!$loggedIn): ?>
    <h2>You must be logged in to add a club.</h2>
    <p><a href="login.html">Login here</a></p>
<?php else: ?>
    <form method="post">
      <input type="text" name="team" placeholder="Team name"><br><br>
      <input type="text" name="captain" placeholder="Team Captain"><br><br>
      <input type="text" name="practice" placeholder="Practice Times"><br><br>
      <input type="text" name="nextComp" placeholder="Next Competition"><br><br>
      <input type="submit" value="Add Club">
    </form>
<?php endif; ?>
