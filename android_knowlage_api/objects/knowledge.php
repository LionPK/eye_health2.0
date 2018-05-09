<?php
class Knowledge {

    //database connection and table name
    private $conn;
    private $table_name = "eye_health.knowledge";

    //object properties
    public $id_know;
    public $type;
    public $name;
    public $detail;
    public $image;

    //constructor with $db as database connection
    public function __construct($db) {
        $this->conn = $db;
    }

    //read knowledge
    function read() {

        //select all query
        $query = "SELECT *
            FROM " . $this->table_name . "
            WHERE type ='ความรู้เกี่ยวกับโรคสายตา'
            ORDER BY id_know ASC";

        // $query = "SELECT * FROM eye_health.knowledge";

        //prepare query statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;
    }
}
?>