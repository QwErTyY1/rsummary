<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: User
 * Date: 10.06.2017
 * Time: 13:39
 */
class Captcha
{

    protected $CI;

    public function __construct()
    {

        $this->CI =& get_instance();

    }

    public function _create_captcha()
    {



        $this->CI->load->helper('string');

        $string =  random_string('numeric', 5);

        $cap_config = array(
            'word'            => $string,
            'img_path'        => './'.$this->CI->config->item('captcha_path'),
            'img_url'         => base_url().$this->CI->config->item('captcha_path'),
            'font_path' => './' . $this->CI->config->item('captcha_fonts_path'),
            'font_size' => $this->CI->config->item('captcha_font_size'),
            'img_width' => $this->CI->config->item('captcha_width'),
            'img_height' => $this->CI->config->item('captcha_height'),
            'show_grid' => $this->CI->config->item('captcha_grid'),
            'expiration' => $this->CI->config->item('captcha_expire'),
            'ip_address' => $this->CI->input->ip_address(),


            'colors' => array(
                'background' => array(255, 255, 255),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(255, 40, 40)
            )
        );

        $cap = create_captcha($cap_config);
        // Save captcha params in session
        $this->CI->session->set_flashdata(array(
            'captcha_word' => $cap['word'],
            'captcha_image' => $cap['image']
        ));
        return $cap['image'];
    }

    public function _check_captcha($code) {

        $this->CI->load->helper('captcha');

        $this->CI->load->helper('form');
        $this->CI->load->library('form_validation');


        $word = $this->CI->session->flashdata('captcha_word');
        if (($this->CI->config->item('captcha_case_sensitive') && $code != $word) ||
            strtolower($code) != strtolower($word)) {
            $this->CI->form_validation->set_message('_check_captcha', 'Captcha is incorrect');
            return FALSE;
        }
        return TRUE;
    }

}