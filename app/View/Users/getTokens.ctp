<?php
function print_array($aArray) {
// Print a nicely formatted array representation:
  echo '<pre>';
  print_r($aArray);
  echo '</pre>';
}
print_array($usersdata);
print_array($alltokens);
?>