<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="USNA Club Sports Database">
  <meta name="keywords" content="USNA, Club Sports, Athletics">
  <meta name="author" content="MIDN Database Team">
  <title>USNA Club Sports</title>
  <link rel="stylesheet" href="styles.css">
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

<!-- Featured club of the week table -->
<div class="row">
  <div class="seven columns">
    <div id="initialtable">
      <table>
        <caption style="caption-side: top; text-align: center;">Featured Club of the Week</caption>
        <thead>
          <tr><th>Team</th><th>Captain</th><th>Practice Times</th><th>Next Competition</th></tr>
        </thead>
        <tbody>
          <tr><td>Triathlon Club</td><td>1/C Wong</td><td>MWF 0530</td><td>Army-Navy Tri, Apr 26</td></tr>
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
