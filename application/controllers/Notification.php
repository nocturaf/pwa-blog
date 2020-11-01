<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {

    public function index()
    {
        // get blog post from db
        $this->db->order_by('created_at', 'DESC');
        $blogList = $this->db->get('blogs')->result_array();
        $viewData['blog_list'] = $blogList;
        $this->load->view('blog/index', $viewData);
    }

    public function saveNewToken() {
        $token = $this->input->post('token');
        $currentTimestamp = date('Y-m-d H:i:s');
        $insert = $this->db->insert('notification_token', array(
            'token' => $token,
            'created_at' => $currentTimestamp
        ));
        if($insert) {
            echo json_encode(array(
                'code' => 200,
                'status' => true,
                'message' => "New token inserted"
            ));
        } else {
            echo json_encode(array(
                'code' => 200,
                'status' => false,
                'message' => "Failed to insert new token"
            ));
        }
    }

}
