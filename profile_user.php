<?php

session_start();

// $_SESSION['message'] = '';

require 'header.php';

require 'db.php';

require 'validate_update_avatar.php';

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
          margin-left: 30px;
        }

        .profile-usermenu ul li {
          border-bottom: 1px solid #f0f4f7;
          color: #5B9BD1;
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
    <div class="col-md-3">
      <div class="profile-sidebar">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
          <img src="<?= $_SESSION['avatar'] ?>" class="img-responsive" alt="">
        </div>




            <!-- <form style="font-size: 11px;" class="form" action="#" method="post" enctype="multipart/form-data" autocomplete="on">
              <div class="alert alert-error"></div>
              <div class="avatar"><input type="file" name="avatar" accept="image/*" required /></div>
              <input style="font-size: 11px;" type="submit" value="Update avatar" name="update_avatar" class="btn btn-block btn-primary" />
            </form> -->




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
        <div class="profile-userbuttons">
          <button type="button" class="btn btn-success btn-sm animated flipInX" onclick="window.location.href='profile_update.php';">Parameters</button>
          <!-- <button type="button" class="btn btn-danger btn-sm animated flipInX">Message</button> -->
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav-navbar">
            <!-- <li class="active">
              <a href="#">
              <i class="fa fa-user-o"></i>
              <?= $_SESSION['username'] ?>
               </a>
            </li> -->
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-envelope"></i>
              <?= $_SESSION['email'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-info-circle"></i>
              <?= $_SESSION['nom'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-info-circle"></i>
              <?= $_SESSION['prenom'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-map-marker"></i>
              <?= $_SESSION['adresse'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-map-marker"></i>
              <?= $_SESSION['codePostal'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-map-marker"></i>
              <?= $_SESSION['ville'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <!-- <a href="#"> -->
              <i class="fa fa-phone"></i>
              <?= $_SESSION['portable'] ?>
               <!-- </a> -->
            </li>
            <li class="animated lightSpeedIn">
              <i class="fa fa-external-link"></i>
              <a href="<?= $_SESSION['sitePerso'] ?>" target="_blank">
              Site Perso
               </a>
            </li>
            <li class="animated lightSpeedIn">
              <i class="fa fa-linkedin"></i>
              <a href="<?= $_SESSION['linkedin'] ?>" target="_blank">
              Linkedin
               </a>
            </li>
            <li class="animated lightSpeedIn">
              <i class="fa fa-github"></i>
              <a href="<?= $_SESSION['github'] ?>" target="_blank">
              Github
               </a>
            </li>
            <li class="animated lightSpeedIn">
              <i class="fa fa-twitter"></i>
              <a href="<?= $_SESSION['twitter'] ?>" target="_blank">
              Twitter
               </a>
            </li>
            <li class="animated lightSpeedIn">
              <i class="fa fa-download"></i>
              <a href="<?= $_SESSION['cv']?>" download>
              Télécharger mon CV
               </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
        <div class="col-md-4">
          <div class="profile-content">
            <div>
              <ol>
                <li>
                  <p class="halo_title"> Halo 3 : One Final Effort </br> <audio src="musiques/03 Halo 3-The Covenant. One Final Effort.mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p> Epica : Dancing in a Hurricane </br> <audio src="musiques/Dancing in a Hurricane - Epica (Lyrics in the screen).mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p class="halo_title"> Halo 3 : Unforgotten </br> <audio src="musiques/17 Unforgotten.mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p> Epica : The Second Stone </br> <audio src="musiques/EPICA - The Quantum Enigma (The Second Stone) + Lyrics HD Sound.mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p class="halo_title"> Halo 3 : Roll Call-Duty Bound-Price Paid </br> <audio src="musiques/10 Halo 3-Ending. Roll Call-Duty Bound-Price Paid.mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p> Soul Eater : Never Lose Myself </br> <audio src="musiques/09 - BLACK STAR (never lose myself).mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
                <li>
                  <p class="halo_title"> Halo 3 : Never Forget </br> <audio src="musiques/15 Halo 3-Never Forget.mp3" controls>Veuillez mettre à jour votre navigateur ! </audio> </p>
                </li>
              </ol>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="profile-content">
            <div>
              <ol>
                <li>
                  <video width="320" height="240" controls>
                    <source src="videos/Deadpool 2 Bob Ross Teaser Trailer - YouTube.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video> 
                </li>
                <li>
                  <video width="320" height="240" controls>
                    <source src="videos/PUB - Gali l'Alligator - 13eme RUE - YouTube.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                  </video> 
                </li>
              </ol>
            </div>
          </div>
        </div>
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