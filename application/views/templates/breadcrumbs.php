<?php
  $segs      = $this->uri->segment_array();
  $result    = array();
  $prevCrumb = '';
  foreach ($segs as $crumb) {
    $prevCrumb .= $crumb.'/';
    $result[] = anchor($prevCrumb, $crumb);
    $result[] =' >> ';
  }
  array_pop($result);
  foreach ($result as $crumb) {
    echo $crumb;
  }
?>