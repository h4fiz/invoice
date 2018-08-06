<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_non extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('query_model','query');
	}
	public function save()
	{
		$nama_perusahaan_non = $this->input->post("nama_perusahaan_non");
		$kodenon = $this->input->post("kodenon");
		$arr = explode(" ", $nama_perusahaan_non);
		$singkatan = "";
		foreach($arr as $kata)
		{
		$singkatan .= strtoupper(substr($kata, 0, -2));
		}
		$kode = $kodenon."-".$singkatan;	
		$data['perusahaanNonId'] = $kode;
		$data['nama_perusahaan_non'] = $nama_perusahaan_non;
		$this->query->simpandata("tbl_perusahaan_non",$data);
		$arr = array('sukses' => 0, 'pesan' => 'Data telah disimpan');
		$save['save'] = $arr;
		$this->output->set_output(json_encode($save, true));
	}
	public function update()
	{
		$perusahaanNonId = $this->input->post("perusahaanNonId");
		$nama_perusahaan_nonedit = $this->input->post("nama_perusahaan_nonedit");
		$data['perusahaanNonId'] = $perusahaanNonId;
		$data['nama_perusahaan_non'] = $nama_perusahaan_nonedit;
		$this->query->update('tbl_perusahaan_non','perusahaanNonId',$perusahaanNonId,$data);
		$arr = array('sukses'=>0,'pesan'=>'Data Perusahaan Berhasil diubah');
		$update['update'] = $arr;
		$this->output->set_output(json_encode($update, TRUE));
	}
	public function deletedata($perusahaanNonId){
         
		 
		$this->query->delete_by_id('perusahaanNonId',$perusahaanNonId,'tbl_perusahaan_non');
		$arr = array('sukses' => 0, 'pesan' => 'Data telah di hapus'); 
		$this->output->set_output(json_encode($arr, true)); 
    }

}

/* End of file perusahaan_non.php */
/* Location: ./application/controllers/home/perusahaan_non.php */