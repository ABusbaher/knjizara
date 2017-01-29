<?php
// UKLJUČIVANJE KLASA I STARTOVANJE SESIJE //
  require_once 'core/init.php';
  Session::start();
?>
<!DOCTYPE html>
   <html lang="en">
   <head>
       <meta charset="UTF-8">
       <link rel="stylesheet" href="css/style.css"/>
       <!-- Latest compiled and minified CSS -->
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="css/bootstrap.min.css"/>
       <script src="js/bootstrap.min.js"></script>
       <title>Knjige</title>
   </head>
   <body>
   <nav id="glavna-nav" class="navbar navbar-inverse">
    <div class="container-fluid" id="nav">
    <div class="navbar-header" id="logo">
      <ul class="nav navbar-nav">
        <li><a  href="index.php">Knjige</a></li>
        <li><a href="search.php">Pretraži knjige</a></li>
      </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
    <?php
    // ISPIS NAVIGACIJE (JEDNA JE KADA JE ULOGOVAN A DRUGA KADA NIJE)  // 
     Session::check_the_login_nav($str="logout.php");
    ?>
    </ul>
    </nav>