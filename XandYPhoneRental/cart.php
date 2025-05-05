<?php
session_start();
include ("Data/dbConnect.php");

// If cart does not exist , then do not put any elements in it and create a new instance (empty array of items)

if (!isset($_SESSION["cart"])){
    $_SESSION = [];
}

// Use post to search element add_to_cart
if (isset($_POST["add_to_cart"])){
    $quantity = (int)$_POST["quantity"];
    $product_id = $_POST["product_id"];

    // If another quantity is updated or added change the cart page, if not keep quantity
    if (isset($_SESSION["cart"][$product_id])){
        $_SESSION["cart"][$product_id] += $quantity;
    } else {
        $_SESSION["cart"][$product_id] = $quantity;
    }
}

// If the user desires to remove an element from the cart, remove its product and remove the item from the array
if (isset($_GET["remove"])){
    $removed_id = $_GET["remove"];
    unset($_SESSION["cart"][$removed_id]);
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="default/style.css">
    <title>X&Y Phone Rental - Cart</title>
</head>

<body>
    <header class="headernavbar">
        <a href="index.html" class="logo">
            <img src="images/logo.svg" alt="logo">
        </a>
        <h2>X&Y Phone Rental Services</h2>
    </header>
    <nav class="headernavbar">
        <div class="header_item">
            <a href="index.html">Home</a>
        </div>
        <div class="header_item">
            <a href="about.html">About</a>
        </div>
        <div class="header_item">
            <a href="contact.html">Contact Us</a>
        </div>
        <div class="header_item">
            <a href="proddesc.php">Visit Product Page</a>
        </div>
        <div class="header_item">
            <a href="rateus.html">Rate Us</a>
        </div>
    </nav>
   <h2 style="text-align: center; margin: 50px; font-size: 32px;">Your Cart</h2> 
   <!-- fetch products from database-->
   <?php
        echo"<table style='margin: 20px auto; border-collapse: collapse;width: 80%;'>
                <tr style='background-color: black; color: white; height: 60px;'>
                    <th style='width: 200px;'>Image</th>
                    <th style='width: 200px'>Product</th>
                    <th style='width: 200px'>Quantity</th>
                    <th style='width: 200px'>Price</th>
                    <th style='width: 200px'>Total</th>
                    <th style='width: 500px'>Remove Product</th>
                </tr>";

        $grand_total = 0;

        // for each item added in the current cart, use the product id as the key and the quantity as the value (similar to a hashmap)  
        foreach ($_SESSION['cart'] as $product_id => $quantity) {
            // Fetch the result query
            $result = $conn->query("SELECT * FROM products WHERE id = $product_id");

            // initialize product from the result set to transform it into the associate set/hashmap
            $product = $result->fetch_assoc();

            // Multiply the item total by its price (from the database) and quantity (from the user input on index)
            $product_total = $product['price'] * $quantity;
            $grand_total += $product_total;
            // Use the number format function to decrease the amount of decimals to prevent overflow in cells
            // The remove item updates the index page previously accessed and activates the condition on the top of this file
            echo "<tr>
                    <td style='width: 200px; text-align: center;'><img src='{$product['image']}' alt='{$product['name']}' width='100'></td>
                    <td style= 'width: 200px; text-align: center;'>{$product['name']}</td>
                    <td style= 'width: 200px; text-align: center;'>$quantity</td>
                    <td style= 'width: 200px; text-align: center;'>\${$product['price']}</td>
                    <td style= 'width: 200px; text-align: center;'>\$" . number_format($product_total,  2) . "</td>
                    <td style= 'width: 500px; text-align: center;'><a href='cart.php?remove=$product_id'><i class='fa-solid fa-trash'></i></a></td>
                    </tr>";
        }
        echo "<tr>
                <td style=' margin: 20px auto; height: 150px; width: 200px; text-align: center; colspan='3'><strong>Grand Total</strong></td>
                <td colspan='2'>\$" . number_format($grand_total, 2) . "</td>
                </tr>";

        // Complete table header
        echo "</table>";
    ?>
    </table>
    <div class='center-cart' style="text-align: center; margin: 20px;">
        <a href="proddesc.php" style="
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin: 10px;">
            Back To Product Page
        </a>
    </div>
    <footer>
        <div class="footer_container">
            <div class="footer_item">
                <h2>Our Links</h2>
                <a href="about.html">About Us</a> <i class="fa-solid fa-user"></i>
                |<a href="contact.html">Contact Us</a> <i class="fa-solid fa-phone"></i>
                |<a href="proddesc.php">Shop</a> <i class="fa-solid fa-cart-shopping"></i>
            </div>
            <div class="footer_item">
                <h2>Follow Us</h2>
                <a href="#">Facebook<i class="fa-brands fa-square-facebook"></i></a> 
                |<a href="#">Instagram <i class="fa-brands fa-instagram"></i> </a> 
                |<a href="#">Twitter <i class="fa-brands fa-square-x-twitter"></i></a>
            </div>
    </footer>
</body>
</html>