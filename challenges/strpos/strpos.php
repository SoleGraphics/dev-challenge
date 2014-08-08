<?php

function my_strpos($haystack, $needle, $offset = 0)
{
	if ($offset < 0) {
		$backtrace = debug_backtrace();
		echo "PHP Warning: my_strpos(): Offset not contained in string in " .
			$backtrace[0]["file"] . " on line " . $backtrace[0]["line"] . "\n";
		return -1;
	}
	$haystack = substr($haystack, $offset);
	if (!is_string($needle)) {
		$needle = chr((int)($needle));
	}

	preg_match('/' . $needle . '/', $haystack, $matches, PREG_OFFSET_CAPTURE);
	if ($matches) {
		return $matches[0][1];
	}
	else {
		return false;
	}
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
