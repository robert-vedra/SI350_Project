<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="USNA Club Sports Database">
  <meta name="keywords" content="USNA, Club Sports, Athletics">
  <meta name="author" content="MIDN Database Team">
  <title>USNA Club Sports</title>
  <link rel="stylesheet" href="styles.css">
  <style>
  table caption {
    font-size: 24px; 
    font-weight: bold; 
    padding-bottom: 10px; 
    margin-bottom: 20px; 
    text-align: center; 
  }
  </style>
</head>

<body>

<?php include 'navbar.php'; ?>

<!-- SEARCH BAR BABY LETS GO-->
<div class="search-container" style="margin: 20px auto; text-align: center;">
  <form action="searchResults.php" method="GET">
    <input type="text" name="team" placeholder="Search for a team..." style="width: 60%; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="submit" value="Search" style="padding: 10px 20px; background-color: navy; color: white; border: none; border-radius: 5px; cursor: pointer;">
  </form>
</div>

<h1 class="highlight">Welcome to the USNA Club Sports Database!</h1>
<h3>Supporting Midshipmen Athletics Across the Yard</h3>

<p><b>Click <a href="login.html">here</a> to log in!</b></p>

<div class="card">
  <div class="col-md-6">
    <p>This database supports:</p>
    <ul>
      <li>Club Team Management</li>
      <li>Competition Scheduling</li>
      <li>Roster & Eligibility Tracking</li>
      <li>Performance & Stats Recording</li>
    </ul>
  </div>
</div>

<div class="card" style="margin-left: 10px;">
  <div class="col-md-6">
    <p>Our mission:</p>
    <ol>
      <li>Enable smooth administration of all club teams</li>
      <li>Provide accurate, real-time athletic information</li>
      <li>Support Midshipmen in achieving athletic excellence</li>
      <li>Promote a strong and active club sports culture</li>
      <li><span style="color: red; font-weight: bold;">BEAT ARMY!</span></li>
    </ol>
  </div>
</div>

<div style="clear: both;"></div>
<?php
// Read the clubs.txt file
$clubs = [];

// Check if the file exists
if (file_exists('clubs.txt')) {
    $file = fopen('clubs.txt', 'r');

    // Loop through each line in the file
    while (($line = fgets($file)) !== false) {
        // Split the line by '|' and trim any extra spaces
        $parts = array_map('trim', explode('|', $line));
        
        // Add the club details to the $clubs array
        $clubs[] = [
            'team' => $parts[0],
            'captain' => $parts[1],
            'practice' => $parts[2],
            'competition' => $parts[3]
        ];
    }

    fclose($file);
}

// Randomly select a club
$random_club = $clubs[array_rand($clubs)];
?>




<!-- Featured club of the week table -->
<div class="row">
  <div class="seven columns">
    <div id="initialtable">
      <table>
        <caption style="caption-side: top; text-align: center;">Featured Club!</caption>
        <thead>
          <tr><th>Team</th><th>Captain</th><th>Practice Times</th><th>Next Competition</th></tr>
        </thead>
        <tbody>
          <tr>
            <td><?php echo $random_club['team']; ?></td>
            <td><?php echo $random_club['captain']; ?></td>
            <td><?php echo $random_club['practice']; ?></td>
            <td><?php echo $random_club['competition']; ?></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<footer class="container mt-4">
  <div class="row text-center">
    <br>
    <div class="col-12 mb-3">
      <a href="mailto:clubsports@usna.edu" class="btn btn-primary btn-sm">Email Admin</a>
    </div>
    <div class="col-12 mb-2">
      <small>USNA Club Sports Database — Maintained by Midshipmen</small>
    </div>
    <div class="col-12">
      <b>Click <a href="logout.php">here</a> to log out!</b>
    </div>
  </div>
</footer>

</body>
</html>
