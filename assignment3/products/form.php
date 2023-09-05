<!doctype html>
<html lang="en">
<head>
    <?php include("../components/head.php"); ?>
</head>
<body>
<?php include("../components/nav.php"); ?>
<div class="container">
    <form
            action="create.php"
            method="post"
    >
        <div class="mb-3">
            <label for="name" class="form-label">Product name</label>
            <input name="name" type="name" class="form-control" id="name" aria-describedby="productNameHelp">
            <div id="productNameHelp" class="form-text"></div>
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input name="price" type="number" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control" >
        </div>
        <div class="mb-3">
            <label class="form-label">Qty</label>
            <input name="qty" type="number" class="form-control" >
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>