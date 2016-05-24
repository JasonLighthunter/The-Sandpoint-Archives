<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($feats as $feat) { ?>
      <tr>
        <td>
          <?php 
            echo anchor(
              'feats/'.$feat['id'],
              $feat['name']
            );
          ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>