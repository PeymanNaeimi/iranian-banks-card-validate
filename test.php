<?php

/**
* example: http://localhost/test.php?card=6037997465213496
*/

if ( isset($_GET['card']) ) {
	$card = $_GET['card'];
	echo 'Bank Card Number Validate: ';
	if ( bankCardValidate($card) ) {
		echo 'ok';
	} else {
		echo 'card Number is not valid!';
	}
} else {
	echo 'Please insert Card Number ';
}
