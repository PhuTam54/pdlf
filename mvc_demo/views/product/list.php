<?php
require 'components/header.php';
?>
<div class="container">
    <h1>Product List</h1>
    <a
        href="?page=product&action=create"
        class="btn btn-outline-primary"
    >Create new product
    </a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Qty</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $item):?>
            <tr>
                <td><?php echo $item->id;?></td>
                <td><?php echo $item->name;?></td>
                <td><?php echo $item->price;?></td>
                <td><?php echo $item->description;?></td>
                <td><?php echo $item->qty;?></td>
                <td>
                    <a
                        href="?page=product&action=addtocart?id=<?php echo $item->id ?>"
                        class="btn btn-primary"
                    >Add to cart</a>
                    <a
                        href="?page=product&action=edit?id=<?php echo $item->id ?>"
                        class="btn btn-warning"
                    >Edit</a>
<!--                    data-bs-toggle="modal" data-bs-target="#exampleModal"-->
                    <a
                        onclick="return confirm('Are you sure to delete <?php $item->name; ?>')"
                        href="?page=product&action=delete?id=<?php echo $item->id ?>"
                        class="btn btn-danger"
                    >Delete</a>
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
<?php
    include "components/footer.php"
?>