<?php
/**
 * Validate Bank Card Number
 *
 * @param string $card
 *
 * @return bool
 */
function bankCardValidate (string $card = '') : bool {
	$card   = (string) preg_replace('/\D/', '', $card);
	$strLen = strlen($card);
	if ( $strLen !== 16 ) {
		return false;
	}
	if ( !in_array((int) $card[0], [2, 4, 5, 6, 9], true) ) {
		return false;
	}

	$res = [];
	for ( $i = 0; $i < $strLen; $i++ ) {
		$res[$i] = $card[$i];
		if ( ($strLen % 2) === ($i % 2) ) {
			$res[$i] *= 2;
			if ( $res[$i] > 9 ) {
				$res[$i] -= 9;
			}
		}
	}

	return array_sum($res) % 10 === 0;
}
