<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//update profile
	public function index()
	{
		$id_user	= $this->session->userdata('id_user');
		$user 		= $this->user_model->detail($id_user);

		$valid = $this->form_validation;
		$valid->set_rules(
			'nama',
			'Nama',
			'required',
			array('required'		=>	'%s harus diisi')
		);

		$valid->set_rules(
			'email',
			'Email',
			'required|valid_email',
			array(
				'required'		=>	'%s harus diisi',
				'valid_email'	=>	'Format %s tidak valid'
			)
		);

		$valid->set_rules(
			'password',
			'Password',
			'required|trim|min_length[6]',
			array(
				'required'		=>	'%s harus diisi',
				'min_length'	=>	'%s minimal 6 karakter'
			)
		);

		if ($valid->run() === FALSE) {
			//end validation

			$data = array(
				'title' 	=> 'Update Profile: ' . $user->nama,
				'user'	=>	$user,
				'isi'	=>	'admin/profile/list'
			);
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		} else {
			$i = $this->input;
			$data = array(
				'id_user'	=>	$id_user,
				'nama'		=>	$i->post('nama'),
				'email'		=>	$i->post('email'),
				'username'	=>	$i->post('username'),
				'password'	=>	md5($i->post('password')),
				'level'		=>	$i->post('level')
			);

			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Profile telah diupdate');
			redirect(base_url('admin/profile'), 'refresh');
		}
	}
}

/* End of file Profile.php */
/* Location: ./application/controllers/admin/Profile.php */