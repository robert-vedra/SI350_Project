<?php
//start the session to track user login status
session_start();

echo "<nav class='navbar'>
  <ul class='nav-list'>
    <li><a href='index.html' class='nav-link'>Home</a></li>
    <li><a href='schedule.html' class='nav-link'>Schedule</a></li>
    <li><a href='requestReport.php' class='nav-link'>Get Report</a></li>
    <li><a href='registration.html' class='nav-link'>Register</a></li>
    <li><a href='login.html' class='nav-link'>Login</a></li>
    <li><a href='logout.php' class='nav-link'>Logout</a></li>
  </ul>
</nav>";

//check if the user is logged in, if not, then redirect them to login page with an error message
if (!isset($_SESSION['username'])) {
    echo "<p>You must be logged in to view this page. Please <a href='login.html'>login</a>.</p>";
    exit;
}
?>

<?php
//GET class criteria from form
if (isset($_GET['class'])) {
    $selectedClass = $_GET['class'];
} else {
    $selectedClass = "";
}


//read the log.txt file
$filename = "LOG.txt";
if (!file_exists($filename)) {
    echo("LOG.txt not found");
    exit;
}
//read in file as array of lines
$lines = file($filename);

//get the headers
$headers = str_getcsv(array_shift($lines), "\t");


//parse data lines into individual arrays (each index = one field)
$data = [];
foreach ($lines as $line) {
    $row = str_getcsv($line, "\t");
    if (isset($row[3])) {
            $row[3] = "***";
    }
    if ($row[2] === $selectedClass || $selectedClass === "") {      
        $data[]= $row;
    }
}


//sort by name
usort($data, function ($a, $b) {
    return strcmp(strtolower($a[0]), strtolower($b[0])); //strtolower makes it lowercase
});

//count is how many useres fit criteria
$count = count($data);
if ($selectedClass === "") {
    $criteria = "all users";
} else {
    $criteria = "class $selectedClass";
}
$sortDescription = "sorted by name";

//Add in HTML doctype info and link to styles.css
echo "<!DOCTYPE html><html lang='en'><head><meta charset='UTF-8'><title>Request Report</title><link rel='stylesheet' href='styles.css'></head>";

//make the report
echo "<h2>Report: $count user(s) found for $criteria ($sortDescription)</h2>";

//display in table
if ($count > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    foreach ($headers as $h) {
        echo "<th>$h</th>";
    }
    echo "</tr>";

    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo "<td> $cell </td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    echo "<br><br><b>Click <a href = '/~m263306/SI350/Lab07/index.html'>here</a> to get back to the main page!</b>";
} else {
    echo "<p>No users match the selected criteria.</p><br><br><b>Click <a href = '/~m263306/SI350/Lab07/index.html'>here</a> to get back to the main page!</b>";
}
?>

<!--Utilized https://www.w3schools.com/html/html_tables.asp for help with table creation-->