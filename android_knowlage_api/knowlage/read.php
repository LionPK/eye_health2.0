<?php
//required headers
header("Access-Control-Allow_origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include database and object files
include_once '../config/database.php';
include_once '../objects/knowledge.php';

//instantiate database and knowledge object
$database = new Database();
$db = $database->getConnection();

//initialize object
$knowledge = new Knowledge($db);

//query knowledge
$stmt = $knowledge->read();
$num = $stmt->rowCount();

//check if more than 0 record found
if($num>0) {

    //knowlage array
    $knowledge_arr = array();
    $knowledge_arr["records"] = array();

    //retrieve our table contents
    //fetch() is faster than fetchAll()
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //extract row
        //this will make $row['name] to
        //just $name only
        extract($row);

        $knowledge_item =  array(
            "id_know" => $id_know,
            "type" => $type,
            "name" => $name,
            "detail" => $detail,
            // "detail" => html_entity_decode($detail),
            "image" => $image
        );

        array_push($knowledge_arr["records"], $knowledge_item);
    }

    echo json_encode($knowledge_arr);
}else {
    echo json_encode(
        array("message" => "No products found.")
    );
}
?>