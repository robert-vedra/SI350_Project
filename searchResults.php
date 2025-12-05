<?php
// Read the search term
$searchTerm = isset($_GET['team']) ? trim($_GET['team']) : "";
$results = [];

// Load clubs.txt
$filename = "clubs.txt";

if (file_exists($filename)) {
    $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        // Each line is: Team | Captain | Practice Times | Next Competition
        $parts = array_map('trim', explode("|", $line));

        if (count($parts) === 4) {
            list($team, $captain, $practice, $nextComp) = $parts;

            // Case-insensitive match
            if (stripos($team, $searchTerm) !== false) {
                $results[] = [
                    "team" => $team,
                    "captain" => $captain,
                    "practice" => $practice,
                    "nextComp" => $nextComp
                ];
            }
        }
    }
} else {
    die("<h2>Error: clubs.txt not found.</h2>");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Results</title>
    <link rel="stylesheet" href="styles.css">
</head>


<!-- A lot of these classes were gotten from chat with some bootstrap library i replaced with styles.css above - need to change them -->
<body class="container mt-4">

<h2>Search Results for "<?php echo htmlspecialchars($searchTerm); ?>"</h2>
<a href="index.php" class="btn btn-secondary btn-sm mb-3">Back to Home</a>
<br>
<br>

<?php if (empty($searchTerm)): ?>
    <div class="alert alert-warning">Please enter a search term.</div>
<?php elseif (empty($results)): ?>
    <div class="alert alert-danger">No teams found.</div>
<?php else: ?>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Team</th>
                <th>Captain</th>
                <th>Practice Times</th>
                <th>Army Competition</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $r): ?>
            <tr>
                <td><?php echo htmlspecialchars($r['team']); ?></td>
                <td><?php echo htmlspecialchars($r['captain']); ?></td>
                <td><?php echo htmlspecialchars($r['practice']); ?></td>
                <td><?php echo htmlspecialchars($r['nextComp']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

</body>
</html> 
