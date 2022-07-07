<?php
class Model
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "userlist";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO(
                "mysql:host=$this->server;dbname=$this->db",
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo "Connection failed" . $e->getMessage();
        }
    }

    public function insert()
    {
        if (isset($_POST['submit'])) {

            if (isset($_POST['username']) && isset($_POST['email'])) {

                if (!empty($_POST['username']) && !empty($_POST['email'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $age = $_POST['age'];

                    $query = "INSERT INTO usertable (username, email, age) VALUES('$username', '$email', '$age')";
                    if ($sql = $this->conn->exec($query)) {
                        echo '<p id="mes">User added</p>';
                    } else {
                        echo '<p id="mes">Failed to add user!</p>';
                    }
                } else {
                    echo '<p id="mes">Empty fields!</p>';
                }
            }
        }
    }

    public function fetch(){
        $data = null;
        $stmt = $this->conn->prepare("SELECT * FROM usertable");
        $stmt->execute();
        $data = $stmt->fetchAll();

        return $data;
    }

    public function del($del_id){
        $query = "DELETE FROM usertable WHERE id = '$del_id' ";
        if ($sql = $this->conn->exec($query)) {
            echo '<p>User deleted!</p>';
        }else {
            echo '<p>User not deleted!</p>';
        }
    }


    public function edit($edit_id){
      $data = null;

      $stmt = $this->conn->prepare("SELECT * FROM usertable WHERE id='$edit_id'");

      $stmt->execute();

      $data = $stmt->fetch();

      return $data;
    }

    public function update($data){
      $query = "UPDATE usertable SET username = '$data[edit_username]', email = '$data[edit_email]', age = '$data[edit_age]'
      WHERE id='$data[edit_id]'";

      if ($sql = $this->conn->exec($query)) {
        echo '<p>User update!</p>

      <script>$("#exampleModal1").modal("hide")<script>
        ';
      }else {
        echo '<p>Failed to update</p>';
      }
    }
}
