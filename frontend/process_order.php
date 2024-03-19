<?php
// Your order processing logic here

// After processing, redirect to the order history page
header("Location: index.php?act=my_bill");
exit(); // Make sure to exit after redirection
?>
