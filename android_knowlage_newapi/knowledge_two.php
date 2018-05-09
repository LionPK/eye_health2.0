<?php

//database constants
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'eye_health');

//connecting to database and getting the connection object
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//Checking if any error occured while connecting
if(mysqli_connect_error()) {
    echo "เชื่อมต่อ MySQL ผิดพลาด: " . mysqli_connect_error();
    die();
}

//creating a query
$stmt = $conn->prepare("SELECT id_know, type, name, detail, image
        FROM knowledge WHERE type='ความรู้เกี่ยวกับการรับประทานอาหาร'
        ORDER BY id_know ASC;");

//executing the query
$stmt->execute();

//binding results to the query
$stmt->bind_result($id_know, $type, $name, $detail, $image);

$knowledge_two = array();

//traversing through all the result
while($stmt->fetch()) {
    $temp = array();
    $temp['id_know'] = $id_know;
    $temp['type'] = $type;
    $temp['name'] = $name;
    $temp['detail'] = $detail;
    $temp['image'] = $image;
    array_push($knowledge_two, $temp);
}

//displaying the result in json format
echo json_encode($knowledge_two);