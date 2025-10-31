<?php
include_once("connect.php");
$product_id   = isset($_GET['product_id']) ? intval($_GET['product_id']) : 0;
$category_name = isset($_GET['category_name']) ? trim($_GET['category_name']) : '';
$product_name  = isset($_GET['product_name']) ? trim($_GET['product_name']) : '';
$product_desc  = isset($_GET['product_desc']) ? trim($_GET['product_desc']) : '';
$product_price = isset($_GET['product_price']) ? trim($_GET['product_price']) : '';
$stock         = isset($_GET['stock']) ? trim($_GET['stock']) : '';
$product_img   = isset($_GET['product_img']) ? trim($_GET['product_img']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product</title>
    <?php include "headerlinks.php"; ?>
</head>
<body>
<section>
<div class="category">
    <h2>Update Product</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="product-form">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">

        <div class="form-group">
            <label class="form-label">Select Category</label>
            <select name="category_id" class="form-select" required>
                <option value="">--- Select Category ---</option>
                <?php
                    $result = mysqli_query($conn, "SELECT * FROM category");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = ($row['category_name'] == $category_name) ? "selected" : "";
                        echo "<option value='".$row['category_id']."' $selected>".$row['category_name']."</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-input" value="<?php echo $product_name; ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Product Price</label>
            <input type="text" name="product_price" class="form-input" value="<?php echo $product_price; ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Product Stock</label>
            <input type="text" name="stock" class="form-input" value="<?php echo $stock; ?>" required>
        </div>

        <div class="form-group">
            <label class="form-label">Upload Product Image</label>
            <input type="file" name="product_img" class="form-input" accept="image/*">
            <img src="Productsuploads/<?php echo $product_img; ?>" width="100px" alt="Current Image">
        </div>

        <div class="form-group">
            <label class="form-label">Product Description</label>
            <textarea name="product_desc" class="form-textarea" rows="4" required><?php echo $product_desc; ?></textarea>
        </div>

        <button class="btn" type="submit" name="update_product">Update Product</button>
    </form>
</div>
</section>

<?php
if (isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_price = str_replace(',', '', $_POST['product_price']);
    $stock = $_POST['stock'];

    // Handle image upload
    if (!empty($_FILES['product_img']['name'])) {
        $product_img = $_FILES['product_img']['name'];
        $temp_img = $_FILES['product_img']['tmp_name'];
        $folder = 'product_img/' . $product_img;
        move_uploaded_file($temp_img, $folder);
    } else {
        $folder = $product_img; // keep old image
    }

    $update_query = "
        UPDATE product 
        SET category_id='$category_id', 
            product_name='$product_name', 
            product_desc='$product_desc', 
            product_price='$product_price', 
            stock='$stock', 
            product_img='$folder'
        WHERE product_id='$product_id'
    ";

    $run = mysqli_query($conn, $update_query);
    if ($run) {
        echo "<script>alert('✅ Product updated successfully!');
        window.location.href='view_product.php';</script>";
    } else {
        echo "<script>alert('❌ Update failed!');</script>";
    }
}
?>
</body>
</html>
