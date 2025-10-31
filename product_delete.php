<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
    <?php include "headerlinks.php"; ?>
</head>
<body>
    <?php
    include "connect.php";
    $product_id = $_GET['product_id'];
    $delete_query = "DELETE FROM product WHERE product_id = '$product_id'";
    $run = mysqli_query($conn, $delete_query);
    if($run){
        echo "<script>alert('Data Deleted!'); 
        window.location.href = 'view_product.php';</script>";
    }
    else{
        echo "<script>alert('Data Not Deleted!')</script>";
    }

?>
</body>
</html>
