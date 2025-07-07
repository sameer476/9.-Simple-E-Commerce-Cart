<?php
session_start();
unset($_SESSION['cart']);
echo "🎉 Order placed! (Fake checkout)<br><a href='products.php'>Shop More</a>";
