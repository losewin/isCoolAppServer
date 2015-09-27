<?php

class User_model extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get () {

		$query = $this->db->get('users');
		return $query->result();
	}

    public function get_id ( $id ) {

        $query = $this->db->get_where('users', array('userid' => $id));
        return $query->row();
    }

    public function put ( $id, $data ) {
        $this->db->trans_start();

        $this->db->where('userid', $id);
        $this->db->update('users', $data);

        return $this->transaction();
    }

	public function post ( $data ) {

		$this->db->trans_start();

        $this->db->insert('users', $data);

        return $this->transaction();
	}

    private function transaction () {
        if($this->db->trans_status() === FALSE) {
            return FALSE;
        } else {
            $this->db->trans_complete();
            return TRUE;
        }
    }
}
