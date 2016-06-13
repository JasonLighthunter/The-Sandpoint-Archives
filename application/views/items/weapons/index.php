<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
      <th>Weapon Class</th>
      <th>Category</th>
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
        <!--webs-->
        <td>
          <?php
            if($weapon['category_id'] === NULL) {
              echo '-';
            } else {
              echo anchor(
                'categories/'.$weapon['category_id'],
                $weapon['category']
              );
            }
          ?>
        </td>
        <!--webs-->
      </tr>
    <?php } ?>
  </table>
</div>