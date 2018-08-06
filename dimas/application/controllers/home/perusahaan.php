<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('query_model','query');
		
	}
	public function save()
	{
		$nama_perusahaan = $this->input->post("nama_perusahaan");
		$kodep = $this->input->post("kode");
		$arr = explode(" ", $nama_perusahaan);
		$singkatan = "";
		foreach($arr as $kata)
		{
		$singkatan .= strtoupper(substr($kata, 0, -2));
		}
		$kode = $kodep."-".$singkatan;
		
		$data['perusahaanId'] = $kode;
		$data['nama_perusahaan'] = $nama_perusahaan;
		$this->query->simpandata("tbl_perusahaan",$data);
		$arr = array('sukses' => 0, 'pesan' => 'Data telah disimpan');
		$save['save'] = $arr;
		$this->output->set_output(json_encode($save, true));
	}
	public function update()
	{
		$perusahaanId = $this->input->post("perusahaanId");
		$nama_perusahaanedit = $this->input->post("nama_perusahaanedit");
		$data['perusahaanId'] = $perusahaanId;
		$data['nama_perusahaan'] = $nama_perusahaanedit;
		$this->query->update('tbl_perusahaan','perusahaanId',$perusahaanId,$data);
		$arr = array('sukses'=>0,'pesan'=>'Data Perusahaan Berhasil diubah');
		$update['update'] = $arr;
		$this->output->set_output(json_encode($update, TRUE));
	}
	public function deletedata($perusahaanId){
         
		 
		$this->query->delete_by_id('perusahaanId',$perusahaanId,'tbl_perusahaan');
		$arr = array('sukses' => 0, 'pesan' => 'Data telah di hapus'); 
		$this->output->set_output(json_encode($arr, true)); 
    }

}

/* End of file perusahaan.php */
/* Location: ./application/controllers/home/perusahaan.php */