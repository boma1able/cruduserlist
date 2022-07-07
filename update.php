<?php 

include "model.php";

if (isset($_POST['update'])) {

    if (isset($_POST['edit_username']) && isset($_POST['edit_email']) && isset($_POST['edit_id'])) {

        if (!empty($_POST['edit_username']) && !empty($_POST['edit_email']) && !empty($_POST['edit_id'])) {
            
            $data['edit_id'] = $_POST['edit_id'];
            $data['edit_username'] = $_POST['edit_username'];
            $data['edit_email'] = $_POST['edit_email'];
            $data['edit_age'] = $_POST['edit_age'];
            
            $model = new Model();

            $update = $model->update($data);
            
           
        } else {
            echo "
            <script>alert('empty fields')</script>
            ";
        }
    }
}