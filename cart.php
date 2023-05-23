<?php
    session_start();

    if (isset($_POST["add-item"])) {

    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All fruits - Market</title>
    <link rel="stylesheet" href="./css/cart.css">
    <!-- Adding a new font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bebas%20Neue">
</head>
<body>
    <main class="container">
        <div class="central-box">
            <?php
                // Check if the cart is empty or not
                if ( !isset($_SESSION["cart"]) || empty($_SESSION["cart"]) ) {

                    // Adding a message with a cross
                    echo "<img class='no-cart-image' src='./img/cross.png'>". 
                    "<p class='no-cart-text'>There are no items in the cart</p>";

                } else {
                    $total = 0;
                    echo    "<p class='cart-title'>My shopping cart</p>",
                            "<table class='table-main'>",
                                "<thead>",
                                    "<tr>",
                                        "<th id='number' class='table-header-title'>#</th>",
                                        "<th id='name' class='table-header-title'>Name</th>",
                                        "<th id='price' class='table-header-title'>Price/unit</th>",
                                        "<th id='quantity' class='table-header-title'>Quantity</th>",
                                        "<th id='total' class='table-header-title'>Total</th>",
                                    "</tr>",
                                "</thead>",
                                "<tbody>";
                    
                    // Adding items
                    foreach($_SESSION["cart"] as $index => $product) {
                        echo    "<tr>",
                                    "<td class='number'>".$index."</td>",
                                    "<td class='name'>".$product["name"]."</td>",
                                    "<td class='price'>".number_format($product["price"],2,",")."$</td>",
                                    "<td class='quantity'>
                                        <form class='button-form' action='cart.php' method='post'>
                                        <button class='button-remove' type='submit' name='remove-item' value=$index>-</button>"
                                            .$product["quantity"].
                                        "<button class='button-add' type='submit' name='add-item' value=$index>+</button>
                                        </form>
                                    </td>",
                                    "<td class='total'>".number_format($product["total"],2,",")."$</td>",
                                "</tr>";
                        $total += $product["total"];
                    }

                    echo    "<tr>",
                                "<td colspan=5 class='cart-total'>Total : ".number_format($total,2,",")."$</td>",
                            "</tr>",
                            "</tbody>",
                            "</table>";
                }
            ?>
            <a class="index-link" href="index.php">Add more fruits</a>
        </div>
    </main> 
</body>
</html>