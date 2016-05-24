<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($items as $good) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url($good['class_uri'].'/'.$good['id']); ?>>
            <?php echo  $good['name']; ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>