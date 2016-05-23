<?php require APPPATH.'views/templates/pageTitle.inc.php'; ?>
<div class="table-responsive">
  <table class="table">
    <tr>
      <th>Name</th>
    </tr>
    <?php foreach ($spellComponents as $component) { ?>
      <tr>
        <td>
          <a href=<?php echo site_url('spell_components/'.$component['id']); ?>> 
            <?php echo $component['name']; ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>