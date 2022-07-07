<?php
include 'model.php';

$model = new Model();

$rows = $model->fetch();

if (!empty($rows)) {
    foreach ($rows as $row) { ?>

        <li id="<?php echo $row['id']?>">
            <span class="userdata">
                <span><span class="label">Username: </span><?php echo $row['username']?></span>
                <span><span class="label">Email: </span><?php echo $row['email']?></span>
                <span ><span class="label">Age: </span><?php echo $row['age']?></span>
            </span>
            <span class="btns">
                <a href="" id="edit" value="<?php echo $row['id'] ?>">
                    <i class="fa-regular fa-pen-to-square"></i>
                </a>
                <a href="" id="del" value="<?php echo $row['id'] ?>">
                    <i class="fa-regular fa-trash-can"></i>
                </a>
            </span>
        </li>

<?php
    }
} else {
    echo '<p>User list is empty!</p>';
}
?>
