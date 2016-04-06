<?php

// The default value of offset should be 0, in the event no offset is passed
function my_strpos($haystack, $needle, $offset = 0){
	$to_return = false;
	$length = strlen($haystack);
	$needle_length = strlen($needle);
	for($i=$offset; $i < $length; $i++){
		if($needle[0] == $haystack[$i]){
			// Check to make sure the needle fits in what's left of the haystack
			// If it doesn't, no need to comb through the haystack
			if($needle_length + $i < $length){
				$to_return = $i;
				// loop through the haystack
				for($j = 0; $j < $needle_length; $j++){
					if($needle[$j] != $haystack[$i+$j]){
						$to_return = false;
						break;
					}
				}
				// We want to break after we find the first instance of the needle
				// That way if there are multiple instances of the needle, we get the first
				if($to_return != false){
					break;
				}
			}
		}
	}
	return $to_return;
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
?>