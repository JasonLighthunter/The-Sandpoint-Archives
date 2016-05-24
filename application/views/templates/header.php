<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
    >
    <link
      rel="stylesheet"
      href=<?php echo base_url('assets/style.css'); ?>
    >
    <title><?php echo $title; ?></title>
  </head>
  <body>
    <?php require_once 'navbar.inc.php'; ?>
    <div class="container-fluid">
      <div class="well">
        <?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
