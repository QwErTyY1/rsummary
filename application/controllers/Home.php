<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));
        $this->load->helper('captcha');
        $this->load->helper(array('url'));
        $this->load->model('home_model');
        $this->load->library('captcha');

    }




    public function index()
    {
        $data = new stdClass();


        $res['captcha_html'] = $this->captcha->_create_captcha();


        if (isset($_SESSION['user_name']) || !empty($_SESSION['user_name'])){



            $data->resume_id = $this->home_model->get_summary_id_by_user_id($_SESSION['user_id']);

            $data->post_resume = $this->home_model->get_post_resume($data->resume_id->resume_id);

            $data->experience = $this->home_model->get_experience($data->resume_id->resume_id);

            $data->educations = $this->home_model->get_education($data->resume_id->resume_id);




            $this->load->view('templates/header');
            $this->load->view('home/index', $data);
            $this->load->view('templates/footer');

        } else {


//
            $this->load->view('templates/header',$res);
            $this->load->view('_block/home_block/content_block/user_no_signin_block.php');
            $this->load->view('templates/footer');
    }



    }

    public function home(){

        $theHTML  = $this->load->view('_block/home_block/content_block/user_no_signin_block.php', null, true);
        $this->output->set_output($theHTML);
    }




}