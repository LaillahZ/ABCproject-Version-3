<?php
// Array to store product information
$products = [
    ["Honey Bee", 25, 214, "USA"],
    ["Satin Azure Butterfly", 35, 4, "Australia"],
    ["Luna Moth", 42, 23, "USA"],
    ["Praying Mantis", 60, 7, "USA"],
    ["Scarab Beetle", 75, 2, "Egypt"]
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to the external CSS -->
</head>
<body>
<!-- Include welcome message -->
<?php include('inc_welcome.php'); ?>

<!-- Include navigation menu -->
<?php include('inc_navigation.php'); ?>

<h1>Our Products</h1>

<!-- Product Table -->
<table>
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Location</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product[0]; ?></td>
            <td><?php echo "$" . $product[1]; ?></td>
            <td><?php echo $product[2]; ?></td>
            <td><?php echo $product[3]; ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<!-- Include footer -->
<?php include('inc_footer.php'); ?>
</body>
</html>