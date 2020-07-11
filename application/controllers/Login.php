<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	// load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	//login page
	public function index()
	{
		//validation
		$valid = $this->form_validation;

		$valid->set_rules(
			'username',
			'Username',
			'required|trim|min_length[6]|max_length[20]',
			array(
				'required'		=>	'%s harus diisi',
				'min_length'	=>	'%s minimal 6 karakter',
				'max_length'	=>	'%s maksimal 20 karakter'
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

		if ($valid->run()) {
			$username 		= $this->input->post('username');
			$password 		= $this->input->post('password');
			//compare dg database
			$check_login	= $this->user_model->login($username, $password);
			//kalau data ada yg cocok create session
			if (count($check_login) == 1) {
				$this->session->set_userdata('id_user', $check_login->id_user);
				$this->session->set_userdata('username', $check_login->username);
				$this->session->set_userdata('nama', $check_login->nama);
				$this->session->set_userdata('level', $check_login->level);
				$this->session->set_flashdata('sukses', 'Anda berhasil login');
				redirect(base_url('admin/dashboard'));
			} else {
				//kalau tidak cocok redirect ke halaman login
				$this->session->set_flashdata('sukses', 'Username atau password salah');
				redirect(base_url('login'), 'refresh');
			}
		}
		//end validation

		$data = array('title' => 'Login');
		$this->load->view('login/list', $data, FALSE);
	}


	//logout
	public function logout()
	{
		$this->check_login->logout();
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */