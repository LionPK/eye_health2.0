<?php  
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

 class Factor extends CI_Controller {
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

        //default load model is factor_model
        $this->load->model('factor_model');
    }
    
    private function ajax_checking() {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

      //round fuction factor list
      function factor_list() {  
           $data["title"] = "ตรวจสอบข้อมูลปัจจัยนำเข้า";
           $this->load->view('frame/header_view');
           $this->load->view('frame/sidebar_nav_view');  
           $this->load->view('user/factor_list', $data);  
      } 

      //function fetch data to table of view page
      function fetch_factor() {  
           $fetch_data = $this->factor_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row) {  
                $sub_array = array();  
                $sub_array[] = $row->sex;  
                $sub_array[] = $row->age;
                $sub_array[] = $row->detail;  
                $data[] = $sub_array;  
           }

           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->factor_model->get_all_data(),  
                "recordsFiltered"     =>     $this->factor_model->get_filtered_data(),  
                "data"                    =>     $data  
           );

           echo json_encode($output);  
      }
 } 