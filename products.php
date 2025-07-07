<?php
include "db.php";
session_start();
$products = $conn->query("SELECT * FROM products");
?>

<h2>🛍️ Product List</h2>
<a href="cart.php">🛒 View Cart</a>
<hr>

<div style="display:flex; gap:30px;">
<?php while($p = $products->fetch_assoc()): ?>
<div style="border:1px solid gray; padding:10px;">
    <img src="images/<?= $p['image'] ?>" width="150"><br>
    <strong><?= $p['name'] ?></strong><br>
    ₹ <?= $p['price'] ?><br>
    <a href="add.php?id=<?= $p['id'] ?>">Add to Cart</a>
</div>
<?php endwhile; ?>
</div>
