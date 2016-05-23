<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Armor Type</th>
    </tr>
    <?php foreach ($armor_items as $armor) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url('armor/'.$armor['id']); ?>> 
            <?php echo  $armor['name']; ?>
          </a>
        </td>
        <td>
          <?php echo $armor['armor_type']; ?> 
        </td>
      </tr>
    <?php } ?>
  </table>
</div>