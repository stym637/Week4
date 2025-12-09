<?php
$data = [
    "username" => "student123",
    "role"     => "learner",
    "active"   => true
];

$jsonString = json_encode($data);

echo "<p>JSON: $jsonString</p>";
?>
