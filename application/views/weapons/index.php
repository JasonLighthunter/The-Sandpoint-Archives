<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Weapon Class</th>
    </tr>
    <?php foreach ($items as $weapon) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url($weapon['class_uri'].'/'.$weapon['id']); ?>> 
            <?php echo  $weapon['name']; ?>
          </a>
        </td>
        <td>
          <?php echo $weapon['weapon_class']; ?> 
        </td>
      </tr>
    <?php } ?>
  </table>
</div>