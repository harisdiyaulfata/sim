<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

	//halaman dasboard
	public function index()
	{
		$data = array(
			'title'			=> 'Dashboard Administrator',
			'isi'			=> 'admin/dashboard/list'
		);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}

/* End of file Dasboard.php */
/* Location: ./application/controllers/admin/Dashboard.php */