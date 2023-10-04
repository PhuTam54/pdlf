<?php
    require 'components/header.php';
?>
    <div class="container">
        <form
            action="?page=student&action=save"
            method="post"
        >
            <div class="mb-3">
                <label for="name" class="form-label">Student name</label>
                <input name="name" type="name" class="form-control" id="name" aria-describedby="productNameHelp">
                <div id="productNameHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Age</label>
                <input name="age" type="number" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input name="address" type="text" class="form-control" >
            </div>
            <div class="mb-3">
                <label class="form-label">Telephone</label>
                <input name="telephone" type="number" class="form-control" >
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
<?php
    include "components/footer.php"
?>