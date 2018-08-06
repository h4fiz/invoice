<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('query_model', 'query');
	}

	public function save()
	{
		$nama_kategori = $this->input->post('nama_kategori', TRUE);
		$vat = $this->input->post('vat',TRUE);
		
		$data['nama_kategori'] = $nama_kategori;
		$data['VAT'] = $vat;
		$this->query->simpandata('tbl_kategori',$data);
		$arr = array('sukses' => 0, 'pesan' => 'Data telah disimpan');
		$save['save'] = $arr;
		$this->output->set_output(json_encode($save, true));
		 
	}

	public function update()
	{
		$kategoriId = $this->input->post('kategoriId', TRUE);
		$nama_kategori = $this->input->post('nama_kategoriedit', TRUE);
		$vat = $this->input->post('vatedit',TRUE);

		$data['kategoriId'] = $kategoriId;
		$data['nama_kategori'] = $nama_kategori;
		$data['VAT'] = $vat;
		$this->query-> update("tbl_kategori","kategoriId",$kategoriId,$data);
					  
		$arr = array('sukses' => 0, 'pesan' => 'Perubahan data telah disimpan ');
		
		$update['update'] = $arr;
		$this->output->set_output(json_encode($update, true));

	}
	public function deletedata($kategoriId){
         
		 
		$this->query->delete_by_id('kategoriId',$kategoriId,'tbl_kategori');
		$arr = array('sukses' => 0, 'pesan' => 'Data telah di hapus'); 
		$this->output->set_output(json_encode($arr, true)); 
    }

}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */