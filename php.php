<?php
declare(strict_types=1);

$tax_rate = 20;

$products = [
    "Sisig Dagis"      => [499.99, 10],
    "Water Lily Chips" => [299.99, 5],
];

function get_reorder_message(int $stock): string {
    return ($stock < 10) ? "Yes" : "No";
}
function get_total_value(float $price, int $qty): float {
    return round($price * $qty, 2);
}

function get_tax_due(float $price, int $qty, int $tax_rate = 0): float {
    $total_value = $price * $qty;
    $tax_amount = $total_value * ($tax_rate / 100);
    return round($tax_amount, 2);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisig Dagis Store</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'header.php'; ?>

<main class="product">
    <h2>Product Inventory</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Reorder?</th>
                <th>Total Value</th>
                <th>Tax Due</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $name => $data): ?>
                <?php
                    $price = $data[0];
                    $stock = $data[1];
                ?>
                <tr>
                    <td><?= htmlspecialchars($name) ?></td>
                    <td><?= $stock ?></td>
                    <td><?= get_reorder_message($stock) ?></td>
                    <td>₱<?= number_format(get_total_value($price, $stock), 2) ?></td>
                    <td>₱<?= number_format(get_tax_due($price, $stock, $tax_rate), 2) 
                    ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</main>
<?php include 'footer.php'; ?>
</body>
</html>
