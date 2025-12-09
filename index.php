<?php
echo "Name:Satyam Gupta<br>";
echo"Today Date". date("Y-m-d")."<br>";
$hour = date("G");

if ($hour < 12){
    echo "Good morning!";
} elseif ($hour < 18) {
    echo "Good afternoon!";
} else {
    echo "Good evening!";
}
?>