
<div class="product-table-container">
<?php
include "connect.php";

$select_query = "
SELECT product.product_id, 
       category.category_name, 
       product.product_name, 
       product.product_desc, 
       product.product_price, 
       product.stock, 
       product.product_img 
FROM product
JOIN category ON product.category_id = category.category_id";

$run = mysqli_query($conn, $select_query);
$row = mysqli_num_rows($run);

if ($row > 0) {
?>
    <table class="product-table">
        <thead class="product-thead">
            <tr>
                <th>Product ID</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Product Description</th>
                <th>Product Price</th>
                <th>Stock</th>
                <th>Product Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="product-tbody">
        <?php
        while ($data = mysqli_fetch_assoc($run)) {
            echo "
            <tr class='product-row'>
                <td class='product-cell'>{$data['product_id']}</td>
                <td class='product-cell'>{$data['category_name']}</td>
                <td class='product-cell'>{$data['product_name']}</td>
                <td class='product-cell'>{$data['product_desc']}</td>
                <td class='product-cell'>{$data['product_price']}</td>
                <td class='product-cell'>{$data['stock']}</td>
                <td class='product-cell'>
                    <img src='Productuploads/{$data['product_img']}' alt='Product Image' class='product-image'>
                </td>
                <td class='product-action'>
                    <a href='product_delete.php?product_id={$data['product_id']}' class='delete-btn'><i class='bi bi-trash'></i></a>
                    <a href='update_product.php?product_id={$data['product_id']}' class='edit-btn'><i class='bi bi-pencil'></i></a>
                </td>
            </tr>";
        }
        ?>
        </tbody>
    </table>
<?php
} else {
    echo "<p class='no-product-msg'>No products found.</p>";
}
?>
</div>
