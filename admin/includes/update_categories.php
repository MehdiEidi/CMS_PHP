<form action="" method="post">
    <div class="form-group">
        <lable for="cat-title">Update Category</lable>
        <?php
        if (isset($_GET['edit'])) {
            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
            global $connection;
            $allCategoriesQueryResult = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($allCategoriesQueryResult)) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            }
            ?>
            <input value="<?php if (isset($cat_title)) echo $cat_title; ?>" name="cat_title" class="form-control" type="text">

        <?php }?>

        <?php
        if (isset($_POST['update_category'])) {
            $cat_title = $_POST['cat_title'];

            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
            global $connection;
            $updateQueryResult = mysqli_query($connection, $query);

            if (!$updateQueryResult) {
                die("update query failed " . mysqli_error($connection));
            }
        }
        ?>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" name="update_category" type="submit" value="Update Category">
    </div
</form>