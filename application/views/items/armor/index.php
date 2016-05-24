<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Armor Type</th>
    </tr>
    <?php foreach ($items as $armor) { ?>
      <tr>
        <td>
          <?php 
            echo anchor($armor['class_uri'].'/'.$armor['id'], $armor['name']);
          ?>
        </td>
        <td>
          <?php echo $armor['armor_type']; ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>