<?php
function print_array($aArray) {
// Print a nicely formatted array representation:
  echo '<pre>';
  print_r($aArray);
  echo '</pre>';
}

echo "<div class='container'>";
	echo print_array($usertokens);
echo "</div>"
?>