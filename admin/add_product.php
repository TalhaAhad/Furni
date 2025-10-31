<?php
include "connect.php";

// Insert Product
if (isset($_POST['add_product'])) {
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = str_replace(',', '', $_POST['product_price']);
    $stock = $_POST['stock'];

    // File upload
    $product_img = $_FILES['product_img']['name'];
    $temp_img = $_FILES['product_img']['tmp_name'];
    $folder = 'Productuploads/' . $product_img;

    if (move_uploaded_file($temp_img, $folder)) {
        $insert_query = "
            INSERT INTO product (category_id, product_name, product_desc, product_price, stock, product_img) 
            VALUES ('$category_id', '$product_name', '$product_desc', '$product_price', '$stock', '$folder')
        ";
        $run = mysqli_query($conn, $insert_query);

        if ($run) {
            echo "<script>alert('✅ Product successfully added!');</script>";
        } else {
            echo "<script>alert('❌ Database insert failed.');</script>";
        }
    } else {
        echo "<script>alert('⚠️ Image upload failed!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/product.css">
</head>
<body>

<div class="product-form1">
<div class="form-container">
    <h2 class="form-title">Add New Product</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="product-form">

        <!-- Category Dropdown -->
        <div class="form-group">
            <label class="form-label">Select Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">--- Select Category ---</option>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM category");
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
                    }
                ?>
            </select>
        </div>

        <!-- Product Name -->
        <div class="form-group">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-input" placeholder="Enter product name" required>
        </div>

        <!-- Product Price -->
        <div class="form-group">
            <label class="form-label">Product Price</label>
            <input type="text" name="product_price" class="form-input" placeholder="Enter product price" required>
        </div>

        <!-- Stock -->
        <div class="form-group">
            <label class="form-label">Product Stock</label>
            <input type="text" name="stock" class="form-input" placeholder="Enter available stock" required>
        </div>

        <!-- Product Image -->
        <div class="form-group">
            <label class="form-label">Upload Product Image</label>
            <input type="file" name="product_img" class="form-input" required>
        </div>

        <!-- Product Description -->
        <div class="form-group">
            <label class="form-label">Product Description</label>
            <textarea name="product_desc" class="form-textarea" placeholder="Write product details..." rows="4" required></textarea>
        </div>

        <!-- Submit Button -->
        <button class="btn" type="submit" name="add_product">Add Product</button>

    </form>
</div>
</div>

</body>
</html>
