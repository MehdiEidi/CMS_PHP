<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>Id</th>
        <th>Author</th>
        <th>Title</th>
        <th>Category</th>
        <th>Status</th>
        <th>Image</th>
        <th>Tags</th>
        <th>Comments</th>
        <th>Date</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $query = "SELECT * FROM posts";
    global $connection;
    $allPostsQuery = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($allPostsQuery)) {
        $postId = $row['post_id'];
        $postAuthor = $row['post_author'];
        $postTitle = $row['post_title'];
        $postCategoryId = $row['post_category_id'];
        $postStatus = $row['post_status'];
        $postImage = $row['post_image'];
        $postTags = $row['post_tags'];
        $postCommentCount = $row['post_comment_count'];
        $postDate = $row['post_date'];

        echo "<tr>";
        echo "<td>{$postId}</td>";
        echo "<td>{$postAuthor}</td>";
        echo "<td>{$postTitle}</td>";

        $query = "SELECT * FROM categories WHERE cat_id = {$postCategoryId}";
        $allCategoriesQueryResult = mysqli_query($connection, $query);

        if (!$allCategoriesQueryResult) {
            die("getting categories query failed " . mysqli_error($connection));
        }

        $cat_title = '';
        while ($row = mysqli_fetch_assoc($allCategoriesQueryResult)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
        }

        echo "<td>{$cat_title}</td>";
        echo "<td>{$postStatus}</td>";
        echo "<td><img width='100' src='../images/$postImage' alt='post image'></td>";
        echo "<td>{$postTags}</td>";
        echo "<td>{$postCommentCount}</td>";
        echo "<td>{$postDate}</td>";
        echo "<td><a href='posts.php?source=edit_post&post_id={$postId}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$postId}'>Delete</a></td>";
        echo "</tr>";
    }
    ?>

    </tbody>
</table>

<?php
if (isset($_GET['delete'])) {
    $postId = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$postId}";

    global $connection;
    $deletePostQueryResult = mysqli_query($connection, $query);
    header("Location: posts.php");

    if (!$deletePostQueryResult) {
        die('delete query failed. ' . mysqli_error($connection));
    }
}
?>