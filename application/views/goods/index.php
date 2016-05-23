<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($goods as $good) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url('goods/'.$good['id']); ?>> 
            <?php echo  $good['name']; ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>