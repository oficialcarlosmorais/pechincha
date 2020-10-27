<?php
session_start();
$usr_id = $_SESSION['id'];
//require_once 'session.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta http-equiv="content-type" content="text/html, charset=utf-8"  />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en"  />
    <meta name="author" content="El Anara Nasciment, José Carlos Nogueira Morais, Roseany Lobato de Sousa" />
    <meta name="description" content="oferta e procura de serviços" />
    <meta name= "keywords" content="serviços, ordem, manutenção, assitência técnica, garatia, oficina, online" />
    <meta name="generator" content="sublime"/>
    <meta name="robots" content="all"/>
    <meta name="rating" content="general" />
    <meta name="copyright" content="El Anara Nascimento, José Carlos Nogueira Morais, Roseany Lobato de Sousa" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pechincha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="css/mao.css"><link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
    <main>
      <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Menu &times;</button>
        <a href="listas.php" class="w3-bar-item w3-button">Listas de compras</a>
        <a href="orc_novo.php" class="w3-bar-item w3-button">Orçamentos</a>
        <a href="emp_novo.php" class="w3-bar-item w3-button">Cadastrar empresa</a>
      </div>

      <div class="w3-main" style="margin-left:200px">
        <div class="w3-teal">
          <button class="w3-button w3-teal w3-xlarge w3-hide-large"  onclick="w3_open()">&#9776;</button>
        