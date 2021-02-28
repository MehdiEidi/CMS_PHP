<?php
function insert_categories() {

    if (isset($_POST['submit'])) {
        $cat_title = $_POST['add_cat_title'];

        if (empty($cat_title)) {
            echo "this field should not be empty";
        } else {
            $query = "INSERT INTO categories(cat_title) ";
            $query .= "VALUE('{$cat_title}')";

            global $connection;
            $creatCategoryQueryResult = mysqli_query($connection, $query);

            if (!$creatCategoryQueryResult) {
                die("couldn't create the category" . mysqli_error($connection));
            }
        }
    }
}

function getAllCategories() {
    $query = "SELECT * FROM categories";
    global $connection;
    $allCategoriesQueryResult = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($allCategoriesQueryResult)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";
    }
}

function deleteCategories() {
    if (isset($_GET['delete'])) {
        $cat_id = $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id =  {$cat_id}";
        global $connection;
        $deleteQueryResult = mysqli_query($connection, $query);
        header("Location: categories.php");

        if (!$deleteQueryResult) {
            die("delete query failed " . mysqli_error($connection));
        }
    }
}
?>