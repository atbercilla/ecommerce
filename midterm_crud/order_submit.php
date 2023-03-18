<?php
// Connect to database
include_once 'db_conn.php';

// Retrieve form data
$name = $_POST['name'];
$address = $_POST['address'];
$email = $_POST['email'];
$products = $_POST['item_qty'];

// Calculate order total
$total = 0;
foreach ($products as $id => $item_qty) {
  $sql = "SELECT item_price FROM products WHERE item_id = '$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $price = $row['item_price'];
  $total += $price * $quantity;
}

// Insert order into database
$status = 'P'; 
$timestamp = date("Y-m-d H:i:s"); 
$sql = "INSERT INTO orders (name, address, email, total, status, date_purchased_ts) VALUES ('$name', '$address', '$email', $total, '$status', '$timestamp')";
mysqli_query($conn, $sql);
$order_id = mysqli_insert_id($conn);

// Inserting order details 
foreach ($products as $id => $item_qty) {
  if ($item_qty > 0) {
    $sql = "INSERT INTO order_details (order_id, item_id, item_qty) VALUES ($order_id, $id, $item_qty)";
    mysqli_query($conn, $sql);
  }
}

// Close the database connection
$conn->close();
?>



<html>
<head>
	<meta charset="UTF-8">
	<title>Submit Order</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<h1>Place Order</h1>
	<form action="order_list.php" method="post">
	<input type="submit" value="View Order">
	</form>

</body>
<script src="js/bootstrap.js"></script>
</html>
