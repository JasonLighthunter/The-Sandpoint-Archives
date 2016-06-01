<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $category['name']; ?>
  </div>
</div>
<?php
  if(!empty($category['subCategories'])) {
?>
<div class="row">
  <div class="col-sm-2">
    <b>SubCategories:</b>
  </div>
  <div class="col-sm-10">
    <ul>
      <?php 
        foreach ($subCategories as $sub) {
          echo '<li>'.$sub['name'].'</li>';
        };
      ?>
    </ul>
  </div>
</div>
<?php
  }
?>