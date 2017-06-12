<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function create_user($username, $email, $sure_name, $password, $user_country, $user_city,$user_address, $user_postcode, $user_date_of_birth, $user_photo)
    {

        $data = [
            'user_name' => $username,
            'user_surname' => $sure_name,
            'user_pass' => $this->hash_password($password),
            'user_email' => $email,
            'user_country' => $user_country,
            'user_city' => $user_city,
            'user_address' => $user_address,
            'user_postcode' => $user_postcode,
            'user_date_of_birth' => $user_date_of_birth,
            'user_photo' => $user_photo,
            'user_date' => date('Y-m-j H:i:s'),
        ];

        $this->db->insert('rsummary_users', $data);
        return true;
    }

    public function delete_user($user_id)
    {
        return $this->db->delete('rsummary_users', array('user_id' => $user_id));

    }


    public function get_user($user_id)
    {
        $this->db->from('rsummary_users');
        $this->db->where('user_id', $user_id);
        return $this->db->get()->row();

    }


  public function insertPhotoName($user_id, $user_photo)
  {
      $data = [
          "user_photo", $user_photo
      ];

//        $this->db->set("user_photo", $user_photo);
        $this->db->where("user_id", $user_id);
        $this->db->insert("rsummary_users",$data);


  }

    public function update_user($user_id, $update_data)
    {


        if (array_key_exists('password', $update_data)) {
            $update_data['password'] = $this->hash_password($update_data['password']);
        }

            if (!empty($update_data)) {

                $this->db->where('user_id', $user_id);
                return $this->db->update('rsummary_users', $update_data);

            }

        return false;
    }

    public function get_user_id_from_user_mail($user_mail)
    {

        $this->db->select('user_id');
        $this->db->from('rsummary_users');
        $this->db->where('user_email', $user_mail);

        return $this->db->get()->row('user_id');

    }

    public function user_sign_in($user_mail, $password)
    {

        $this->db->select('user_pass');
        $this->db->from('rsummary_users');
        $this->db->where('user_email', $user_mail);
        $hash = $this->db->get()->row('user_pass');
//        return $hash;
        return $this->verify_password_hash($password, $hash);

    }






    private function hash_password($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }


    private function verify_password_hash($password, $hash)
    {
        return password_verify($password, $hash);
    }

}