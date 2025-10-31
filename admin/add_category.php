<section>
<div class="category">
    <h2>Add Categories</h2>
<form  action="" method="POST">
    <label for="">Category Name:
    <input type="text" placeholder="Enter Category Name" name="category_name" require>
    </label>
    <label> Category Decription:
    <textarea name="description" id="" row="100" col="100" placeholder="Enter Description" require></textarea>
    </label><br>
    <button type="submit" name="add_category" class="btn">Add Category</button>
</form>
</div>
</section>


<?php
    include "connect.php";
    if(isset($_POST['add_category'])){
        $category_name = $_POST ['category_name'];
        $description = $_POST ['description'];
        $insert_query = "insert into category (category_name, category_desc) values ('$category_name','$description')";
        $run = mysqli_query($conn, $insert_query);
        if($run){
            echo "<script>alert('Categories successfully added!')</script>";
        }else{
            echo "<script>alert('Categories Not added!')</script>";
        }
    }
?>