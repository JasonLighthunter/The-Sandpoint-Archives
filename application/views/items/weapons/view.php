<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $item['name']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Weapon Class:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $item['weapon_class']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Description:</b>
  </div>
  <div class="col-sm-6">
    <?php echo $item['description']; ?>
  </div>
</div>
<!-- webs -->
<div class="row">
  <div class="col-sm-2">
    <b>Category:</b>
  </div>
  <div class="col-sm-10">
    <?php
      echo anchor(
        'categories/'.$item['category_id'],
        $item['category']
      );
    ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <?php
      echo anchor(
        site_url('shoppingBag/add/'.$item['id']),
        'add to shopping bag',
        array('class' => 'btn btn-default')
      );
   ?>
  </div>
</div>
<!-- webs -->