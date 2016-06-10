<div class="row">
  <div class="col-sm-2">
    <b>Name:</b>
  </div>
  <div class="col-sm-10">
    <?php echo $category['name']; ?>
  </div>
</div>
<?php
  if(!empty($subCategories)) {
?>
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
    </ul>
  </div>
</div>
<?php
  }
?>