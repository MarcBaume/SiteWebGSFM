<?php
		echo strlen($bar);
if (strlen($bar) > 0 ) echo '!is_null():  $bar is truly an empty string <br>';
else echo '!is_null(): $foo is probably null <br>';

$bar = 'test';
echo strlen($bar);
if (strlen($bar) > 0 ) echo '!is_null(): >>>>>>>>>> $bar is truly an empty string <br>';
else echo '!is_null(): $foo is probably null <br>';
?>