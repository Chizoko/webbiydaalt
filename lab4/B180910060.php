<?php
//get hvselt ywuulsan tohioldold
if($_SERVER["REQUEST_METHOD"] == "GET")
{

//ogogdliin sang duudah
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "it301";
$con = mysqli_connect($servername, $username, $password, $dbname);
if(!$con)
{
    die("Алдаа:".mysqli_connect_error());
}
// search bolon check huwisagch zarlagdsan eseh
if(isset($_GET["search"])&& isset($_GET["check"]))
{   
    //herew hereglegch utga oruulagvi bol hooson utga butsaana
    if(strlen($_GET["search"])>0)
    {
        $search = mysqli_real_escape_string($con,$_GET["search"]);
        //check huwisagch aas hamaaran query hiine
        //1 bol name r 2 bol emailer
        if($_GET["check"] == 1)
        $sql = "SELECT * FROM employee WHERE `name` LIKE '$search%';";
        else
        $sql = "SELECT * FROM employee WHERE `email` LIKE '$search%';";
        $result = mysqli_query($con , $sql);
        //query hariug hewleh
        echo "<table class='table table-striped mt-3' style='width:50%;margin-left: 200px;'>";
        echo "<tr><th>Name</th><th>Email</th><th>Password</th><th>Options</th></tr>";
        
        while($row = mysqli_fetch_assoc($result))
        {
            $name = htmlspecialchars($row["name"]);
            $email =htmlspecialchars($row["email"]);
            $pass = htmlspecialchars($row["pass"]);
            $id = htmlspecialchars($row["employeeid"]);
            echo "<tr>";
            echo "<td>$name</td> <td>$email</td> <td>$pass</td> <td> <a href='#'>Edit</a> <a href='#'>Delete</a> </td>";
            echo "</tr>"; 
        }
    }else
    {
        echo "";
    }
}
}
?>