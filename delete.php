<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Category</title>
    <?php include "headerlinks.php"; ?>
</head>
<body>
    <?php
    include "connect.php";
    $category_id = $_GET['category_id'];
    $delete_query = "DELETE FROM category WHERE category_id = '$category_id'";
    $run = mysqli_query($conn, $delete_query);
    if($run){
        echo "<script>alert('Data Deleted!'); window.location.href = 'view_category.php';</script>";
    }
    else{
        echo "<script>alert('Data Not Deleted!')</script>";
    }


?>
</body>
</html>
