<div class="row">
  <div class="col-sm-2">
    <b>Image:</b>
  </div>
  <div class="col-sm-10">
    <?php echo '<img src='.base_url('assets/images/uploads/'.$category['image_name']).'>'; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $category['name']; ?>
  </div>
</div>
<br>
<?php if(!empty($subCategories)) { ?>
<div class="row">
  <div class="col-sm-2">
    <b>SubCategories:</b>
  </div>
  <div class="col-sm-10">
    <?php
      foreach ($subCategories as $sub) {
        $href = site_url('categories/'.$sub['id']);
        echo anchor($href, $sub['name']).'<br>';
      }
    ?>
  </div>
</div>
<br>
<?php } ?>
<div class="row">
  <div class="col-sm-2">
    <b>Weapons</b>
  </div>
  <div class="col-sm-10">
    <?php
      foreach ($items as $item) {
        $href = site_url($item['class_uri'].'/'.$item['id']);
        echo anchor($href, $item['name']);
        echo '<br>';
      }
    ?>
  </div>
</div>
