<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
	    // get blog post from db
        $this->db->order_by('created_at', 'DESC');
        $blogList = $this->db->get('blogs')->result_array();
        $viewData['blog_list'] = $blogList;
		$this->load->view('admin/index', $viewData);
	}

	public function login()
    {
        $this->load->view('admin/login');
    }

    public function logout()
    {
        unset($_SESSION['isLoggedIn']);
        session_destroy();
        redirect('admin/login');
    }

    public function validateLogin()
    {
        $email = $this->input->post('user_email');
        $password = md5($this->input->post('user_password'));

        // check db
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $isExist = $this->db->get('users');
        if ($isExist->num_rows()) {
            session_start();
            $_SESSION['isLoggedIn'] = true;
            redirect('admin/index');
        } else {
            $_SESSION['loginError'] = true;
            redirect('admin/login');
        }
    }

	public function createPost()
    {
        $title = $this->input->post('blog_title');
        $content = $this->input->post('blog_content');
        $currentTimestamp = date('Y-m-d H:i:s');
        $createBlog = $this->db->insert('blogs', array(
            'title' => $title,
            'content' => $content,
            'created_at' => $currentTimestamp
        ));
        if($createBlog) {
            redirect('admin/index');
        }
    }

    public function deletePost($blogId)
    {
        $this->db->where('id', $blogId);
        $deletePost = $this->db->delete('blogs');
        if($deletePost) {
            redirect('admin/index');
        }
    }

}
