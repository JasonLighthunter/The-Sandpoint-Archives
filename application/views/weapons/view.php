<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $weapon['name']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Weapon Class:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $weapon['weapon_class']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Description:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $weapon['description']; ?> 
  </div>
</div>