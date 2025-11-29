<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisig Dagis Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    include("header.php");

    // Products
    $products = [
        ["Sisig Dagis", 499.99, 10],
        ["Water Lily Chips", 299.99, 5]
    ];

    $discount = 0.10; // 10% discount

    foreach ($products as $item) {
        $name = $item[0];
        $price = $item[1];
        $stock = $item[2];

        // Conditional logic
        if ($stock > 8) {
            $finalPrice = $price - ($price * $discount);
            $status = "<span class='highlight'>Discounted!</span>";
        } elseif ($stock == 0) {
            $finalPrice = $price;
            $status = "<span class='out'>Out of Stock</span>";
        } else {
            $finalPrice = $price;
            $status = "Available";
        }

        echo "<div class='product'>";
        echo "<h2>$name</h2>";
        echo "<p>Price: ₱" . number_format($finalPrice, 2) . "</p>";
        echo "<p>Stock: $stock</p>";
        echo "<p>Status: $status</p>";
        echo "</div>";
    }

    // Combo deal
    $combo = $products[0][0] . " & " . $products[1][0];
    echo "<p class='combo'>Special Combo Deal: <strong>$combo</strong></p>";

    include("footer.php");
    ?>
</body>
</html>
