<?php 


//configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = 'CodeHumps12@a';
$db_name = 'user';

//connect to Mysql
$conn = new mysqli($db_host,$db_username,$db_password,$db_name);

//check connection
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

//get form data
$name = $_POST['name'];
$email = $_POST['email'];


//Mysql query
$sql = "INSERT INTO user.user_info(name,email) VALUES ('$name', '$email')";
if($conn->query($sql)){
    echo "Data inserted succesfully!";
}else{
    if($conn ->errno === 1062){
        echo "Data Already Exist";
    }else{
        echo "Error: " . $sql ."<br>" . $conn->error;
    }
    
}

//retrieve data from the database
$sqlD = "SELECT * FROM user_info";
$result = $conn->query($sqlD);

//check if the query returned any results
if($result->num_rows >0){
    //Display the retrieve data
    while($row = $result->fetch_assoc()){
    echo "<p>Name: ". $row["name"]. ", Email: " 
    . $row["email"]."</p>";
}
}else{
    echo "0 results";
}

//close connection
$conn->close();
?>