<?php

function my_strpos($whole_string, $chunk_string, $position_check=false)
{
	$chunk_string_char_array = str_split($chunk_string);
	$whole_string_array = str_split($whole_string);

	if ($position_check !== false) { // This works and checks out
		if ($chunk_string_char_array[0] == $whole_string_array[$position_check]) {
			return true;
		}
		return false;
	}

	$count = count($chunk_string_char_array);
	$array_position = 0;
	$whole_position = 0;
	
	foreach ($whole_string_array as $character) { //Go through the alphabet
		if ($character == $chunk_string_char_array[0]) { //Check the first character
			
			if ($count > 1) { // If array is larger than one char
				$whole_peek = 1;
				$still_matching = true;

				for ($chunk_index=1;  $chunk_index < $count && $array_position + $whole_peek < count($whole_string_array); $chunk_index++,$whole_peek++) {				
					if ($chunk_string_char_array[$chunk_index] != $whole_string_array[$array_position + $whole_peek]) {
						$still_matching = false;
						continue;
					}
				}
				if ($still_matching) {
					return $array_position;					
				}

			} else {
				return $array_position;				
			}

		} 
		$array_position++;
		$whole_position++;
	}
	return false;
}

$alphabet = 'abcdefghijklmnopqrstuvwxyz';

# Should print "17"
print(my_strpos($alphabet, 'r') . "\n");

# Should print "6"
print(my_strpos($alphabet, 'ghi') . "\n");

print(my_strpos($alphabet, 'gh!') . "\n");
print(my_strpos($alphabet, 'g!i') . "\n");

var_dump(my_strpos($alphabet, 'a', 0));


# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'u', 22));

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 'A'));
