<?php
$sv = [
    "name"=>"Nguyen Van A",
    "age"=>18
];

$list = [
    [
        "name"=>"Nguyen Phu Tam",
        "age"=>19
    ],
    [
        "name"=>"Tran Thi Thuy",
        "age"=>18
    ]
];
?>
<!doctype html>
<html lang="en">
<head>
    <?php include("../components/head.php"); ?>
</head>
<body>
<?php include("../components/nav.php"); ?>
<div class="container">
    <h1>Student List</h1>
    <a href="form.php" class="btn btn-primary">Create new student</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($list as $item):?>
            <tr>
                <td></td>
                <td><?php echo $item["name"];?></td>
                <td><?php echo $item["age"];?></td>
                <td></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>
</div>
</body>
</html>