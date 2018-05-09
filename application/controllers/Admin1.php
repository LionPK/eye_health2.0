<?php  
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

 class Admin1 extends CI_Controller {
    public function __Construct() {
        parent::__Construct();
        //if user logged in system
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        //if user that logged have role equare admin
        if($this->session->userdata('role') != 'admin'){
            redirect(base_url());
        }

        //default load model is admin1_model
        $this->load->model('admin1_model');
    }
    
    private function ajax_checking() {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

      //round fuction knowledge list
      function admin_list() {  
           $data["title"] = "การจัดการข้อมูลผู้ดูแล";
           $this->load->view('frame/header_view');
           $this->load->view('frame/sidebar_nav_view');  
           $this->load->view('admin_list', $data);  
      } 

      //function fetch data to table of view page
      function fetch_admin() {  
           $fetch_data = $this->admin1_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row) {  
                $sub_array = array();  
                $sub_array[] = $row->created_at; 
                $sub_array[] = $row->name;  
                $sub_array[] = $row->surname;
                $sub_array[] = $row->role;
                $sub_array[] = $row->email;  
                $sub_array[] = '<button type="button" name="update" id="'.$row->user_id.'" class="btn btn-warning btn-xs update">แก้ไข</button>';  
                $sub_array[] = '<button type="button" name="delete" id="'.$row->user_id.'" class="btn btn-danger btn-xs delete">ลบ</button>';  
                $data[] = $sub_array;  
           }

           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->admin1_model->get_all_data(),  
                "recordsFiltered"     =>     $this->admin1_model->get_filtered_data(),  
                "data"                    =>     $data  
           );

           echo json_encode($output);  
      }

      //function add and update knowledge by operation that we custom
      function user_action() {
          //system enter if operation when user click on add  
           if($_POST["operation"] == "Add") {
            $insert_data = array(  
                'name'          =>     $this->input->post('name'),  
                'surname'               =>     $this->input->post("surname"),
                'email'               =>     $this->input->post("email")
            ); 
                
                $this->admin1_model->insert_user($insert_data);  
                echo 'บันทึกข้อมูลสำเร็จแล้ว';  
           }
           
           //system enter if operation when user click on update
           if($_POST["operation"] == "Edit") {  
                $updated_data = array(  
                     'name'          =>     $this->input->post('name'),  
                     'surname'               =>     $this->input->post('surname'),
                     'email'               =>     $this->input->post('email')
                );

                $this->admin1_model->update_admin($this->input->post("admin_id"), $updated_data);  
                echo 'ปรับปรุงข้อมูลสำเร็จแล้ว';  
           }  
      } 
      
      //function to fetch single data when user update data to database
      function fetch_single_admin()  
      {  
           $output = array();  
        //    $this->load->model("crud_model");  
           $data = $this->admin1_model->fetch_single_admin($_POST["admin_id"]);

           foreach($data as $row) {  
                $output['name'] = $row->type;  
                $output['surname'] = $row->name;
                $output['email'] = $row->detail;
           }  
           echo json_encode($output);  
      }
      
      //function to delete single data when user click on delete
      function delete_single_admin() {  
           $this->admin1_model->delete_single_admin($_POST["id_admin"]);  
           echo 'ลบข้อมูลสำเร็จแล้ว';  
      }  
 } 