<?php  
 class Factor_model extends CI_Model {  
      var $table = "import_factor";  
      var $select_column = array("id_factor","sex", "age","detail");  
      var $order_column = array("sex", "age","detail");

      //function query
      function make_query() {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table); 

           //function search data base on age and detail
           if(isset($_POST["search"]["value"])) {  
                $this->db->like("age", $_POST["search"]["value"]);  
                $this->db->or_like("detail", $_POST["search"]["value"]);  
           }

           if(isset($_POST["order"])) {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }else {  
                $this->db->order_by('id_factor', 'DESC');  
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
 }  