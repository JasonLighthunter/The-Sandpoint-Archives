<div class="row">
  <div class="col-sm-1">
    Name:
  </div>
  <div class="col-sm-2">
    <?php echo $account['username']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-1">
    Role:
  </div>
  <div class="col-sm-2">
    <?php
      $rolesString = '';
      foreach ($roles as $role) {
        $rolesString .=$role.', ';
      }
      echo trim($rolesString, " ,");
    ?>
  </div>
</div>