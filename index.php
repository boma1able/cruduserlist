<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="wrap">

  <h2 class="ttl">User list</h2>

  <form id="form" action="post">
    <div id="result"></div>
    <div class="form-group">
      <label>Name:</label>
      <input type="text" id="username">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input name="email" id="email">
    </div>
    <div class="form-group">
      <label>Age:</label>
      <input type="number" name="age" id="age">
    </div>
    <div class="form-group">
      <button type="submit" id="submit" class="btn">Add User</button>
    </div>
  </form>

  <div class="listResult">
      <ul id="fetch"></ul>
  </div>

  <div class="edit-block">
    <div id="edit_data"></div>
  </div>

  <div class="overflow"></div>

</div>





  
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    $(document).on("click", "#submit", function(e) {
      e.preventDefault();
      var username = $("#username").val();
      var email = $("#email").val();
      var age = $("#age").val();
      var submit = $("#submit").val();

      $.ajax({
        url: "insert.php",
        type: "post",
        data: {
          username: username,
          email: email,
          age: age,
          submit: submit
        },
        success: function(data) {
          fetch();
          $("#result").html(data);
        }
      })

      $("#form")[0].reset();
    });

    //Fetch
    function fetch() {
      $.ajax({
        url: "fetch.php",
        type: "post",
        success: function(data) {
          $("#fetch").html(data);
        }
      });
    }
    fetch();

    //Delete user
    $(document).on("click", "#del", function(e) {
      e.preventDefault();

        var del_id = $(this).attr("value");

        $.ajax({
          url: "del.php",
          type: "post",
          data: {
            del_id: del_id
          },
          success: function(data) {
            fetch();
            $("#show").html(data);
          }
        });

    });


    //Edit user
    $(document).on("click", "#edit", function(e) {
      e.preventDefault();

      $('.edit-block').addClass('show');
      $('.overflow').addClass('show');

      var edit_id = $(this).attr("value");

      $.ajax({
        url: "edit.php",
        type: "post",
        data: {
          edit_id: edit_id
        },

        success: function(data) {
          $("#edit_data").html(data);
        }
      });

    });

    //update user
    $(document).on("click", "#update", function(e){
      e.preventDefault();

      var edit_username = $("#edit_username").val();
      var edit_email = $("#edit_email").val();
      var edit_age = $("#edit_age").val();
      var update = $("#update").val();
      var edit_id = $("#edit_id").val();
      

      $.ajax({
        url: "update.php",
        type: "post",
        data:{
          edit_id:edit_id,
          edit_username:edit_username,
          edit_email:edit_email,
          edit_age:edit_age,
          update:update
        },
        success: function(data){
          fetch();
          $("#show").html(data);
        }
      });
    });


    $(document).on("click", "#close", function(e){
      e.preventDefault();
      $('.edit-block').removeClass('show');
      $('.overflow').removeClass('show');
    });

    
  </script>
</body>

</html>