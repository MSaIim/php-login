<?php
  $user_error = "";
  $pass_error = "";
  $some_msg = "";

  if(isset($_POST["login"])) {
    login();
  }

  if(isset($_POST["register"])) {
    register();
  }

  function db_connect() {
    $username = "USERNAME";
    $password = "PASSWORD";

    $conn = new PDO('mysql:host=localhost;dbname=usersDB', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
  }

  function validate($username, $password) {
    $valid = true;
    global $user_error;
    global $pass_error;

    if($username == "") {
      $user_error = "Invalid username";
      $valid = false;
    }

    if($password == "") {
      $pass_error = "Invalid password";
      $valid = false;
    }

    return $valid;
  }

  function login() {
    global $some_msg;

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(validate($username, $password)) {
      try {
        $conn = db_connect();

        $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->execute(array('username' => $username, 'password' => $password));

        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if(!empty($row)) {
          // Get hash and salt from database
          $hashAndSalt = $row->password;

          // Verify it
          if(password_verify($password, $hashAndSalt)) {
            $_SESSION["username"] = $row->username;
          } else {
            $some_msg = '<span id="login"><img src="images/cross.png"/> User could not be found</span>';
          }

        } else {
          $some_msg = '<span id="login"><img src="images/cross.png"/> User could not be found</span>';
        }

        // Close the connection
        $conn = null;

      } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
      }
    }
  }

  function register() {
    global $some_msg;

    $username = $_POST["username"];
    $password = $_POST["password"];

    if(validate($username, $password)) {
      try {
        $conn = db_connect();

        $stmt = $conn->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        //$stmt->execute(array('username' => $username, 'password' => $password));

        $row = $stmt->fetch(PDO::FETCH_OBJ);

        if(empty($row)) {
          $hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
          $email = "$username@cloudlet.com";

          $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
          $stmt->bindParam(':username', $username, PDO::PARAM_STR);
          $stmt->bindParam(':email', $email, PDO::PARAM_STR);
          $stmt->bindParam(':password', $hashAndSalt, PDO::PARAM_STR);
          $stmt->execute();

        } else {
          $some_msg = '<span id="login"><img src="images/cross.png"/> User already registered</span>';
        }

        // Close the connection
        $conn = null;

      } catch(PDOException $e) {
        echo "ERROR: " . $e->getMessage();
      }
    }
  }

  function getUsername() {
    if(isset($_POST["username"])) {
      return $_POST["username"];
    }
  }

  function getLoginText() {
    global $login_text;

    if(isset($_SESSION["username"])) {
      return "Welcome " . $_SESSION["username"] . "!";
    }

    return '<a href="#" id="login-link">Login</a> | <a href="#" id="register-link">Register</a>';
  }

  function getUserError() {
    global $user_error;
    return $user_error;
  }

  function getPassError() {
    global $pass_error;
    return $pass_error;
  }

  function getSomeMsg() {
    global $some_msg;
    return $some_msg;
  }
?>
