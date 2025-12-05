<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubs</title>
    <link rel="stylesheet" href="styles.css">
</head>
</html>


<?php
include 'navbar.php';
?>

<h1>Clubs</h1>

<table>
<tr><th>Team</th><th>Captain</th><th>Practice</th><th>Next Comp</th></tr>

<?php
if (file_exists("clubs.txt")) {
    $file = fopen("clubs.txt", "r");

    //read each line and display
    while (($line = fgets($file)) !== false) {
        $parts = array_map('trim', explode("|", $line));
        echo "<tr>";
        echo "<td><a href='club.php?team=" . urlencode($parts[0]) . "'>" . htmlspecialchars($parts[0]) . "</a></td>";
        echo "<td>" . htmlspecialchars($parts[1]) . "</td>";
        echo "<td>" . htmlspecialchars($parts[2]) . "</td>";
        echo "<td>" . htmlspecialchars($parts[3]) . "</td>"; 
        echo "</tr>";
    }
    fclose($file);
}
?>
</table>
