<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($items as $component) { ?>
      <tr>
        <td>
          <?php 
            echo anchor(
              $component['class_uri'].'/'.$component['id'],
              $component['name']
            );
          ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>