<?php
require 'components/header.php';
?>
<div class="container">
    <h1>Student List</h1>
    <a
        href="?page=student&action=create"
        class="btn btn-outline-primary"
    >Create new student
    </a>
    <table class="student">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Age</th>
            <th scope="col">Address</th>
            <th scope="col">Telephone</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($students as $item):?>
            <tr>
                <td><?php echo $item->id;?></td>
                <td><?php echo $item->name;?></td>
                <td><?php echo $item->age;?></td>
                <td><?php echo $item->address;?></td>
                <td><?php echo $item->telephone;?></td>
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
<?php
    include "components/footer.php"
?>