	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-margin-bottom">Data Perusahaan</h2>
		</div>
	</header>
	<!-- Breadcrumb-->
	<div class="breadcrumb-holder container-fluid">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo site_url('home')?>">Home</a></li>
			<li class="breadcrumb-item active">Perusahaan</li>
		</ul>
	</div>
	<!-- tables Section-->
	<section> 
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<a onclick="add('formtambahpernon','FORM INPUT TAMBAH DATA PERUSAHAAN NON PPN')"  data-toggle="modal" data-target=".tambahdatapernon" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="tableper" style="width: 100%;" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Perusahaan</th>
									<th>Nama Perusahaan</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php $no=1;
							foreach ($listperusahaannon as $per) {
								$param = ' perusahaan_non';
								$getdelete ="'".$param."'".",'perusahaan_non',"."'listperusahaannon'".",'".$per->perusahaanNonId."'" ; 
								$getupdate = "'perusahaan_non','".$per->perusahaanNonId."'" ;
							
							?>
							<tbody>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $per->perusahaanNonId?></td>
									<td><?php echo $per->nama_perusahaan_non;?></td>
									<td><?php
		
										$html ="";
										$html .='  
										<a href="#" onclick="edit('.$getupdate.')" title="Edit" data-toggle="modal" data-target=".updatepernon" class="btn btn-warning">
										<i class="fa fa-edit"></i></a>
										<a href="#" title="Delete" onclick="hapusdata('.$getdelete.')" class="btn btn-danger">
										<i class="fa fa-times"></i></a>'; 
			 
										echo $html;
										?>
									</td>
								</tr>
							</tbody>
							<?php }?>
						</table>
					</div>
				</div>
				<!-- Modal tambah-->
				<div tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade tambahdatapernon">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="exampleModalLabel" class="modal-title judulfrm"></h4>
								<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
							</div>
							<form id="formtambahpernon" autocomplete="off">
								<div class="modal-body">
									<div class="form-group">
										<label>Nama Perusahaan</label>
										<input type="text" name="nama_perusahaan_non" id="nama_perusahaan_non" class="form-control">
										<input type="hidden" name="kodenon" value="<?php echo $kode; ?>">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
									<button type="submit" onclick = "savesperusahaannon()" id="btnsavepernon" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal tambah-->
				<div  tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade updatepernon">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="exampleModalLabel" class="modal-title judulfrmpernon"></h4>
								<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
							</div>
							<form id="formupdateper" autocomplete="off">
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Perusahaan</label>
									<input type="hidden" name ='perusahaanNonId' id="perusahaanNonId">
									<input type="text" name="nama_perusahaan_nonedit" id="nama_perusahaan_nonedit" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
								<button type="submit" onclick="updateperusahaannon()" id="btneditpernon" class="btn btn-primary">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>