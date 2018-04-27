<?php

session_start();

// $_SESSION['message'] = '';

require 'header.php';

require 'db.php';

require 'validate_profile_update.php';

require 'validate_update_avatar.php';

require 'validate_cv_update.php';

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <style>
        body {
          background: #F1F3FA;
          color: #fff;
        }

        /* Profile container */
        .profile {
          margin: 20px 0;
        }

        /* Profile sidebar */
        .profile-sidebar {
          padding: 20px 0 10px 0;
          background: rgba(24,24,24,0.9);
        }

        .profile-userpic img {
          float: none;
          margin: 0 auto;
          width: 50%;
          height: 50%;
          -webkit-border-radius: 50% !important;
          -moz-border-radius: 50% !important;
          border-radius: 50% !important;
        }

        .profile-usertitle {
          text-align: center;
          margin-top: 20px;
        }

        .profile-usertitle-name {
          color: #5a7391;
          font-size: 16px;
          font-weight: 600;
          margin-bottom: 7px;
        }

        .profile-usertitle-job {
          text-transform: uppercase;
          color: #5b9bd1;
          font-size: 12px;
          font-weight: 600;
          margin-bottom: 15px;
        }

        .profile-userbuttons {
          text-align: center;
          margin-top: 10px;
        }

        .profile-userbuttons .btn {
          text-transform: uppercase;
          font-size: 11px;
          font-weight: 600;
          padding: 6px 15px;
          margin-right: 5px;
        }

        .profile-userbuttons .btn:last-child {
          margin-right: 0px;
        }
            
        .profile-usermenu {
          margin-top: 30px;
        }

        .profile-usermenu ul li {
          border-bottom: 1px solid #f0f4f7;
        }

        .profile-usermenu ul li:last-child {
          border-bottom: none;
        }

        .profile-usermenu ul li a {
          color: #93a3b5;
          font-size: 14px;
          font-weight: 400;
        }

        .profile-usermenu ul li a i {
          margin-right: 8px;
          font-size: 14px;
        }

        .profile-usermenu ul li a:hover {
          background-color: #fafcfd;
          color: #5b9bd1;
        }

        .profile-usermenu ul li.active {
          border-bottom: none;
        }

        .profile-usermenu ul li.active a {
          color: #5b9bd1;
          background-color: #f6f9fb;
          border-left: 2px solid #5b9bd1;
          margin-left: -2px;
        }

        /* Profile Content */
        .profile-content {
          padding: 20px;
          background: rgba(24,24,24,0.9);
          min-height: 460px;
        }

        a {
          text-decoration: none;
        }

        li {
          list-style:none;
        }

        .none {
          cursor: none;
        }

        .profile-input {
          padding-left: 5px;
        }

        .lightSpeedIn {
          padding: 10px 0;
        }

    </style>

    <title></title>
  </head>
  <body>

    <!--
User Profile Sidebar by @keenthemes
A component of Metronic Theme - #1 Selling Bootstrap 3 Admin Theme in Themeforest: http://j.mp/metronictheme
Licensed under MIT
-->

<div class="container">
    <div class="row profile">
    <!-- <div class="col-md-3"> -->
    <div class="col-md-4 col-md-offset-4">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="<?= $_SESSION['avatar'] ?>" class="img-responsive" alt="">
        </div>




            <form style="font-size: 11px;" class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="on">
              <div class="alert alert-error"></div>
              <div class="avatar"><input type="file" name="avatar" accept="image/*" required /></div>
              <input style="font-size: 11px;" type="submit" value="Update avatar" name="update_avatar" class="btn btn-block btn-primary" />
            </form>




        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            <h1 style="font-size: 24px;"><?= $_SESSION['username'] ?></h1>
          </div>
          <div class="profile-usertitle-job animated fadeIn infinite">
            Developer
          </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <!-- <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm animated flipInX">Parameters</button>
          <button type="button" class="btn btn-danger btn-sm animated flipInX">Message</button>
        </div> -->
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        

        <form style="font-size: 11px;" class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="on">
            <div class="alert alert-error"></div>
            <div class="profile-usermenu">
              <ul class="nav-navbar">
                <li class="animated lightSpeedIn">
                  <i class="fa fa-user"></i><span>Username</span>
                  <input type="text" name="username_update" placeholder="<?= $_SESSION['username'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-info-circle"></i><span class="profile-input">Nom</span>
                  <input type="text" name="nom_update" placeholder="<?= $_SESSION['nom'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-info-circle"></i><span class="profile-input">Prenom</span>
                  <input type="text" name="prenom_update" placeholder="<?= $_SESSION['prenom'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-map-marker"></i><span class="profile-input">Adresse</span>
                  <input type="text" name="adresse_update" placeholder="<?= $_SESSION['adresse'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-map-marker"></i><span class="profile-input">Code Postal</span>
                  <input type="text" name="codePostal_update" placeholder="<?= $_SESSION['codePostal'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-map-marker"></i><span class="profile-input">Ville</span>
                  <input type="text" name="ville_update" placeholder="<?= $_SESSION['ville'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-phone"></i><span class="profile-input">Portable</span>
                  <input type="text" name="portable_update" placeholder="<?= $_SESSION['portable'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-external-link"></i><span class="profile-input">Site Perso</span>
                  <input type="text" name="sitePerso_update" placeholder="<?= $_SESSION['sitePerso'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-linkedin"></i><span class="profile-input">Linkedin</span>
                  <input type="text" name="linkedin_update" placeholder="<?= $_SESSION['linkedin'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-github"></i><span class="profile-input">Github</span>
                  <input type="text" name="github_update" placeholder="<?= $_SESSION['github'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-twitter"></i><span class="profile-input">Twitter</span>
                  <input type="text" name="twitter_update" placeholder="<?= $_SESSION['twitter'] ?>">
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-lock"></i><span class="profile-input">Nouveau (Ou Ancien) Password</span>
                  <input type="password" name="password_update" placeholder="New Password" autocomplete="new-password" required>
                </li>
                <li class="animated lightSpeedIn">
                  <i class="fa fa-lock"></i><span class="profile-input">Confirmer Nouveau (Ou Ancien) Password</span>
                  <input type="password" name="confirm_password" placeholder="Confirm new password" autocomplete="new-password" required>
                </li>
              </ul>
            </div>
          <input style="font-size: 11px;" type="submit" value="Update profile" name="update_profile" class="btn btn-block btn-primary" />
        </form>
        </br>
        <li class="animated lightSpeedIn">
              <i class="fa fa-download"></i><span>CV</span>
              <a href="<?= $_SESSION['cv']?>" download>
              <?= $_SESSION['cv'] ?>
               </a>
        </li>
        <form style="font-size: 11px;" class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="on">
          <div class="alert alert-error"></div>
          <div class="cv"><input type="file" name="cv" accept="file/*.pdf" required /></div>
          <input style="font-size: 11px;" type="submit" value="Update cv" name="update_cv" class="btn btn-block btn-primary" />
        </form>

        <!-- END MENU -->
      </div>
    </div>
    <!-- <div class="col-md-9">
            <div class="profile-content">
         Some user related content goes here...
            </div>
    </div> -->
  </div>
</div>
<center>
<strong>Powered by <a href="http://j.mp/metronictheme" target="_blank"><del class="none">KeenThemes</del></a> Me !</strong>
</center>
<br>
<br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>