<?php
$servername = "bldbz173055.bld.dst.ibm.com";
$username = "haggisusr";
$password = "new4you8";
$dbname = "ibmevent_stage";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);
//print_r($conn);
// Check connection
if (!$conn) {
    echo "CONNECTION FAILED";
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";

echo $sql = "SELECT customer_id, name01, name02 FROM dtb_customer";
//print_r($sql);
$result = $conn->query($sql);
print_r($result);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["customer_id"]. " - Name: " . $row["name01"]. " " . $row["name02"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?> 
