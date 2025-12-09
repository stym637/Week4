<?php
$number = null;
if (isset($_GET['num'])) {
    $number = (int) $_GET['num'];
}
?>
<form method="get">
    <label>Enter a number:</label>
    <input type="number" name="num" required>
    <button type="submit">Show Table</button>
</form>

<?php
if ($number !== null) {
    echo "<h3>Table of $number</h3>";
    for ($i = 1; $i <= 10; $i++) {
        echo "$number x $i = " . ($number * $i) . "<br>";
    }
}
?>
