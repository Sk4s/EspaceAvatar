<!DOCTYPE html>
<html lang="en">
<head>
  <title>E.M.A</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="node_modules/mdbootstrap/css/mdb.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/custom.css">
  <link rel="stylesheet" href="css/form.css" type="text/css">

  <style>
    .fa-power-off {
          color: red;
        }

    .fa-home {
          color: LightCyan;
        }

    .glyphicon-log-in {
          color: Lime;
    }

    .glyphicon-user {
          color: LightCyan;
    }

  </style>
</head>
<body style="background: url('default/default-background.jpg') no-repeat center fixed; -webkit-background-size: cover; background-size: cover;">

<nav class="navbar navbar-inverse" style="opacity: 0.8;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="darkhole.php">Espace Membre avec Avatar (E.M.A)</a>
    </div>
    <ul>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php"><span class="fa fa-home"></span>Home</a></li>
    </ul>

    <?php
      if (isset($_SESSION['message'])) {
        echo '
        <ul class="nav navbar-nav navbar-right">
          <li><a href="profile_user.php"><span class="glyphicon glyphicon-cog"></span> Profile</a></li>
          <li><a href="validate_logout.php"><span class="fa fa-power-off"></span> Logout</a></li>
        </ul>
        ';
      // } else if ($_SESSION['logged_in'] == 24) {
      //   echo '
      //   <ul class="nav navbar-nav navbar-right">
      //     <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      //     <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      //   </ul>
      //   ';
      } else {
        // echo 'ERROR !!!!';
        echo '
        <ul class="nav navbar-nav navbar-right">
          <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        </ul>
        ';
      }
    ?>
    </ul>
  </div>
</nav>
  
<div class="container">

</div>

</body>
</html>