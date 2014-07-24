<?php

function my_strpos($whole_string, $chunk_string, $position_check=false)
{
	$chunk_string_char = str_split($chunk_string)[0];
	$whole_string_array = str_split($whole_string);

	if ($position_check != false) {
		if ($chunk_string_char == $whole_string_array[$position_check]) {
			return true;
		}

		return false;
	}

	$array_position = 0;
	foreach ($whole_string_array as $character) {
		if ($character == $chunk_string_char) {
			return $array_position;
		}
		$array_position = $array_position + 1;
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


