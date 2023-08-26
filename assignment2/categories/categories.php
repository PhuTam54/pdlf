<?php
    // get product from db
    // 1.connect
    $host = 'localhost';
    $dbname = 'php';
    $dbuser = 'root';
    $dbpassword = '';

    $conn = new mysqli($host, $dbuser, $dbpassword, $dbname); // host user pass dbname
    if ($conn->connect_error) {
        die("Connection refused");
    }
    // connection succeed
    // 2. query
    $sql = 'select * from categories';
    $result = $conn->query($sql);
    $categories = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("../components/head.php"); ?>
</head>
<body>
<?php include("../components/nav.php"); ?>
<div class="container">
    <h1>Categories List</h1>
    <a href="form.php" class="btn btn-outline-primary">Create new category</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($categories as $item):?>
            <tr>
                <td><?php echo $item["id"];?></td>
                <td><?php echo $item["name"];?></td>
                <td><?php echo $item["slug"];?></td>
                <td>
                    <a href="edit.php?id=<?php echo $item['id'] ?>" class="btn btn-warning">Edit</a>
<!--                    data-bs-toggle="modal" data-bs-target="#exampleModal"-->
                    <a onclick="return confirm('Are you sure to delete <?php $item['name']; ?>')" href="delete.php?id=<?php echo $item['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" >Confirm</button>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>