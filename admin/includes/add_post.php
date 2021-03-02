<?php
if (isset($_POST['create_post'])) {
    $postTitle = $_POST['title'];
    $postAuthor = $_POST['author'];
    $postCategoryId = $_POST['post_category'];
    $postStatus = $_POST['post_status'];
    $postImage = $_FILES['image']['name'];
    $postImageTemp = $_FILES['image']['tmp_name'];
    $postTags = $_POST['post_tags'];
    $postContent = $_POST['post_content'];
    $postDate = date('d-m-y');
    $postCommentCount = 4;

    move_uploaded_file($postImageTemp, "../images/$postImage");

    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) ";
    $query .= "VALUES({$postCategoryId}, '{$postTitle}', '{$postAuthor}',now() ,'{$postImage}', '{$postContent}', '{$postTags}', '{$postCommentCount}', '{$postStatus}')";

    global $connection;
    $createPostQuery = mysqli_query($connection, $query);

    if (!$createPostQuery) {
        die("create post failed " . mysqli_error($connection));
    }
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select name="post_category" id="post_category">
            <?php
            $query = "SELECT * FROM categories";
            global $connection;
            $allCategoriesQueryResult = mysqli_query($connection, $query);

            if (!$allCategoriesQueryResult) {
                die('getting categories query failed ' . mysqli_error($connection));
            }

            while ($row = mysqli_fetch_assoc($allCategoriesQueryResult)) {
                $catId = $row['cat_id'];
                $catTitle = $row['cat_title'];

                echo "<option value='{$catId}'>{$catTitle}</option>";
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Post Author</label>
        <input type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
</form>