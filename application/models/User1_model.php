<?php  
 class User1_model extends CI_Model {  
      var $table = "users";  
      var $select_column = array("id", "created_at", "name","surname", "role", "email");
      var $order_column = array("created_at", "name","surname", "role", "email", null);

      //function query
      function make_query() {  
        $this->db->select($this->select_column);  
        $this->db->from($this->table); 

           //function search data base on type and name
           if(isset($_POST["search"]["value"])) {  
                $this->db->like("created_at", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);  
           }

           if(isset($_POST["order"])) {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }else {  
                $this->db->order_by('id', 'DESC');  
           }  
      } 
      
      //function list datatables and display length
      function make_datatables() {  
           $this->make_query();

           if($_POST["length"] != -1) {  
                $this->db->limit($_POST['length'], $_POST['start']);  
           } 
           $query = $this->db->get();

           return $query->result();  
      } 
      
      
      function get_filtered_data() {  
           $this->make_query();
  
           $query = $this->db->get();

           return $query->num_rows();  
      }

      function get_all_data() {  
           $this->db->select("*");  
           $this->db->from($this->table);

           return $this->db->count_all_results();  
      }

      //function insert data to database
      // function insert_knowledge($data) {  
      //      $this->db->insert('knowledge', $data);  
      // }
      
      // //function fetch single knowledge by knowledge id
      // function fetch_single_knowledge($knowledge_id) {  
      //      $this->db->where("id_know", $knowledge_id);  
      //      $query=$this->db->get('knowledge');  
      //      return $query->result();  
      // }
      
      // //function update data
      // function update_knowledge($knowledge_id, $data) {  
      //      $this->db->where("id_know", $knowledge_id);  
      //      $this->db->update("knowledge", $data);  
      // }
      
      // //function delete
      // function delete_single_knowledge($knowledge_id) {  
      //      $this->db->where("id_know", $knowledge_id);  
      //      $this->db->delete("knowledge");  
      //      //DELETE FROM knowledge WHERE id_know = '$knowledge_id'  
      // }  
 }  