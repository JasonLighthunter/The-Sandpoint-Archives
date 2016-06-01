<?php echo doctype('html5'); ?>
<html lang="en">
  <head>
    <!-- head -->
    <?php
      $inputData = array (
        'charset' => 'utf-8',
        'name'    => 'viewport',
        'content' => 'width=device-width, initial-scale=1'
      );
      echo meta($inputData);

      $bootstrap = array (
        'href' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'rel'  => 'stylesheet',
        'type' => 'text/css'
      );
      $style     = array (
        'href' => 'assets/css/style.css',
        'rel'  => 'stylesheet',
        'type' => 'text/css'
      );
      echo link_tag($bootstrap);
      echo link_tag($style);
      echo '<title>'.$title.'</title>';
    ?>
  </head>
  <body>
    <?php var_dump($this->session->loggedInUser); ?>
    <?php require_once 'navBar.php'; ?>
    <div class="container-fluid">
      <div class="well">
        <?php require_once 'pageTitle.php'; ?>
