<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Weapon Class</th>
    </tr>
    <?php foreach ($items as $weapon) { ?>
      <tr>
        <td>
          <?php 
            echo anchor(
              $weapon['class_uri'].'/'.$weapon['id'],
              $weapon['name']
            );
          ?>
        </td>
        <td>
          <?php echo $weapon['weapon_class']; ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>