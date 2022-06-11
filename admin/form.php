

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <center>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $select = "select  * from insert_img";
                $res = mysqli_query($conn,$select);
                while($row=mysqli_fetch_array($res))
                {
            ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['name'] ?></td>
                <td><img src="<?php echo $row['image'] ?>" alt="img" height="100px" width="100px"></td>
            </tr>
            <?php
                }
                ?>
        </tbody>
    </table>
    </center>
</body>
</html>