

<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Club Sports Registration">
<meta name="keywords" content="USNA, Club Sports, About">
<meta name="author" content="USNA">
<title>Club Sports About</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<style>
    .grid-container {
      display: grid;
      grid-template-columns: 1fr 2fr;
      grid-template-rows: auto auto auto;
      gap: 20px;
      padding: 20px;
      flex-grow: 1;
    }
    .grid-item {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .hero {
      grid-row: 1 / 4;  
      grid-column: 1;
      padding: 0;
    }

    .hero img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px;
    }

    .blue, .gold{
      grid-column: 2;
    }

    .gold {
      background-color: gold;
      text-align: center;
    }
    .blue {
      background-color: rgb(4, 0, 123);
      color: #fffee3;
      text-align: center;
    }




    .flex-section {
      background-color: #fffee3;
      color: rgb(4, 0, 123);
      padding: 2rem 1rem;
    }

    .flex-section h2 {
      text-align: center;
      margin-bottom: 1rem;
    }

    .flex-container {
      display: flex;
      justify-content: space-around; 
      align-items: center;         
      flex-wrap: wrap;            
      gap: 1rem;
      max-width: 1000px;
      margin: 0 auto;
    }

    .flex-item {
      background-color: rgb(4, 0, 123);
      border-radius: 10px;
      padding: 1rem;
      width: 200px;
      text-align: center;
      box-shadow: 0 2px 6px rgba(0,0,0,0.3);
      transition: transform 0.3s ease;
    }

    .flex-item img {
      width: 100%;
      border-radius: 8px;
    }

    .flex-item h3 {
      color: #e0e0e0;
    }

    .flex-item p {
      margin: 0;
      color: #e0e0e0;
    }
  </style>
</head>

<body>

<h1 class="mb-4">About us</h1>


    <div class="flex-container">
      <div class="flex-item">
        <img src="http://midn.cs.usna.edu/~m261428/SI350/SI350_Project/reese.jpg">
        <h3>Reese Dalzell</h3>
      </div>

      <div class="flex-item">
        <img src="http://midn.cs.usna.edu/~m261428/SI350/SI350_Project/kep.JPG">
        <h3>Thomas Kephart</h3>
      </div>

      <div class="flex-item">
        <img src="http://midn.cs.usna.edu/~m261428/SI350/SI350_Project/bob.jpg">
        <h3>Bobby Vedra</h3>
      </div>
    </div>
<br>
<br>
<div style = "text-align: center;">
    <p>
        Reese Dalzell is a Data Science major in his first class year at USNA. He service selected Navy Pilot. Reese is a member of the club hockey and club lacrosse teams.
    </p>
    <br>
    <p>
        Thomas Kephart is a Data Science major in his first class year at USNA. He service selected USMC Ground. Thomas is a member of Navy Track and Field.
    </p>
    <br>
    <p>
        Bobby Vedra is a Data Science major in his first class year at USNA. He service selected USMC Ground. Bobby is a member of the club hockey team.
    </p>
</div>
