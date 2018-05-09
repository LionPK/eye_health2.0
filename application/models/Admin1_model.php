<?php  
 class Admin1_model extends CI_Model {  
      var $table = "user";  
      var $select_column = array("user_id", "created_at", "name","surname", "role", "email");
      var $order_column = array("created_at", "name","surname", "role", "email");

      //function query
      function make_query() {  
        $this->db->select($this->select_column);  
        $this->db->from($this->table); 
        $this->db->where('status', 1); //แสดงข้อมูลของผู้ใช้งานที่มี status เป็น 1

           //function search data base on type and name
           if(isset($_POST["search"]["value"])) {  
                $this->db->like("created_at", $_POST["search"]["value"]);  
                $this->db->or_like("name", $_POST["search"]["value"]);  
           }

           if(isset($_POST["order"])) {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }else {  
                $this->db->order_by('user_id', 'DESC');  
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
           $this->db->where('status', 1); //แสดงข้อมูลของผู้ใช้งานที่มี status เป็น 1
  
           $query = $this->db->get();

           return $query->num_rows();  
      }

      function get_all_data() {  
           $this->db->select("*");  
           $this->db->from($this->table);
           $this->db->where('status', 1); //แสดงข้อมูลของผู้ใช้งานที่มี status เป็น 1

           return $this->db->count_all_results();  
      }

      //function insert data to database
      function insert_user($data) {  
           $this->db->insert('user', $data);  
      }
      
      //function fetch single knowledge by knowledge id
      function fetch_single_admin($admin_id) {  
           $this->db->where("user_id", $admin_id);  
           $query=$this->db->get('user');  
           return $query->result();  
      }
      
      //function update data
      function update_admin($admin_id, $data) {  
           $this->db->where("user_id", $admin_id);  
           $this->db->update("user", $data);  
      }
      
      //function delete
      function delete_single_admin($id_admin) {  
           $this->db->where("user_id", $id_admin);  
           $this->db->delete("user");  
           //DELETE FROM knowledge WHERE user_id = '$id_admin'  
      }  
 }  