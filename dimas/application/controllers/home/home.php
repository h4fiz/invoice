<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('query_model', 'query');
		$this->load->model('kode');
	}

	public function index()
	{
		$home = "page/content-index";
		$data['menu'] = "Active";
		$this->template->load('Thome',$home,$data);
	}

	public function viewdata()
	{
		$geturl = $this->uri->segment(2);
		switch ($geturl) {
			case 'kategori':
				$data['menukategori'] = "Active";
				$query = "SELECT * FROM tbl_kategori";
				$data['listkategori'] = $this->query->queryin($query)->result();
				$home = "page/data_kategori";
			break;
			case 'perusahaan':
				$data['menuperusahaan'] = "Active";
				$query = "SELECT * FROM tbl_perusahaan";
				$data['listperusahaan'] = $this->query->queryin($query)->result();
				$data['kodemax'] = $this->kode->get_kode_per();
				$home = "page/data_perusahaan";
			break;
			case 'perusahaan_non':
				$data['menuperusahaannon'] = "Active";
				$query = "SELECT * FROM tbl_perusahaan_non";
				$data['listperusahaannon'] = $this->query->queryin($query)->result();
				$data['kode'] = $this->kode->get_kode_pernon();
				$home = "page/data_perusahaan_non";
			break;
		}
		$this->template->load('Thome',$home,$data);
	}

	public function getdata($action,$paramid)
	{
		switch ($action) {
			case 'kategori':
				$query = "SELECT * FROM tbl_kategori WHERE kategoriId = '$paramid'";
				$data = $this->query->queryin($query)->row();
			break;
			case 'perusahaan':
				$query = "SELECT * FROM tbl_perusahaan WHERE perusahaanId = '$paramid'";
				$data = $this->query->queryin($query)->row();
			break;
			case 'perusahaan_non':
				$query = "SELECT * FROM tbl_perusahaan_non WHERE perusahaanNonId = '$paramid'";
				$data = $this->query->queryin($query)->row();
			break;
			
		}
		$arr = array('sukses' => 1, 'data' => $data);
		$this->output->set_output(json_encode($arr, true));
	}
	public function viewinv_ppn()
	{
		
		$data['menuinvoice'] = "Active";
		$query = "SELECT * FROM inv_ppn";
		$data['listinvoice'] = $this->query->queryin($query)->result();
		$data['kode'] = $this->kode->get_kode_invoice();
		$home = "page/data_invoice";
		$this->template->load('Thome',$home,$data);
	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */