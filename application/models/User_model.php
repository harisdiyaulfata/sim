<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('User_model', 'kode');
	}

	//listing
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->result();
	}

	//detail user
	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//login user
	public function login($username, $password)
	{
		$this->db->select('*');
		$this->db->from('user');
		$this->db->where(array(
			'username'	=>	$username,
			'password'	=>	md5($password)
		));
		$this->db->order_by('id_user');
		$query = $this->db->get();
		return $query->row();
	}

	//tambah data
	public function tambah($data)
	{
		$this->db->insert('user', $data);
	}

	//edit data
	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('user', $data);
	}

	//hapus data
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('user', $data);
	}

	public function buat_kode()
	{

		$this->db->select('RIGHT(user.id_user,3) as kode', FALSE);
		$this->db->order_by('id_user', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('user');      //cek dulu apakah ada sudah ada kode di tabel.    
		if ($query->num_rows() <> 0) {
			//jika kode ternyata sudah ada.      
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			//jika kode belum ada      
			$kode = 1;
		}

		$kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT); // angka 3 menunjukkan jumlah digit angka 0
		$kodejadi = "2020" . $kodemax;    // hasilnya 2020001 dst.
		return $kodejadi;
	}
}

/* End of file User_model.php */
/* Location: ./application/models/User_model.php */