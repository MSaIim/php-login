<?php include "scripts/php/bg.php"; ?>
<!DOCTYPE html>
<html>
<head>
  <title>PHP Login</title>

  <meta charset="utf-8"/>
  <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>

  <link rel="icon" type="image/ico" href="images/logo.ico">
  <link rel="stylesheet" href="css/style.css">

  <!-- BOOTSTRAP & JQUERY -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Poiret+One|Open+Sans+Condensed:300|Roboto+Condensed" rel="stylesheet">

  <style type="text/css">
    #content { background-image: url("images/<?php echo getBackground(); ?>"); }
  </style>

  <?php include "scripts/php/page.php"; ?>
</head>

<body>
  <?php include "scripts/php/myconn.php"; ?>

  <div class="container" id="content">
    <div class="row top-margin">
      <section id="login-info">

        <header>
          <img src="images/logo.png" width="35" height="35"/>
          <?php
            echo getLoginText();
            echo "\n";
          ?>
          <br/><?php echo getSomeMsg(); echo "\n"; ?>
        </header>

        <form class="form-group" method="post">
          <label for="username" class="form-control-label">Username:</label>
          <span class="error-text"><?php echo getUserError(); ?></span>
          <input type="text" class="form-control" id="username" name="username" value="<?php echo getUsername(); ?>" placeholder="Username"/>
          <br/>

          <label for="password" class="form-control-label">Password:</label>
          <span class="error-text"><?php echo getPassError(); ?></span>
          <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password"/>
          <br/>

          <button class="btn btn-success" type="submit" name="login" id="login-button">Login</button>
          <button class="btn btn-danger" type="submit" name="register" id="register-button">Register</button>
          <button class="btn btn-primary" type="reset" id="clear">Clear</button>
        </form>
      </section>
    </div>
  </div>

  <!-- JAVASCRIPT -->
  <script type="text/javascript" src="scripts/js/tabs.js"></script>

</body>
</html>
