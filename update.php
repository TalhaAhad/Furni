<?php
    include("connect.php");
    $category_id1 = $_GET['category_id'];
    $category_name1 = $_GET['category_name'];
    $category_desc1 = $_GET['category_desc'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Category</title>
    <?php include "headerlinks.php"; ?>
</head>
<body>
    <section>
    <div class="category">
        <h2>Update Category</h2>
        <form action="" method="POST">
            <input type="hidden" name="category_id" value="<?php echo $category_id1; ?>">
            <input type="text" name="category_name" value="<?php echo $category_name1; ?>" placeholder="Enter Name">
            
            <!-- Fixed textarea -->
            <textarea name="category_desc" placeholder="Enter Description"><?php echo $category_desc1; ?></textarea>
            
            <button class="btn" type="submit" name="upload">Update Category</button>
        </form>
        <a href="view-data.php" class="view_category">View Category</a>
    </div>
    </section>

    <?php
        if (isset($_POST['upload'])) {
            $category_name = $_POST['category_name'];
            $category_desc = $_POST['category_desc'];
            $category_id = $_POST['category_id'];

            $update_query = "UPDATE category 
                             SET category_name='$category_name', category_desc='$category_desc' 
                             WHERE category_id='$category_id'";

            $run = mysqli_query($conn, $update_query);

            if ($run) {
                echo "<script>
                        alert('✅ Category updated successfully!');
                        window.location.href='view_category.php';
                      </script>";
            } else {
                echo "<script>alert('❌ Data not updated.');</script>";
            }
        }
    ?>

</body>
</html>
