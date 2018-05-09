<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends CI_Controller {

    public function __Construct() {
        parent::__Construct();
        if(!$this->session->userdata('logged_in')) {
            redirect(base_url());
        }

        if($this->session->userdata('role') != 'admin'){
            redirect(base_url());
        }

        $this->load->model('user_model');
    }
    

    private function ajax_checking(){
        if (!$this->input->is_ajax_request()) {
            redirect(base_url());
        }
    }
    
    //controller ของหน้า users list
    public function users_list(){

        $data = array(
            'formTitle' => 'การจัดการผู้ใช้งานระบบ',
            'title' => 'การจัดการผู้ใช้งานระบบ',
            'users' => $this->user_model->get_users_list(), //เรียก model function ที่ชื่อว่า get_users_list
        );

        $this->load->view('frame/header_view');
        $this->load->view('frame/sidebar_nav_view');
        $this->load->view('user/users_list', $data);

    }

    function reset_users_password($email,$id){
        $this->ajax_checking();

        $update = $this->user_model->reset_users_password($email,$id); //ไปเรียก model function ที่ชื่อว่า reset_users_password
        if($update['status'] == 'success')
            $this->session->set_flashdata('success', 'ผู้ใช้งาน '.$email.' ได้รับการตั้งรหัสผ่านใหม่แล้ว!');

        echo json_encode($update);
    }


    //เริ่มการทำงานในส่วนของ controler หน้า activity log
    // function activity_log(){
    //     $data = array(
    //         'formTitle' => 'บันทึกกิจกรรม',
    //         'title' => 'บันทึกกิจกรรม',
    //     );
    //     $this->load->view('frame/header_view');
    //     $this->load->view('frame/sidebar_nav_view');
    //     $this->load->view('admin/activity_log', $data);

    // }

    // function get_activity_log(){
    //     $this->ajax_checking();
    //     echo  json_encode( $this->admin_model->get_activity_log() );//ไปเรียก model function ที่ชื่อว่า get_activity_log
    // }



}
