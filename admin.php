<?php
include 'navbar.php';
// Initialize an empty array to store the user data
$users = [];

// Open the LOG.txt file and read its contents
if (file_exists('LOG.txt')) {
    $file = fopen('LOG.txt', 'r');

    // Read each line of the file
    while (($line = fgets($file)) !== false) {
        // Split the line by tabs and trim extra spaces
        $parts = array_map('trim', explode("\t", $line));

        // Skip the first line (header) if it exists, or process the data
        if ($parts[0] !== "Name") { // Avoid the header row
            $users[] = [
                'name' => $parts[0],
                'email' => $parts[1],
                'password' => $parts[2],
                'company' => $parts[3],
                'classYear' => $parts[4],
                'position' => $parts[5],
                'interests' => $parts[6],
                'additionalInfo' => $parts[7]
            ];
        }
    }

    fclose($file);
}

// Handle deletion request
if (isset($_GET['delete'])) {
    $deleteIndex = $_GET['delete'];
    
    // Remove the user from the array
    unset($users[$deleteIndex]);

    // Reindex the array to fix the indices
    $users = array_values($users);

    // Re-write the modified data back to LOG.txt
    $file = fopen('LOG.txt', 'w');
    foreach ($users as $user) {
        $line = implode("\t", $user) . "\n";
        fwrite($file, $line);
    }
    fclose($file);

    // Redirect to refresh the page
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Club Sports Registration">
<meta name="keywords" content="USNA, Club Sports, Registration">
<meta name="author" content="USNA">
<title>Club Sports Registration</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>

    <h1>Admin Dashboard</h1>
    <h2>User Data</h2>

    <!-- Display the data in a table -->
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Company</th>
                <th>Class Year</th>
                <th>Experience</th>
                <th>Interests</th>
                <th>Additional Info</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $index => $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                    <td><?php echo htmlspecialchars($user['company']); ?></td>
                    <td><?php echo htmlspecialchars($user['classYear']); ?></td>
                    <td><?php echo htmlspecialchars($user['position']); ?></td>
                    <td><?php echo htmlspecialchars($user['interests']); ?></td>
                    <td><?php echo htmlspecialchars($user['additionalInfo']); ?></td>
                    <td>
                        <!-- Delete button -->
                        <a href="admin.php?delete=<?php echo $index; ?>" class="btn">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>