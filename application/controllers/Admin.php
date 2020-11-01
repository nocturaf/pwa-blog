<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{

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
        $newBlogData = array(
            'title' => $title,
            'content' => $content,
            'created_at' => $currentTimestamp
        );
        $createBlog = $this->db->insert('blogs', $newBlogData);
        if ($createBlog) {
            $this->sendNotification(array(
                'title' => 'PWA Blogs',
                'body' => 'New article published - '.$newBlogData['title'],
                'icon' => 'http://localhost:5000/pwa-blog/public/images/pwb-192-inverse.png',
                'badge' => 'http://localhost:5000/pwa-blog/public/images/pwb-192-inverse.png'
            ));
            redirect('admin/index');
        }
    }

    public function deletePost($blogId)
    {
        $this->db->where('id', $blogId);
        $deletePost = $this->db->delete('blogs');
        if ($deletePost) {
            redirect('admin/index');
        }
    }

    private function sendNotification($notificationData) {
        $fields = array(
            'data' => $notificationData,
            'to' => "cr6nf0aiSxXrm2xBhw70Yr:APA91bGu05FoU1bk35JIiIGROJS9dNPfwh5VmzJf1mx73rA7iUDajpNpWLtOLG-Rnw9dMMNLxdav3z3CWeUDPnxPbcgdETDJzQok85pgrlEWKSEpapzUGbgc95ZKfRadgFvAS2loULl7"
        );
        $headers = array(
            'Authorization: key=AAAAOpBx0LM:APA91bGR9UMBWMWTfNWfM0E94nmjJD_VY48h4GH-Isb4cY3-fWUcAyX7tIjrv7kPSkeG3Dt-bE-C93M8rcuQkSYzJFCuvXXv1_-NvounH5ZgP4mCneuoDEKXddpikNTWClLvvOFnRtmz', 'Content-Type: application/json'
        );
        $url = 'https://fcm.googleapis.com/fcm/send';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_exec($ch);
    }

}
