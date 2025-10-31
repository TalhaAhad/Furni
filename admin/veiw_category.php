<?php
        include "connect.php";
        $select_query = "select * from category";
        $run = mysqli_query($conn, $select_query);
        $row = mysqli_num_rows($run);
        if ($row){

        }
    ?>

    <table>
        <thead>
            <tr>
                <th>Category ID</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($data = mysqli_fetch_array($run)){
                    $desc_word = explode(" ", $data['category_desc']);
                    $short_desc = implode(" ", array_slice($desc_word, 0, 4)) . "....";
                    echo "
                        <tr>
                            <td>$data[0]</td>
                            <td>$data[1]</td>
                            <td>$data[2]</td>
                            <td>
                                <a href='delete.php?category_id=$data[0]'><i class='bi bi-trash'></i></a>

                                <a href='update.php?category_id=$data[0]&category_name=$data[1]&category_desc=$data[2]'><i class='bi bi-pencil'></i></a>
                            </td>
                        </tr>
                    ";
                }
            ?>
        </tbody>
    </table>