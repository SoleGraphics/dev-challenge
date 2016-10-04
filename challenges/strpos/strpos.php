<?php

function my_strpos( $haystack , $needle, $offset = 0)
{
	if( !is_string ( $needle )) $needle = intval($needle);
		
	for( $i = $offset; $i < strlen($haystack); $i++ ) {
		for( $j = 0; $j < strlen($needle); $j++ ) {
			if( $needle[$j] != $haystack[$i+$j] ) break;
			if( $j == strlen($needle) - 1 ) return $i;
		}
	}
	
	return false;
}

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

# Should print "17"
print(my_strpos($alphabet, 'r') . "\n");

# Should print "6"
print(my_strpos($alphabet, 'ghi') . "\n");

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'u', 22));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'A'));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'ghk'));
