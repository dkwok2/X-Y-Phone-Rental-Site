<?php include("Data/dbConnect.php") ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>X&Y Phone Rental Services - Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="default/style.css">
    <link rel="stylesheet" href="default/proddesc.css">
    <script src="scripts/main.js" type="text/javascript" defer></script>
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

    <table style="margin: 20px auto; border-collapse: collapse;width: 80%;">
        <tr style="background-color: black; color: white; height: 60px;">
            <th style="width: 200px;">Image</th>
            <th style="width: 300px;">Product Name</th>
            <th style="width: 300px;">Description</th>
            <th style="width: 200px; ">Price</th>
            <th style="width: 500px;">Desired Quantity</th>
        </tr>

        
        <!-- Add the connection query in the center for table elements -->
        <?php
        $result = $conn-> query("Select * FROM products");

        // Each element in the cell coresponds to product name, description price and desired quantity
        // Each row corresponds to the item name found in the database looking through each collum in the database
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td style='width: 200px; margin: 10px; text-align: center;'><img src='{$row['image']}' alt='{$row['name']}' width='100'></td>
                    <td style='width: 300px; margin: 10px; word-wrap: break-word; text-align: center;'>{$row['name']}</td>
                    <td style='width: 200px; margin: 10px; word-wrap: break-word; white-space: normal;'>{$row['description']}</td>
                    <td style='width: 300px; margin: 10px; text-align: center;'>\${$row['price']}</td>
                    <td style='width: 500px;'>
                        <form style = 'text-align: center;'method='POST' action='cart.php'>
                            <input type='hidden' name='product_id' value='{$row['id']}'>
                            <input type='number' name='quantity' value='0' min='1' required>
                            <button type='submit' name='add_to_cart'>Add to Cart</button>
                        </form>
                    </td>
                </tr>";
        }
        ?>
    </table>
    <div class= 'center-cart' style="text-align: center; margin: 20px;">
        <a href="cart.php" style="
            display: inline-block;
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;">
            View Cart
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