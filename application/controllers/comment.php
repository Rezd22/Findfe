<?php
class Comment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        // Get all comments
        $comments = $this->comment_model->get_all_comments();

        // Load view with comments data
        $this->_load_view('front/comment', $comments);
    }

    public function create()
    {
        // Validation for form input
        $this->form_validation->set_rules('content', 'Content', 'required');

        if ($this->form_validation->run() == false) {
            // Display error message if validation fails
            $this->session->set_flashdata('error', validation_errors());
        } else {
            // Get comment data from form
            $data = array(
                'post_id' => $this->input->post('post_id'),
                'user_id' => $this->session->userdata('user_id'),
                'content' => $this->input->post('content'),
                'created_at' => date('Y-m-d H:i:s')
            );

            // Save comment to database
            $comment_id = $this->comment_model->create_comment($data);

            if ($comment_id) {
                $this->session->set_flashdata('success', 'Comment added successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to add comment.');
            }
        }

        // Redirect to previous page
        redirect($this->input->server('HTTP_REFERER'));
    }

    public function show($post_id)
    {
        // Validation for post ID
        if (!$post_id) {
            show_404();
        }

        // Get comments by post ID
        $comments = $this->comment_model->get_comments_by_post($post_id);

        // Load view with comments data
        $this->_load_view('front/comment', $comments);
    }

    // Private function to load a view with data
    private function _load_view($view, $data)
    {
        $this->load->view('front/partials/header');
        $this->load->view($view, $data);
        $this->load->view('front/partials/footer');
    }
}
