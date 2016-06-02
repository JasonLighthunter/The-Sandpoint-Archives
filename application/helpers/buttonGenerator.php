<?php
  function generateButton($inputData, $iconData = FALSE) {
    if($iconData === FALSE) {
      echo anchor(
        $inputData['href'],
        $inputData['text'],
        $inputData['attributes']
      );
    } else {
      echo '<a href='.$inputData['href'].' ';
      foreach ($inputData['attributes'] as $key => $value) {
        echo $key.'="'.$value.'"';
      }
      echo '>';
        echo '<i class="'.$iconData.'" aria-hidden="true"></i>';
        echo $inputData['text'];
      echo '</a>';
    }
  }
?>