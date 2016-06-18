<?php echo doctype('html5'); ?>
<html lang="en">
  <head>
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
    <?php
      echo '<pre>';
        var_dump($this->session->loggedInUser);
      echo '</pre>';
      echo '<pre>';
        var_dump($this->session->shoppingBag);
      echo '</pre>';
      require_once 'navBar.php';
      echo '<div class="container-fluid">';
        require_once 'breadcrumbs.php';
        echo '<div class="well">';
          require_once 'pageTitle.php';
    ?>
