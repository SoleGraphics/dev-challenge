<?php
function my_strpos($haystack, $needle, $offset=0)
{
  // Normalize input
  if (gettype($needle) == "integer")
    $needle = chr($needle);
  elseif (gettype($needle) != "string")
    return false;

  // Parse
  $start = strlen($haystack) - strlen($needle);
  for ($i=$start; $i>=$offset; $i--) {
    // If this is 'cheating' let me know and I'll make a better one xD
    if (substr($haystack, $i, strlen($needle)) == $needle)
      return $i;
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
