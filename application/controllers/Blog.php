<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function index()
    {
        // get blog post from db
        $this->db->order_by('created_at', 'DESC');
        $blogList = $this->db->get('blogs')->result_array();
        $viewData['blog_list'] = $blogList;
        $this->load->view('blog/index', $viewData);
    }

}
