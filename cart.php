<?php
session_start();
include "db.php";

$cart = $_SESSION['cart'] ?? [];

echo "<h2>Your Cart</h2><a href='products.php'>← Back to Products</a><br><br>";

if (empty($cart)) {
    echo "Cart is empty!";
    exit;
}

$total = 0;
foreach ($cart as $id => $qty) {
    $product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
    $line = $product['price'] * $qty;
    $total += $line;

    echo "<p><img src='images/{$product['image']}' width='50'> 
          {$product['name']} - ₹{$product['price']} x $qty = ₹$line 
          <a href='remove.php?id=$id'>❌ Remove</a></p>";
}

echo "<h3>Total: ₹$total</h3>";
echo "<a href='checkout.php'>✅ Checkout</a>";
