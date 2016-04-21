<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller
{

    public function all()
    {
        $this->load->database();
        $this->load->model('task_model');
        $data['mvctodo'] = $this->task_model->GetAll();
        $this->load->view('task/all', $data);
    }

    public function add()
    {

        $viewdata['feedback'] = "";

        $this->load->library('form_validation');
        $this->form_validation->set_rules('todo_name', 'Todo', 'required');
        if ($this->form_validation->run() === FALSE) {
            echo "form_validation returns false";

        } else {
            $this->load->model('task_model');
            $data['todo_name'] = $this->input->post('todo_name');
            $this->task_model->Save($data);
            $viewdata['feedback'] = "Todo added!";
            echo "added!";
        }
        $this->load->view('task/add', $viewdata);
    }
}