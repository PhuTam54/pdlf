<!doctype html>
<html lang="en">
<head>
    <?php include("../components/head.php"); ?>
</head>
<body>
<?php include("../components/nav.php"); ?>
<div class="container">
    <form
            action="post.php"
            method="post"
    >
        <div class="mb-3">
            <label for="name" class="form-label">Category name</label>
            <input name="name" type="name" class="form-control" id="name" aria-describedby="productNameHelp">
            <div id="productNameHelp" class="form-text"></div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>