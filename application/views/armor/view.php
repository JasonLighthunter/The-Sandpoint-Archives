<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $armor['name']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Armor Type:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $armor['armor_type']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Description:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $armor['description']; ?> 
  </div>
</div>