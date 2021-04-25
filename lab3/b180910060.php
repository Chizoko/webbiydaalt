
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3</title>
</head>
<body>
<div class = "container">
<form action = "B180910060.php" method="POST">
  <div class="form-group" >
    <input type = "hidden" name = "crud" value ="<?php echo (isset($_GET['crud'])) ? $_GET['crud']:'' ?>" >
    <input type = "hidden" name = "id" value ="<?php echo (isset($_GET['id'])) ? $_GET['id']:'' ?>" >
    <input type = "hidden" name = "name" value ="<?php echo (isset($_GET['name'])) ? $_GET['name']:'' ?>" >
    <input type = "hidden" name = "email" value ="<?php echo (isset($_GET['email'])) ? $_GET['email']:'' ?>" >
    <label for="inputName">Name</label>
    <input type="text" class="form-control" name="inputName" value = "<?php echo (isset($_GET['name']))?$_GET['name']:'';?>" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="inputEmail">Email</label>
    <input type="email" class="form-control" name="inputEmail" value = "<?php echo (isset($_GET['email']))? $_GET['email']:'';?>" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" class="form-control" name="inputPassword" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "it301";
    $con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con)
{
    die("Алдаа:".mysqli_connect_error());
}
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if($_POST["crud"]=="")
        {
            
          if (isset($_REQUEST["inputName"]) && isset($_REQUEST["inputEmail"]) && isset($_REQUEST["inputPassword"]))
            {
              $uname=$_REQUEST["inputName"];
              $uemail=$_REQUEST["inputEmail"];
              $upass = $_REQUEST["inputPassword"];
              $name = mysqli_real_escape_string($con,$uname);
              $email =mysqli_real_escape_string($con,$uemail);
              $pass = mysqli_real_escape_string($con,$upass);
              echo $name;
              echo $pass;
              echo $email; 
              $sql = "INSERT INTO `employee` ( `name`, `email`, `pass`) VALUES('$name','$email',md5('$pass'));";
              if (mysqli_query($con, $sql)) 
              {
                echo "New record created successfully";
              } else 
              {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
              }
            }
        }
        elseif($_POST["crud"]=="edit")
        {
          $cName = mysqli_real_escape_string($con,$_REQUEST["inputName"]);
          $cEmail = mysqli_real_escape_string($con,$_REQUEST["inputEmail"]); 
          $cid = mysqli_real_escape_string($con,$_POST["id"]);
          $sql = "UPDATE `employee`
          SET `name` = '$cName', `email` = '$cEmail'
          WHERE `employeeid`='$cid';";
          if (mysqli_query($con, $sql)) 
          {
            echo "Record edited successfully";
          } else 
          {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
        }
    }
        if(isset($_REQUEST["crud"]))
        { 
          if($_REQUEST["crud"]=="delete")
        {
          $uid = $_REQUEST["id"];
          $id = mysqli_real_escape_string($con,$uid);
          $del = "DELETE FROM `employee` WHERE `employeeid`=$id;";
          if (mysqli_query($con, $del)) 
              {
                echo "New record deleted successfully";
              } else 
              {
                echo "Error: " . $del . "<br>" . mysqli_error($con);
              }
        }
        }
    $employ = "SELECT * FROM employee";
    $result = mysqli_query($con , $employ);
    echo "<table class='table table-striped mt-3' style='width:50%;margin-left: 200px;'>";
    echo "<tr><th>Name</th><th>Email</th><th>Password</th><th>Options</th></tr>";
    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row["name"];
        $email = $row["email"];
        $pass = $row["pass"];
        $id = $row["employeeid"];
        echo "<tr>";
        echo "<td>$name</td> <td>$email</td> <td>$pass</td> <td> <a href='index.php?crud=edit&id=$id&name=$name&email=$email'>Edit</a> <a href='index.php?crud=delete&id=$id'>Delete</a> </td>";
        echo "</tr>"; 
    }
    echo "</table>";
    mysqli_close($con);
?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>