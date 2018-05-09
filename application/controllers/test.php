<?php  
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

 class Test extends CI_Controller {
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

        //default load model is knowledge_model
        // $this->load->model('knowledge_model');
    }

      //round fuction knowledge list
      function test() {  
        //    $data["title"] = "การจัดการเกล็ดความรู้";
        //    $this->load->view('frame/header_view');
        //    $this->load->view('frame/sidebar_nav_view');  
           $this->load->view('test');  
      }
    } 

?>