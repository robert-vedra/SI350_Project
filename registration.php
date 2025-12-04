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
<?php include 'navbar.php'; ?>

<h1 class="mb-4">Club Sports Registration</h1>

<form method="post" action="submit.php">

  <div class="mb-3">
    <label for="email" class="form-label">USNA Email</label>
    <input type="email" class="form-control" name="email" id="email" placeholder="m2XXXXX@usna.edu" required>
  </div>

  <div class="mb-3">
    <label>Password:</label><br>
    <input type="password" name="password" required>
  </div>

  <div class="mb-3">
    <label for="user" class="form-label">Full Name</label>
    <input type="text" class="form-control" name="user" id="user" required>
  </div>

  <div class="mb-3">
    <label for="company" class="form-label">Company</label>
    <select name="company" id="company" class="form-select" required>
      <option value="">Select your company</option>
      <option value="1st Company">1st Company</option>
      <option value="2nd Company">2nd Company</option>
      <option value="3rd Company">3rd Company</option>
      <option value="4th Company">4th Company</option>
      <option value="5th Company">5th Company</option>
      <option value="6th Company">6th Company</option>
      <option value="7th Company">7th Company</option>
      <option value="8th Company">8th Company</option>
      <option value="9th Company">9th Company</option>
      <option value="10th Company">10th Company</option>
      <option value="11th Company">11th Company</option>
      <option value="12th Company">12th Company</option>
      <option value="13th Company">13th Company</option>
      <option value="14th Company">14th Company</option>
      <option value="15th Company">15th Company</option>
      <option value="16th Company">16th Company</option>
      <option value="17th Company">17th Company</option>
      <option value="18th Company">18th Company</option>
      <option value="19th Company">19th Company</option>
      <option value="20th Company">20th Company</option>
      <option value="21st Company">21st Company</option>
      <option value="22nd Company">22nd Company</option>
      <option value="23rd Company">23rd Company</option>
      <option value="24th Company">24th Company</option>
      <option value="25th Company">25th Company</option>
      <option value="26th Company">26th Company</option>
      <option value="27th Company">27th Company</option>
      <option value="28th Company">28th Company</option>
      <option value="29th Company">29th Company</option>
      <option value="30th Company">30th Company</option>
      <option value="31st Company">31st Company</option>
      <option value="32nd Company">32nd Company</option>
      <option value="33rd Company">33rd Company</option>
      <option value="34th Company">34th Company</option>
      <option value="35th Company">35th Company</option>
      <option value="36th Company">36th Company</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="classYear" class="form-label">Class Year</label>
    <select name="classYear" id="classYear" class="form-select" required>
      <option value="">Select Class Year</option>
      <option value="1/C">1/C</option>
      <option value="2/C">2/C</option>
      <option value="3/C">3/C</option>
      <option value="4/C">4/C</option>
    </select>
  </div>

  <div class="mb-3">
    <label for="experience" class="form-label">Prior experience</label>
    <input type="text" class="form-control" name="experience" id="experience" placeholder="E.g., years played, previous teams, achievements">
  </div>

  <div class="mb-3">
    <label class="form-label">Sports/Activities You Are Interested In:</label>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="interests[]" value="Running">Running</div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="interests[]" value="Swimming">Swimming</div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="interests[]" value="Strength Training">Strength Training</div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="interests[]" value="Team Sports">Team Sports</div>
    <div class="form-check"><input class="form-check-input" type="checkbox" name="interests[]" value="Endurance Sports">Endurance Sports</div>
  </div>

  <div class="mb-3">
    <label for="AddInfo" class="form-label">Additional Info</label>
    <textarea name="AddInfo" id="AddInfo" class="form-control" rows="3"></textarea>
  </div>

  <button type="submit" class="btn btn-primary">Submit Registration</button>
</form>
</body>
</html>