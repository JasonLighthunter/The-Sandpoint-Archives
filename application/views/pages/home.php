<!-- webs -->
<div class='row'>
  <div class='col-xs-12'>
    <p>
      Welcome to the Sandpoint Archives. Here we offer but a humble collection of information useful for the adventuring types.
    </p>
  </div>
</div>
<div class='row'>
  <?php foreach ($weapons as $weapon) { ?>
    <div class="col-sm-4">
      <?php
        $anchor = anchor(
          'items/weapons/'.$weapon['id'],
          $weapon['name']
        );
        echo heading($anchor, 3);
      ?>
    </div>
  <?php } ?>
</div>
<!-- webs -->