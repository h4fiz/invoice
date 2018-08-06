<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kode extends CI_Model {

	public function get_kode_per()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(perusahaanId,3)) AS kd_max FROM tbl_perusahaan");
        	$kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%03s", $tmp);
	            }
	        }else{
	            $kd = "001";
	        }
	        return $kd;
		}
		public function get_kode_pernon()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(perusahaanNonId,3)) AS kd_max FROM tbl_perusahaan_non");
        	$kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%03s", $tmp);
	            }
	        }else{
	            $kd = "001";
	        }
	        $kode_jadi= "N-".$kd;
	        return $kode_jadi;
		}

		public function get_kode_invoice()
		{
			$q = $this->db->query("SELECT MAX(RIGHT(inv_id,5)) AS kd_max FROM inv_ppn WHERE DATE(tgl_inv)=CURDATE()");
        	$kd = "";
	        if($q->num_rows()>0){
	            foreach($q->result() as $k){
	                $tmp = ((int)$k->kd_max)+1;
	                $kd = sprintf("%05s", $tmp);
	            }
	        }else{
	            $kd = "00001";
	        }
	       	date_default_timezone_set('Asia/Jakarta');
        	return date('my')."-".$kd;
		}
	}
			

/* End of file Kode.php */
/* Location: ./application/models/Kode.php */
