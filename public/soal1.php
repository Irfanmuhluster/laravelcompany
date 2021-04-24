<?php

$string = ['abcd', 'acbd', 'aaab', 'acbd'];

$word = 'acbd';

// for ($i = 0, $i < count($string), $i++) {
	
// }

foreach ($string as $key => $value) {
	if (strpos($word, $value) !== FALSE) {
        echo "Match found".$key."<br>"; 
        // return true;
    } 
}
