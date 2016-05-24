<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($feats as $feat) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url('feats/'.$feat['id']); ?>>
            <?php echo  $feat['name']; ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>