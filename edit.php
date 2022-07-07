<?php

include 'model.php';

$edit_id = $_POST['edit_id'];

$model = new Model();

$row = $model->edit($edit_id);

if (!empty($row)) { ?>

    <h2 class="ttl">Edit User</h2>
    <ul id="show"></ul>
    <form id="form" action="post">
        <div>
            <input type="hidden" id="edit_id" value="<?php echo $row['id'] ?>">
        </div>
        <div class="form-group">
            <label for="">username</label>
            <input type="text" id="edit_username" value="<?php echo $row['username']; ?>">
        </div>
        <div class="form-group">
            <label for="">Descripcion</label>
            <input name="email" id="edit_email" value="<?php echo $row['email']; ?>">
        </div>
        <div class="form-group">
            <label for="">Age</label>
            <input name="age" id="edit_age" value="<?php echo $row['age']; ?>">
        </div>
    </form>

    <div class="btn-block">
        <button type="button" class="btn" id="update">Update</button>
        <button type="button" class="btn" id="close">Close</button>
    </div>

<?php

}

?>