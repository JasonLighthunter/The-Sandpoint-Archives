<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($items as $good) { ?>
      <tr>
        <td>
          <?php 
            echo anchor(
              $good['class_uri'].'/'.$good['id'],
              $good['name']
            );
          ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>