<?php
$json = file_get_contents("product.json");
$products = json_decode($json, true);
?>
<h3>Products</h3>
<ul>
<?php foreach ($products as $p): ?>
    <li>
        <?php echo htmlspecialchars($p["name"]); ?> - 
        Rs <?php echo htmlspecialchars($p["price"]); ?>
    </li>
<?php endforeach; ?>
</ul>
