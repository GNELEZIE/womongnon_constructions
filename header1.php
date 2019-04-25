<?php
session_start();
require'admin/database.php';

?>




<!DOCTYPE html>
<html>
    <head>
        <title>Womongnon</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">

       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
     <center>
      <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <a class="navbar-brand" href="#">Womongnon</a>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>
  <div class="navbar-collapse collapse" id="left">
   
    <ul class="nav navbar-nav">
      <li class="active"><a href="">Accueil</a></li>
      <li><a href="inscription.php">Inscription</a></li>
      <li><a href="connexion.php">connexion</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
   

  </div>
</nav>
      </center>

     <style>
         #left ul{
      float: right;
             text-align: center;
}    
   </style>   

    