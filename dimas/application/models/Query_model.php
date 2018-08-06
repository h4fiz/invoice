<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Query_model extends CI_Model {
	  
	public function queryin($keterangan) { 
		
		return $this->db->query("$keterangan");
	} 	
	// end set variable colum for datatables
	// CRUD
	public function simpandata($table ="",$data=array()){
		$this->db->trans_start();
		$this->db->insert($table,$data); 
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
		   $this->db->trans_rollback();
		   return false;
		}else{
		   $this->db->trans_complete();
		   return true ;
		}
	}
	public function update($table,$field,$id,$data){ 
		$this->db->trans_start();
		$where = "$field ='$id'"; 
		$this->db->update($table, $data, $where); 
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
		   $this->db->trans_rollback();
		   return false;
		}else{
		   $this->db->trans_complete();
		   return true ;
		}
	}
	public function updatetotalbuku($idbuku){ 
		$this->db->trans_start();
		$this->db->query("update buku set totalbuku = totalbuku+1  where idbuku ='$idbuku'");
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
		   $this->db->trans_rollback();
		   return false;
		}else{
		   $this->db->trans_complete();
		   return true ;
		}
	}
	public function delete_by_id($field,$id,$tb){
		$this->db->trans_start();
		$this->db->where($field, $id);
		$this->db->delete($tb);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){
		   $this->db->trans_rollback();
		   return false;
		}else{
		   $this->db->trans_complete();
		   return true ;
		}
	}
	//=== 
	public function get_wherestr($wherearray=array()) {
		$sWhere = "";
		if ((is_array($wherearray))&&(count($wherearray)>0)) {
			$sWhere = "WHERE ";
			foreach($wherearray as $key => $val)
			{ 
				$sWhere .= $key." = '".$val ."' AND " ;
			} 
			$sWhere = substr_replace( $sWhere, "", -4 );
		} else {
			$sWhere = "";
		}
		return $sWhere ;
	}
	public function get_likestr($wherearray=array()) {
		$sWhere = "";
		if ((is_array($wherearray))&&(count($wherearray)>0)) {
			$sWhere = "WHERE ";
			foreach($wherearray as $key => $val)
			{ 
				$sWhere .= $key." LIKE '%".$val."%' OR ";
			} 
			$sWhere = substr_replace( $sWhere, "", -3 );
		} else {
			$sWhere = "";
		}
		return $sWhere ;
	}
	public function get_orderstr($orderarray=array(),$param){

		if ((is_array($orderarray))&&(count($orderarray)>0)) {

			$desc_or_asc =($param == "asc") ? "asc" : "desc";

			$sOrder  = "ORDER BY  "; 
			foreach($orderarray as $val)
			{ 
				$sOrder .= $val ." , " ;
			}   
			$sOrder = substr_replace( $sOrder, "", -2 );
			$sOrder .= $desc_or_asc;

		} else {
			$sOrder = "";
		}
		return $sOrder ;
	}
	public function getdata($table,$wherearray=array(),$likearray=array(),$orderarray=array(),$param,$limit){
		 
		$where ="" ;
		$like ="" ; 
		$where = (count($wherearray) > 0) ? $this->get_wherestr($wherearray) : "" ;
		$like = (count($likearray) > 0) ? $this->get_likestr($likearray) : "" ; 
		$order = (count($orderarray) > 0) ? $this->get_orderstr($orderarray,$param) : "" ;

		return $this->db->query("SELECT * FROM $table $where $like $order $limit");
	} 
	//=== query for index === 
	public function count($table) {
		$gettotal =  $this->db->query("SELECT count(*) as total FROM $table")->row();
		return $gettotal; 
	}
	public function totalpeminjaman(){   
		return $this->db->query("select count(*) as jumlah from peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam WHERE detail_peminjaman.status ='Pinjam'");
	}
	public function jumlahpeminjaman($param){    
		return $this->db->query("select count(*) as jumlah from peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam WHERE peminjaman.tanggal_pinjam ='$param' AND detail_peminjaman.status ='Pinjam'");
	} 
	public function pengembalianbuku($param){   
		
		return $this->db->query("select count(*) as jumlah from peminjaman INNER JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam WHERE detail_peminjaman.status ='Kembali' AND kondisi ='$param'");
	}
	// buat ambil getdata buku
	public function get_by_idbuku($idbuku){  
		return $this->db->query("SELECT * FROM subject INNER JOIN buku ON subject.idsubject = buku.idsubject 
		INNER JOIN penerbit ON buku.idpenerbit = penerbit.idpenerbit 
		INNER JOIN pengarang ON buku.idpengarang = pengarang.idpengarang 
		INNER JOIN asal ON buku.idasal = asal.idasal 
		INNER JOIN bahasa ON buku.idbahasa = bahasa.idbahasa 
		INNER JOIN jenisbuku ON buku.idjenisbuku = jenisbuku.idjenisbuku 
		WHERE buku.idbuku='$idbuku' AND buku.delete_date ='0000-00-00 00:00:00'");
	}
	public function get_by_idbukudetial($idbukudetail){ 

		return $this->db->query("SELECT * FROM buku INNER JOIN bukudetail ON buku.idbuku = bukudetail.idbuku INNER JOIN perolehan ON bukudetail.idperolehan = perolehan.idperolehan WHERE bukudetail.idbukudetail='$idbukudetail' AND bukudetail.date_delete ='0000-00-00 00:00:00'");
	} 
	public function getdatabukupinjam($idpinjam){
		
		return $this->db->query("SELECT peminjaman.id_pinjam,detail_peminjaman.id_detailpinjam,detail_peminjaman.idbukudetail,peminjaman.tanggal_pinjam,peminjaman.tanggal_kembali,peminjaman.idanggota,detail_peminjaman.status as status_pinjam,buku.judul,detail_peminjaman.tanggal_haruskembali,detail_peminjaman.tanggal_kembalibuku,datediff(current_date(), detail_peminjaman.tanggal_haruskembali) as selisih FROM anggota INNER JOIN peminjaman ON anggota.idanggota = peminjaman.idanggota INNER JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam INNER JOIN bukudetail ON detail_peminjaman.idbukudetail = bukudetail.idbukudetail INNER JOIN buku ON bukudetail.idbuku = buku.idbuku WHERE detail_peminjaman.id_pinjam='$idpinjam' AND detail_peminjaman.status='Pinjam'"); 
	}	
	public function cekjumlahpinjam($id){
		return $this->db->query("SELECT * FROM `peminjaman` INNER JOIN detail_peminjaman ON peminjaman.id_pinjam = detail_peminjaman.id_pinjam WHERE detail_peminjaman.status ='Pinjam' AND peminjaman.id_pinjam='$id'");
	}
	public function lates_blog(){ 
		return $this->db->query("SELECT blog.idblog,blog.tanggalinput,anggota.nama as name,blog.judul,blog.statusblog,blog.isi,blog.photo from anggota 
		INNER JOIN blog ON anggota.idanggota = blog.idanggota  
		UNION 
		SELECT blog.idblog,blog.tanggalinput,user.username as name,blog.judul,blog.statusblog,blog.isi,blog.photo from user 
		INNER JOIN blog ON user.iduser = blog.iduser where statusblog='Active' ORDER BY idblog DESC LIMIT 4");
	}
	public function viewblog(){ 
		return $this->db->query("SELECT blog.idblog,blog.tanggalinput,anggota.nama as name,blog.judul,blog.statusblog,blog.isi,blog.photo from anggota 
		INNER JOIN blog ON anggota.idanggota = blog.idanggota  
		UNION 
		SELECT blog.idblog,blog.tanggalinput,user.username as name,blog.judul,blog.statusblog,blog.isi,blog.photo from user 
		INNER JOIN blog ON user.iduser = blog.iduser where statusblog='Active'");
	}
	public function getviewblog($paramid){ 
		return $this->db->query("SELECT blog.idblog,blog.tanggalinput,anggota.nama as name,blog.judul,blog.statusblog,blog.isi,blog.photo from anggota 
		INNER JOIN blog ON anggota.idanggota = blog.idanggota where idblog = $paramid AND statusblog='Active'
		UNION 
		SELECT blog.idblog,blog.tanggalinput,user.username as name,blog.judul,blog.statusblog,blog.isi,blog.photo from user 
		INNER JOIN blog ON user.iduser = blog.iduser where idblog = $paramid AND statusblog='Active'");
	}
	public function getRows($per_page, $start){
  
   
		$query_ = "SELECT blog.idblog,blog.tanggalinput,anggota.nama as name,blog.judul,blog.statusblog,blog.isi,blog.photo from anggota 
		INNER JOIN blog ON anggota.idanggota = blog.idanggota  
		UNION 
		SELECT blog.idblog,blog.tanggalinput,user.username as name,blog.judul,blog.statusblog,blog.isi,blog.photo from user 
		INNER JOIN blog ON user.iduser = blog.iduser where statusblog='Active' ORDER BY idblog DESC LIMIT $start,$per_page " ;
		
		/*$query = "SELECT buku.idbuku,subject.subject,buku.judul,pengarang.pengarang,penerbit.penerbit,buku.thn_terbit,buku.abstraksi,buku.photo,buku.status,buku.callnumber,buku.jenis,bahasa.bahasa,rakklasifikasi.number,rakklasifikasi.rakklasifikasi FROM buku LEFT JOIN pengarang ON pengarang.idpengarang = buku.idpengarang LEFT JOIN penerbit ON penerbit.idpenerbit = buku.idpenerbit LEFT JOIN subject ON subject.idsubject = buku.idsubject LEFT JOIN bahasa ON bahasa.idbahasa = buku.idbahasa LEFT JOIN rakklasifikasi ON rakklasifikasi.idrakklasifikasi =buku.idrakklasifikasi $sWhere  GROUP BY buku.idbuku ORDER BY buku.idbuku DESC $sLimit" ; */

        //get records
        $getquery = $this->db->query("$query_");
        //return fetched data
        return $getquery;
    }
	public function getRowsgalery($per_page, $start){
  
   
		$query_ = "SELECT galery.idgalery,anggota.nama as name,galery.namagalery,galery.statusgalery,galery.location_image from anggota 
		INNER JOIN galery ON anggota.idanggota = galery.idanggota  
		UNION 
		SELECT galery.idgalery,user.username as name,galery.namagalery,galery.statusgalery,galery.location_image from user 
		INNER JOIN galery ON user.iduser = galery.iduser where statusgalery='Active' ORDER BY idgalery DESC LIMIT $start,$per_page " ;
		 
        $getquery = $this->db->query("$query_");
        //return fetched data
        return $getquery;
    }
	public function selectblog(){  
		return $this->db->query("SELECT blog.idblog,blog.tanggalinput,anggota.nama as name,blog.judul,blog.statusblog from anggota INNER JOIN blog ON anggota.idanggota = blog.idanggota UNION SELECT blog.idblog,blog.tanggalinput,user.username as name,blog.judul,blog.statusblog from user INNER JOIN blog ON user.iduser = blog.iduser");
	}
	public function selectgalery(){
		return $this->db->query("SELECT galery.idgalery ,user.username as nama,galery.namagalery,galery.statusgalery,galery.location_image FROM `galery` INNER JOIN user ON galery.iduser=user.iduser UNION SELECT galery.idgalery,anggota.nama as nama,galery.namagalery,galery.statusgalery,galery.location_image FROM `galery` INNER JOIN anggota ON galery.idanggota=anggota.idanggota ORDER BY idgalery DESC");
	}  
}
