<div class="row">
  <div class="col-xs-12">
    <?php
      require APPPATH.'helpers/buttonGenerator.php';
      require APPPATH.'helpers/messageGenerator.php';
    ?>
  </div>
</div>
<?php
  if(!empty($items)) {
    $inputData = array (
      'href'       => site_url('shoppingBag/clearBag/'),
      'text'       => 'Empty Shopping bag',
      'attributes' => array (
        'class' => 'btn btn-danger',
        'title' => 'Empty entire Shopping bag'
      )
    );
    $iconData  = 'fa fa-trash-o fa-fw';
    generateButton($inputData, $iconData);
?>
<div class="table-responsive">
  <table class="table">
    <?php
      if(!empty($items)) {
        $total = 0;
        foreach ($items as $item) {
    ?>
    <tr>
      <td>
        <?php
          echo '<img src='.base_url('assets/images/uploads/'.$item['image_name']).'>';
        ?>
      </td>
      <td>
        <?php
          echo anchor(
            $item['class_uri'].'/'.$item['id'],
            $item['name']
          );
        ?>
      </td>
      <td>
        <?php
          $itemTotal = $item['count']*$item['price_gold'];
          echo $item['count'].' x '.$item['price_gold'].' = '.$itemTotal.' Gold';
          $total += $itemTotal;
        ?>
      </td>
      <td>
        <?php
          $inputData = array (
            'href'       => site_url('shoppingBag/increase/'.$item['id']),
            'text'       => '',
            'attributes' => array (
              'class' => 'btn btn-default',
              'title' => 'Increase amount'
            )
          );
          $iconData  = 'fa fa-plus fa-fw';
          generateButton($inputData, $iconData);

          echo "&nbsp;";

          $inputData = array (
            'href'       => site_url('shoppingBag/decrease/'.$item['id']),
            'text'       => '',
            'attributes' => array (
              'class' => 'btn btn-default',
              'title' => 'Decrease amount'
            )
          );
          $iconData  = 'fa fa-minus fa-fw';
          generateButton($inputData, $iconData);

          echo "&nbsp;";

          $inputData = array (
            'href'       => site_url('shoppingBag/remove/'.$item['id']),
            'text'       => '',
            'attributes' => array (
              'class' => 'btn btn-danger',
              'title' => 'Delete this Category'
            )
          );
          $iconData  = 'fa fa-trash-o fa-fw';
          generateButton($inputData, $iconData);
        ?>
      </td>
    </tr>
    <?php
        }
      } else {
        echo '<tr>';
          echo '<td>There are no items in the Shopping bag.</td>';
        echo '</tr>';
      }
    ?>
  </table>
</div>
<?php
  if(!empty($items)) {
    echo '<h4>Total: '.$total.' Gold</h4>';

    $inputData = array (
      'href'       => site_url('#'),
      'text'       => 'Generate Order',
      'attributes' => array (
        'class' => 'btn btn-default',
        'title' => 'Increase amount'
      )
    );
    $iconData  = 'fa fa-arrow-right fa-fw';
    generateButton($inputData, $iconData);
  }
  }
?>