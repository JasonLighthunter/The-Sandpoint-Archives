<div class="row">
  <div class="col-sm-2">
    Username:
  </div>
  <div class="col-sm-10">
    <?php echo $account['username']; ?>
  </div>
</div>
<div class="row">
  <div class="col-sm-2">
    Role(s):
  </div>
  <div class="col-sm-10">
    <?php
      $rolesString = '';
      foreach ($roles as $role) {
        $rolesString .=$role.', ';
      }
      echo trim($rolesString, " ,");
    ?>
  </div>
</div>