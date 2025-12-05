<?php
session_start();

//get club name from URL
$team = isset($_GET['team']) ? trim($_GET['team']) : "";

include 'navbar.php';

if ($team === "") {
    echo "<h2>No club specified.</h2>";
    exit;
}

$clubData = null;
if (file_exists("clubs.txt")) { //read clubs file
    $file = fopen("clubs.txt", "r");
    while (($line = fgets($file)) !== false) { //read each line
        $parts = array_map('trim', explode("|", $line));
        if (strcasecmp($parts[0], $team) === 0) {
            //when matching club is found
            $clubData = $parts;
            break;
        }
    }
    fclose($file);
}

//If club not found
if (!$clubData) {
    echo "<h2>Club not found.</h2>";
    exit;
}

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title><?php echo htmlspecialchars($clubData[0]); ?> Club</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<h1><?php echo htmlspecialchars($clubData[0]); ?> Club</h1>

<h3>Captain:</h3>
<p><?php echo htmlspecialchars($clubData[1] ?? "Unknown"); ?></p>

<h3>Practice Times:</h3>
<p><?php echo htmlspecialchars($clubData[2] ?? "Unknown"); ?></p>

<h3>Next Competition:</h3>
<p><?php echo htmlspecialchars($clubData[3] ?? "Unknown"); ?></p>

<hr>

<h2>Members</h2>

<?php
$members = [];

if (file_exists("LOG.txt")) {
    $file = fopen("LOG.txt", "r");
    fgets($file); //skip header

    while (($line = fgets($file)) !== false) {
        $fields = explode("\t", trim($line));

        $interestList = array_map('trim', explode(",", $fields[6]));

        foreach ($interestList as $interest) {
            if (strcasecmp($interest, $team) === 0) {
                $members[] = [
                    'name' => $fields[0],
                    'email' => $fields[1],
                    'company' => $fields[3],
                    'classYear' => $fields[4]
                ];
                break;
            }
        }
    }
    fclose($file);
}

if (count($members) === 0) {
    echo "<p>No members yet.</p>";
} else {
    echo "<ul>";
    foreach ($members as $m) {
        echo "<li>";
        echo htmlspecialchars($m['name']) . " — ";
        echo htmlspecialchars($m['classYear']) . ", ";
        echo htmlspecialchars($m['company']);
        echo " (<a href='profile.php?user=" . urlencode($m['email']) . "'>Profile</a>)";
        echo "</li>";
    }
    echo "</ul>";
}

?>

</body>
</html>
