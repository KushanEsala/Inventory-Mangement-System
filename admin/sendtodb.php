<?php
if (isset($_POST["submit"])) {
    // Define variables and initialize with empty values
    

    // Collect and sanitize form data
    $company_name = htmlspecialchars($_POST["company_name"]);
    $product_name = htmlspecialchars($_POST["product_name"]);
    $unit = htmlspecialchars($_POST["unit"]);
    $packing_size = htmlspecialchars($_POST["packing_size"]);
    $price = htmlspecialchars($_POST["price"]); // Encrypt password using MD5
    $qty = htmlspecialchars($_POST["qty"]);
    $total = htmlspecialchars($_POST["total"]);
    // Include the connection function
    require '../user/connection.php';

    // Establish database connection
   

    // SQL query to insert data into the database
    $sql = "INSERT INTO company_name,product_name,unit,packing_size,price,qty,total
            VALUES ($company_name,$product_name,$unit,$packing_size,$price,$qty,$total)";

    if ($link->query($sql) === TRUE) {
        echo "<script>alert('Registration success'); window.location.href = 'sales_master.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: Registration failed');</script>";
    }

    $link->close();
}
?>
