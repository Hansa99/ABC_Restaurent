<?php
include('../includes/connection.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600&family=Poppins:ital,wght@0,400;0,500;0,700;1,600&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
   <link rel="stylesheet" href="../assets/css/index.css">
   <link rel="stylesheet" href="../assets/css/checkout.css">
   <title>Cart</title>
</head>

<body>

   <?php
   include('../includes/header.php');

   //restrict unauthorized users to access;
   if (!isset($_SESSION['customer_email'])) {
      header("location:../index.php");
   }

   $customer_id = $_SESSION['customer_id'];
   ?>

   <main>
      <div class="checkout-container">
         <p class="cart-head-title">Cart item</p>

         <div class="shopping-cart">
            <!-- cart item table -->
            <table>
               <thead>
                  <th>Item</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total price</th>
                  <th>Action</th>
               </thead>
               <tbody>

                  <?php
                  $cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE customer_id = '$customer_id'") or die('query failed');
                  $grand_total = 0;
                  $sub_total = 0;



                  if (mysqli_num_rows($cart_query) > 0) {

                     //set cart item cound
                     $_SESSION['cart_items'] = mysqli_num_rows($cart_query);

                     //display cart items
                     while ($fetch_cart = mysqli_fetch_assoc($cart_query)) {
                  ?>
                        <tr>
                           <td><img src="../assets/images/upload/item/<?php echo $fetch_cart['image']; ?>" class="data-image"></td>
                           <td><?php echo $fetch_cart['name']; ?></td>
                           <td>Rs.<?php echo $fetch_cart['price']; ?></td>
                           <td>
                              <form action="cart-process.php" method="post">
                                 <input type="hidden" name="cart_id" value="<?php echo $fetch_cart['cart_id']; ?>">
                                 <input class="quantity-change" type="number" min="1" name="cart_quantity" value="<?php echo $fetch_cart['quantity']; ?>">
                                 <input type="submit" name="update_cart" value="Update" class="item-update-btn">
                              </form>
                           </td>
                           <td>Rs.<?php echo $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?>/-</td>
                           <td><a href="cart-process.php?remove=<?php echo $fetch_cart['cart_id']; ?>" class="item-remove-btn" onclick="return confirm('remove item from cart?');">Remove</a></td>
                        </tr>
                  <?php
                        $grand_total += $sub_total;
                     }
                  } else {
                     echo '<tr><td style="padding:20px; text-transform:capitalize;" colspan="6">no item added</td></tr>';
                  }
                  ?>
                  <tr class="table-bottom">
                     <td colspan="4">grand total :</td>
                     <td>Rs.<?php echo $grand_total; ?>/-</td>
                     <td><a href="cart-process.php?delete_all" onclick="return confirm('delete all from cart?');" class="item-remove-btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">Remove all</a></td>
                  </tr>
               </tbody>
            </table>

         </div>

         <!-- grand total -->
         <div class="cart-btn" >
            <button  class="<?php echo ($grand_total > 1) ? '' : 'disabled'; ?>"  onclick="openPaymentCard()">
               Proceed to Checkout
               <span class="material-symbols-outlined">shopping_cart_checkout </span>
            </button>
         </div>
      </div>


      <!-- Payment modal -->
      <div class="checkout-payment-cart js-payment-card" >
         <span class="cart-close-icon material-symbols-outlined" onclick="this.parentElement.style.display='none'" `> close</span>
         <form action="cart-process.php" class="payment-content" method="POST">
            <div class="grand-total-content">
               <p class="grand-total-title">Grand Total</p>
               <p class="payment-cart-total">Rs.<?php echo $grand_total; ?>/-</p>
               <input type="hidden" name="grand_total" value=" <?php echo $grand_total ?>" >
            </div>
            <label for="payment-options">Payment Methods</label>
            <select name="payment_type" id="payment-options">
               <option value="Credit/Debit Card">Credit/Debit Card</option>
               <option value="Cash On Deliver">Cash On Deliver</option>
               <option value="Take Away">Take Away</option>
            </select>
            <input type="submit"  value="Place Order"  name="place_order" class="place-order-btn">
         </form>
      </div>
      <!-- Payment modal end-->



   </main>

   <script src="../assets/js/script.js"></script>
</body>

</html>