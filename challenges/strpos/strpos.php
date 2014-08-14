<?php

function my_strpos($haystack, $needle, $offset = 0)
{
	if (!is_string($needle)) {
		# handle non-string search phrases
		# this will return an ascii character from an octal, hex, or decimal value
		$needle = chr(intval($needle, 0));
	}
	$i = $offset;
	while ($i < strlen($haystack))
	{
		if (substr($haystack, $i, strlen($needle)) === $needle)
		{
			return $i;
		}
		$i++;
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

# Added tests for non-string values
# Should print "14"
print(my_strpos($alphabet, 111) . "\n");

# Should print "15"
print(my_strpos($alphabet, 0x70) . "\n");

# Should print "16"
print(my_strpos($alphabet, 0161) . "\n");

# Should print "bool(false)"
var_dump(my_strpos($alphabet, 182));
?>