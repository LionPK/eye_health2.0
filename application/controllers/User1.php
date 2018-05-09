<?php  
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

 class User1 extends CI_Controller {
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

        //default load model is user_model
        $this->load->model('user1_model');
    }
    
    private function ajax_checking() {
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }

      //round fuction users list
      function users_list() {  
           $data["title"] = "การจัดการเกล็ดความรู้";
           $this->load->view('frame/header_view');
           $this->load->view('frame/sidebar_nav_view');  
           $this->load->view('users_list1', $data);  
      } 

      //function fetch data to table of view page
      function fetch_user() {  
           $fetch_data = $this->user1_model->make_datatables();  
           $data = array();  
           foreach($fetch_data as $row) {  
                $sub_array = array();  
                $sub_array[] = $row->created_at; 
                $sub_array[] = $row->name;  
                $sub_array[] = $row->surname;
                $sub_array[] = $row->role;
                $sub_array[] = $row->email;  
                // $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-warning btn-xs update">รีเซ็ต</button>';  
                $data[] = $sub_array;  
           }

           $output = array(  
                "draw"                    =>     intval($_POST["draw"]),  
                "recordsTotal"          =>      $this->user1_model->get_all_data(),  
                "recordsFiltered"     =>     $this->user1_model->get_filtered_data(),  
                "data"                    =>     $data  
           );

           echo json_encode($output);  
      }

      //function add and update knowledge by operation that we custom
    //   function knowledge_action() {
    //       //system enter if operation when user click on add  
    //        if($_POST["operation"] == "Add") {
    //         $insert_data = array(  
    //             'type'          =>     $this->input->post('type'),  
    //             'name'               =>     $this->input->post("name"),
    //             'detail'               =>     $this->input->post("detail"), 
    //             'image'                    =>     $this->upload_image()  
    //         ); 
                
    //             // $this->load->model('knowledge_model');  
    //             $this->knowledge_model->insert_knowledge($insert_data);  
    //             echo 'บันทึกข้อมูลสำเร็จแล้ว';  
    //        }
           
    //        //system enter if operation when user click on update
    //        if($_POST["operation"] == "Edit") {  
    //             $knowledge_image = '';  
    //             if($_FILES["knowledge_image"]["name"] != '') {  
    //                  $knowledge_image = $this->upload_image();

    //             }else {  
    //                  $knowledge_image = $this->input->post("hidden_knowledge_image");  

    //             } 

    //             $updated_data = array(  
    //                  'type'          =>     $this->input->post('type'),  
    //                  'name'               =>     $this->input->post('name'),
    //                  'detail'               =>     $this->input->post('detail'),
    //                  'image'                    =>     $knowledge_image  
    //             );

    //             // $this->load->model('crud_model');  
    //             $this->knowledge_model->update_knowledge($this->input->post("knowledge_id"), $updated_data);  
    //             echo 'ปรับปรุงข้อมูลสำเร็จแล้ว';  
    //        }  
    //   } 
      
    //   //function upload image to database
    //   function upload_image() {  
    //        if(isset($_FILES["knowledge_image"])) { 
    //             $extension = explode('.', $_FILES['knowledge_image']['name']);
    //             $new_name = rand() . '.' . $extension[1];
    //             $destination = './upload/' . $new_name;  
    //             move_uploaded_file($_FILES['knowledge_image']['tmp_name'], $destination);          

    //             return $new_name;  
    //        }
    //   }
      
    //   //function to fetch single data when user update data to database
    //   function fetch_single_knowledge()  
    //   {  
    //        $output = array();  
    //     //    $this->load->model("crud_model");  
    //        $data = $this->knowledge_model->fetch_single_knowledge($_POST["knowledge_id"]);

    //        foreach($data as $row) {  
    //             $output['type'] = $row->type;  
    //             $output['name'] = $row->name;
    //             $output['detail'] = $row->detail;
    //             if($row->image != '') {  
    //                  $output['knowledge_image'] = '<img src="'.base_url().'upload/'.$row->image.'" class="img-thumbnail" width="50" height="35" /><input type="hidden" name="hidden_knowledge_image" value="'.$row->image.'" />';  
    //             }else {  
    //                  $output['knowledge_image'] = '<input type="hidden" name="hidden_knowledge_image" value="" />';  
    //             }  
    //        }  
    //        echo json_encode($output);  
    //   }
      
    //   //function to delete single data when user click on delete
    //   function delete_single_knowledge() {  
    //     //    $this->load->model("crud_model");  
    //        $this->knowledge_model->delete_single_knowledge($_POST["knowledge_id"]);  
    //        echo 'ลบข้อมูลสำเร็จแล้ว';  
    //   }  
 } 