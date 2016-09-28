<?php

function my_strpos($haystack, $needle, $offset = 0)
{
	
	//make sure the haystack is a string and build an index for it
	$haystack = (string) $haystack;
	$haystack_index = str_split($haystack);

	//if needle isn't a string, convert it to an integer and use the corresponding ascii character, then build an index for it
	if (!is_string($needle)) $needle = chr(intval($needle));
	$needle_index = str_split($needle);
	
	//if the offset is negative, find the positive offset from the end of the string
	if(intval($offset) < 0) $offset = strlen($haystack) - 1 + $offset;
	//if the negative offset was longer than the haystack, just start at the beginning (php.net entry unclear on this edge case)
	if ($offset < 0 ) $offset = 0;

	$possible_match_needle_index = 0;
	$possible_match_haystack_start = 0;
	
	foreach ($haystack_index as $haystack_key => $haystack_value)
	{
		//make sure the offset has been reached and check for a match
		if ($haystack_key >= $offset && $needle_index[$possible_match_needle_index] == $haystack_value )
		{
			$possible_match_needle_index++;
			//store the haystack position if you get a possible match
			if ($possible_match_needle_index == 1) $possible_match_haystack_start = $haystack_key;
		}
		else
		{
			//the match failed so reset the needle index to check
			$possible_match_needle_index = 0;
		}
		//if the entire needle matched, return the haystack start position
		if ($possible_match_needle_index == strlen($needle)) return $possible_match_haystack_start;
	}
	
	//if a match wasn't found, return false	
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
