<!-- Header -->
<?php include "includes/header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome to Admin
                        <small>Author name</small>
                    </h1>

                    <div class="col-xs-6">
                        <form action=" " method="post">
                            <div class="form-group">
                                <lable for="cat-title">Add Category</lable>
                                <input name="cat_title" class="form-control" type="text">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" name="submit" type="submit" value="Add Category">
                            </div
                        </form>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- footer -->
    <?php include "includes/footer.php"; ?>
