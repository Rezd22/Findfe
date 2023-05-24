<?php
defined('BASEPATH') or exit('No direct script access allowed');
// File: application/controllers/Comment.php
class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Comment_model');
    }

    public function index()
    {
        $data['comments'] = $this->Comment_model->get_comments();
        $this->load->view('front/partials/header');
        $this->load->view('front/comment', $data);
        $this->load->view('front/partials/footer');
    }

    public function add_comment()
    {
        $content = $this->input->post('content');
        $this->Comment_model->add_comment($content);
        redirect('comment');
    }

    public function add_reply()
    {
        $comment_id = $this->input->post('comment_id');
        $content = $this->input->post('content');
        $this->Comment_model->add_reply($comment_id, $content);
        redirect('comment');
    }
    public function delete_comment()
    {
        $comment_id = $this->input->post('comment_id');

        // Hapus komentar dari database
        $this->Comment_model->delete_comment($comment_id);

        // Kirim respon JSON berhasil
        $response = array('success' => true);
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}
