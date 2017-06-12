<?php defined('BASEPATH') OR exit('No direct script access allowed');


class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('session'));


        $this->load->helper(array('url'));
        $this->load->helper('captcha');
        $this->load->model('user_model');
        $this->load->model('home_model');
        $this->load->library('captcha');

    }


//    public function test(){
//        $this->load->view('templates/header');
//        $this->load->view('users/signin_success');
//        $this->load->view('templates/footer');
//    }


    public function profile()
    {

        $res = [];
        $user = new stdClass();

        if (isset($this->session->signed_in)){


            $res['status'] = "OK";
            $user_id = $this->session->user_id;
            $get_user = $this->user_model->get_user($user_id);

            $user->profile = $get_user;


            $res['theHTMLResponse'] = $this->load->view('users/profile/profile', $user, true);
            $res['user'] = $user;

        } else {
            $res['status'] = "ERR";
        }


        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html'=> $res)));

    }

    public function edit()
    {

        $update = [];

        $this->load->helper('file');
        $user_id = $this->session->user_id;
        $user = $this->user_model->get_user($user_id);



        $res = [];
        $config['upload_path'] = './img/photos/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['max_filename'] = '15';

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_name', 'Username', 'trim|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('user_surname', 'Surname', 'trim|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('user_country', 'Country', 'trim|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('user_city', 'City', 'trim|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('user_address', 'Address', 'trim|min_length[4]|max_length[200]');
        $this->form_validation->set_rules('user_date_of_birth', 'User date of birth', 'trim');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|is_unique[rsummary_users.user_email]');
        $this->form_validation->set_rules('user_postcode', 'Postcode', 'trim');
        $this->form_validation->set_rules('user_pass', 'Current Password', 'trim');
        $this->form_validation->set_rules('password', 'New Password', 'trim|min_length[6]|matches[password_confirm]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|min_length[6]');

            if ($this->input->post['userfile'] != ''){
                $this->form_validation->set_rules('userfile', '', 'callback_file_check');

            }


        $this->load->library('upload' ,$config);



        if ($this->form_validation->run() === false)
        {
            $res['status'] = 'err';
            $message = [];

            foreach ($this->form_validation->error_array() as $mess){
                $message[] = $mess;
            }

            $res['error_valid'] = $message[0];

        }
        else
        {



            if ($this->upload->do_upload() === true){
                $user_photo = array('upload_data' => $this->upload->data("file_name"));
                if (file_exists("./img/photos/" . $user->user_photo)) {
                    unlink("./img/photos/" . $user->user_photo);

                    $update['user_photo'] = $user_photo['upload_data'];
                } else {

                    $update['user_photo'] = $user_photo['upload_data'];
                }


                $res["user_photo_update"] = "Фото обновлено!";
            }



            if ($this->input->post('user_name') != ''){
                $update['user_name'] = $this->input->post('user_name');
                $res["username_update"] = "Имя обновлено!";
            }

            if ($this->input->post('user_surname') != ''){
                $update['user_surname'] = $this->input->post('user_surname');
                $res["user_surname"] = "фамилия обновлена!";
            }

            if ($this->input->post('user_country') != ''){
                $update['user_country'] = $this->input->post('user_country');
                $res["user_country"] = "Страна обновлена!";
            }
            if ($this->input->post('user_city') != ''){
                $update['user_city'] = $this->input->post('user_city');
                $res["user_city"] = "Город обновлен!";
            }

            if ($this->input->post('user_address') != ''){
                $update['user_address'] = $this->input->post('user_address');
                $res["user_address"] = "Адрес обновлен!";
            }

            if ($this->input->post('user_date_of_birth') != ''){
                $update['user_date_of_birth'] = $this->input->post('user_date_of_birth');
                $res["user_date_of_birth"] = "Дата рождения обновлена!";
            }
            if ($this->input->post('user_email') != ''){
                $update['user_email'] = $this->input->post('user_email');
                $res["user_email"] = "Электронная почта обновлена!";
            }

            if ($this->input->post('user_postcode') != ''){
                $update['user_postcode'] = $this->input->post('user_postcode');
                $res["user_postcode"] = "Индекс обновлен!";
            }

            if ($this->input->post('user_pass') != ''){
                $update['user_pass'] = $this->input->post('user_pass');
                $res["user_pass"] = "Пароль обновлен!";
            }


            if ($this->user_model->update_user($user_id, $update)){

                $res['status'] = "ok";

                $user = $this->user_model->get_user($user_id);
                $user->profile = $user;

                $res['theHTMLResponse'] = $this->load->view('users/profile/profile', $user, true);

            }

        }


        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html'=> $res)));

    }

    public function delete($username = false)
    {

        $user = new stdClass();
        $res  = [];


        if ($username !== false || isset($_SESSION['user_name']) || $username == $_SESSION['user_name'] && isset($_SESSION['signed_in'])){

            $user->id = $this->session->user_id;


            if ($this->user_model->delete_user($user->id)){

                foreach ($_SESSION as $key => $value){
                    unset($_SESSION[$key]);
                }

                $res['message'] = "Ваш профиль успешно удален!";
                $res['status'] = "OK";

                $res['theHTMLHeaderResponse'] = $this->load->view('_block/home_block/content_block/header_block', null, true);
                $res['theHTMLResponse'] = $this->load->view('_block/home_block/content_block/user_no_signin_block', null, true);

            } else {
                $res['message'] = "Попробуйте еще раз";
            }


        } else {
            $res = "Вы не прошли авторизацию!";
        }


        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html'=> $res)));

    }




    public function file_check($str){
        $allowed_mime_type_arr = array('application/pdf','image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['userfile']['name']);
        if(isset($_FILES['userfile']['name']) && $_FILES['userfile']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png file.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a file to upload.');
            return false;
        }
    }




    public function register()
    {


        $res = [];



        $captcha_form = $this->config->item('captcha_form');
        $data['captcha_form'] = $captcha_form;
        if ($captcha_form) {
            $data['captcha_html'] = $this->session->flashdata('captcha_image') != NULL ? $this->session->flashdata('captcha_image') : $this->captcha->_create_captcha();;
        }


        $this->load->helper('form');
        $this->load->library('form_validation');



                $config = array(
                    array(
                        'field'   => 'username',
                        'label'   => 'Username',
                        'rules'   => 'trim|required|min_length[4]|max_length[200]'
                    ),
                    array(
                        'field'   => 'sure_name',
                        'label'   => 'Sure Name',
                        'rules'   => 'trim|required|min_length[4]|max_length[200]'
                    ),
                    array(
                        'field'   => 'user_email',
                        'label'   => 'Email',
                        'rules'   => 'trim|required|valid_email|is_unique[rsummary_users.user_email]'
                    ),
                    array(
                        'field'   => 'user_password',
                        'label'   => 'Password',
                        'rules'   => 'trim|required|min_length[6]'
                    ),
                    array(
                        'field'   => 'user_pass_check',
                        'label'   => 'Confirm Password',
                        'rules'   => 'trim|required|min_length[6]|matches[user_password]'
                    ),
                    array(
                        'field'   => 'not_robot',
                        'label'   => 'Captcha',
                        'rules'   => 'required|callback__check_captcha'
                    ),
                    array(
                        'field'   => 'user_country',
                        'label'   => 'Country',
                        'rules'   => 'trim|min_length[4]|max_length[20]'
                    ),
                    array(
                        'field'   => 'user_city',
                        'label'   => 'City',
                        'rules'   => 'trim|min_length[4]|max_length[20]'
                    ),
                    array(
                        'field'   => 'user_address',
                        'label'   => 'Address',
                        'rules'   => 'trim|min_length[4]|max_length[20]'
                    ),
                    array(
                        'field'   => 'user_date_of_birth',
                        'label'   => 'User date of birth',
                        'rules'   => ''
                    ),
                    array(
                        'field'   => 'user_postcode',
                        'label'   => 'User postcode',
                        'rules'   => 'numeric'
                    ),


                );

                $this->form_validation->set_rules($config);



                if ($this->form_validation->run() === false) {


                    $res['status'] = "ERR";
                    $res['error_valid'] = $this->form_validation->error_array();

                }else{



                    $user_name = $this->input->post('username');
                    $user_email = $this->input->post('user_email');
                    $user_pass = $this->input->post('user_password');
                    $user_surname = $this->input->post('sure_name');
                    $user_country = $this->input->post('user_country');
                    $user_city = $this->input->post('user_city');
                    $user_address = $this->input->post('user_address');
                    $user_postcode = $this->input->post('user_postcode');
                    $user_date_of_birth = $this->input->post('user_date_of_birth');

                    $option = $user_email.'.png';

                    if (($this->user_model->create_user($user_name, $user_email, $user_surname, $user_pass, $user_country, $user_city,$user_address, $user_postcode, $user_date_of_birth, $option))){

                        file_put_contents("./img/photos/".$user_email.".png",'');



                        $res['captcha_html'] = $this->captcha->_create_captcha();
                        $res['status'] = "OK";
                        $res['theHTMLResponse'] = $this->load->view('users/signin_success', null, true);

                    }
                }

                       $this->output->set_content_type('application/json');
                       $this->output->set_output(json_encode(array('html'=> $res)));



            }





    public function update_captcha()
    {

        $data['captcha_html'] = $this->captcha->_create_captcha();;

        $theHTML  = $this->load->view('users/signup',$data, true);
        $this->output->set_output($theHTML);


    }


    public function _check_captcha($code)
    {
       return $this->captcha->_check_captcha($code);
    }

    public function ajaxRegister()
    {

        $captcha_form = $this->config->item('captcha_form');
        $data['captcha_form'] = $captcha_form;
        if ($captcha_form) {

            $data['captcha_html'] = $this->session->flashdata('captcha_image') != NULL ? $this->session->flashdata('captcha_image') : $this->captcha->_create_captcha();
        }

        $theHTML  = $this->load->view('users/signup',$data, true);
        $this->output->set_output($theHTML);

    }



    public function signIn()
    {
        $res= [];




        $data = new stdClass();


        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('user_mail','Email','required');
        $this->form_validation->set_rules('user_pass','Password','required');
        $this->form_validation->set_rules('not_robot','Not robot','required|callback__check_captcha');

        if($this->form_validation->run() == false)
        {

            $res['status'] = "ERR";

            $res['error_valid'] = $this->form_validation->error_array();




        } else {
            $user_mail = $this->input->post('user_mail');
            $password = $this->input->post('user_pass');

            if ($this->user_model->user_sign_in($user_mail, $password))
            {

                $user_id = $this->user_model->get_user_id_from_user_mail($user_mail);
                $user = $this->user_model->get_user($user_id);

                $_SESSION['signed_in'] = (bool)true;
                $_SESSION['user_id'] = (int) $user->user_id;
                $_SESSION['user_name'] = (string) $user->user_name;
                $_SESSION['user_email'] = (string) $user->user_email;






                $data->resume_id = $this->home_model->get_summary_id_by_user_id($_SESSION['user_id']);

                $data->post_resume = $this->home_model->get_post_resume($data->resume_id->resume_id);

                $data->experience = $this->home_model->get_experience($data->resume_id->resume_id);

                $data->educations = $this->home_model->get_education($data->resume_id->resume_id);

                $res['captcha_html'] = $this->captcha->_create_captcha();

                $res['status'] = "OK";
                $res['theHTMLResponse'] = $this->load->view('home/index', $data, true);
                $res['theHTMLHeaderResponse'] = $this->load->view('_block/home_block/content_block/header_block', null, true);



            }

        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html'=> $res)));


    }

    public function signOut()
    {

        $res = [];

        if (isset($_SESSION['signed_in']) && $_SESSION['signed_in'] === true)
        {
            foreach ($_SESSION as $key => $value){
                unset($_SESSION[$key]);
            }
            $res['status'] = "OK";
            $res['theHTMLResponse'] = $this->load->view('_block/home_block/content_block/user_no_signin_block', null, true);
            $res['theHTMLHeaderResponse'] = $this->load->view('_block/home_block/content_block/header_block', null, true);
        }

        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode(array('html'=> $res)));


    }


}