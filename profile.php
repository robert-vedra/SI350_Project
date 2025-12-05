<?php
session_start();

// get the requested user from URL
$userEmail = isset($_GET['user']) ? trim($_GET['user']) : "";

// basic existence check
if ($userEmail === "") {
    echo "<h2>No profile specified.</h2>";
    exit;
}

// search LOG.txt for the user
$found = false;
$profile = [];

// open file
if (file_exists("LOG.txt")) {
    $file = fopen("LOG.txt", "r");

    // skip header
    fgets($file);

    while (($line = fgets($file)) !== false) {
        $fields = explode("\t", trim($line));

        // match email (case-insensitive)
        if (strcasecmp($fields[1], $userEmail) === 0) {
            $profile = $fields;
            $found = true;
            break;
        }
    }

    fclose($file);
}

// if not found, go to default page
if (!$found) {
    include 'navbar.php';
    echo "<h2>This user has deleted their profile.</h2>";
    exit;
}

include 'navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo htmlspecialchars($profile[0]); ?> - Profile</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h1><?php echo htmlspecialchars($profile[0]); ?></h1>

<ul>
    <li><b>Email:</b> <?php echo htmlspecialchars($profile[1]); ?></li>
    <li><b>Company:</b> <?php echo htmlspecialchars($profile[3]); ?></li>
    <li><b>Class Year:</b> <?php echo htmlspecialchars($profile[4]); ?></li>
    <li><b>Experience:</b> <?php echo htmlspecialchars($profile[5]); ?></li>
    <li><b>Additional Info:</b> <?php echo htmlspecialchars($profile[7]); ?></li>
</ul>

<h3>Clubs / Teams</h3>
<?php
// parse interest list
$interests = array_map('trim', explode(',', $profile[6]));

if (count($interests) === 0 || $profile[6] === "") {
    echo "<p>No clubs listed.</p>";
} else {
    echo "<ul>";
    foreach ($interests as $club) {
        echo "<li>" . htmlspecialchars($club) . "</li>";
    }
    echo "</ul>";
}
?>

</body>
</html>
