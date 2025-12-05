<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar">
  <ul class="nav-list">
    <li><a href="index.php" class="nav-link">Home</a></li>
    <li><a href="clubs.php" class="nav-link">Clubs</a></li>
    <li><a href="schedule.php" class="nav-link">Schedule</a></li>
    <li><a href="registration.php" class="nav-link">Register</a></li>
    <li><a href="statistics.php" class="nav-link">Statistics</a></li>
    <li><a href="about.php" class="nav-link">About</a></li>

    <!-- Show login/profile links based on session status -->
    <?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true): ?>
        <li><a href="login.html" class="nav-link">Login</a></li>

    <?php else: ?>
        <li><a href="profile.php?user=<?php echo urlencode($_SESSION['username']); ?>" class="nav-link">Profile</a></li>
        <li><a href="addClub.php" class="nav-link">Add Club</a></li>
        <li><a href="logout.php" class="nav-link">Logout</a></li>
        
    <?php endif; ?>
  </ul>
</nav>
