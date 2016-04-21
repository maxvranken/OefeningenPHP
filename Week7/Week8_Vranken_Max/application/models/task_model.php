<?php


class Task_model extends CI_Model
{

    public function __construct()
    {

        $this->load->database();
    }

    public function Save($data)
    {

        $this->db->insert('mvctodo', $data);
    }

    public function GetAll()
    {

        $query = $this->db->get('mvctodo');
        return $query;
    }
}