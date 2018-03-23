<?php
// Array with names
$a[] = "Who is my favourite bollywood actor?";
$a[] = "What do I want?";
$a[] = "What do I drink the most?";
$a[] = "Who is my favourite cricketer?";
$a[] = "Where would I like to go with my life partner?";
$a[] = "Which is my favourite romantic movie?";
$a[] = "Which chocolate do I love the most?";
$a[] = "Which animal do I dream to pet?";
$a[] = "With whom would I like to spend some quality time?";
$a[] = "If your life was a movie, which movie would I choose?";
$a[] = "What is my favourite dish?";
$a[] = "In my freetime, where would I go?";
$a[] = "What is the speed of light?";
$a[] = "Which TV show do I prefer?";
$a[] = "Petunia";
$a[] = "Amanda";
$a[] = "Raquel";
$a[] = "Cindy";
$a[] = "Doris";
$a[] = "Eve";
$a[] = "Evita";
$a[] = "Sunniva";
$a[] = "Tove";
$a[] = "Unni";
$a[] = "Violet";
$a[] = "Liza";
$a[] = "Elizabeth";
$a[] = "Ellen";
$a[] = "Wenche";
$a[] = "Vicky";

// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($name, $q)) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
echo $hint === "" ? "no suggestion" : $hint;
?>