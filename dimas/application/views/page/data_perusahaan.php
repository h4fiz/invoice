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
					<a onclick="add('formtambahper','FORM INPUT TAMBAH DATA PERUSAHAAN')"  data-toggle="modal" data-target=".tambahdataper" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
							foreach ($listperusahaan as $per) {
								$param = ' perusahaan';
								$getdelete ="'".$param."'".",'perusahaan',"."'listperusahaan'".",'".$per->perusahaanId."'" ; 
								$getupdate = "'perusahaan','".$per->perusahaanId."'" ;
							
							?>
							<tbody>
								<tr>
									<td><?php echo $no++;?></td>
									<td><?php echo $per->perusahaanId; ?></td>
									<td><?php echo $per->nama_perusahaan;?></td>
									<td><?php
		
										$html ="";
										$html .='  
										<a href="#" onclick="edit('.$getupdate.')" title="Edit" data-toggle="modal" data-target=".updateper" class="btn btn-warning">
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
				<div tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade tambahdataper">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="exampleModalLabel" class="modal-title judulfrm"></h4>
								<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
							</div>
							<form id="formtambahper" autocomplete="off">
								<div class="modal-body">
									<div class="form-group">
										<label>Nama Perusahaan</label>
										<input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control">
										<input type="hidden" name="kode" value="<?php echo $kodemax; ?>">
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
									<button type="submit" onclick = "savesperusahaan()" id="btnsaveper" class="btn btn-primary">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- Modal tambah-->
				<div  tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade updateper">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 id="exampleModalLabel" class="modal-title judulfrmper"></h4>
								<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
							</div>
							<form id="formupdateper" autocomplete="off">
							<div class="modal-body">
								<div class="form-group">
									<label>Nama Perusahaan</label>
									<input type="hidden" name ='perusahaanId' id="perusahaanId">
									<input type="text" name="nama_perusahaanedit" id="nama_perusahaanedit" class="form-control">
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
								<button type="submit" onclick="updateperusahaan()" id="btneditper" class="btn btn-primary">Update</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>