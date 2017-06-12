<?php


class Home_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();

    }

    public function get_summary_id_by_user_id($user_id)
    {

        $this->db->select(' post_resume.resume_id,');

        $this->db->from('rsummary_users');
        $this->db->join('post_resume', 'rsummary_users.user_id = post_resume.rsummary_user_id', 'left' );
        $this->db->where("rsummary_users.user_id = $user_id");


        return $this->db->get()->row();


    }


    public function get_post_resume($resume_id)
    {

        $this->db->select('rsummary_users.user_name,
                          rsummary_users.user_id,
                            rsummary_users.user_email,
                            rsummary_users.user_date,
                            rsummary_users.user_surname,
                            post_resume.job_title,
                            post_resume.phone_number,
                            post_resume.resume_description,
                            post_resume.interesting_research');
        $this->db->from('rsummary_users');
        $this->db->join('post_resume', 'rsummary_users.user_id = post_resume.rsummary_user_id', 'left');
        $this->db->where('post_resume.resume_id ='. $resume_id);
        return $this->db->get()->row();
    }


    public function get_experience($resume_id)
    {
        $this->db->select('
                        previous_experience.experience_title,
                        previous_experience.experience_description
        ');
        $this->db->from('post_resume');
        $this->db->join('previous_experience', 'post_resume.resume_id = previous_experience.post_resume_id', 'left');
        $this->db->where('post_resume.resume_id ='. $resume_id);
        return $this->db->get()->result();
    }

    public function get_education($resume_id)
    {
        $this->db->select('
                        education.academic_degree,
                        education.edition,
                        education.place_of_study,
        ');
        $this->db->from('post_resume');
        $this->db->join('education', 'post_resume.resume_id = education.post_resume_id', 'left');
        $this->db->where('post_resume.resume_id ='. $resume_id);
        return $this->db->get()->result();
    }

}