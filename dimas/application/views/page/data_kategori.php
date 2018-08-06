	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-margin-bottom">Kategori</h2>
		</div>
	</header>
	<!-- Breadcrumb-->
	<div class="breadcrumb-holder container-fluid">
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
			<li class="breadcrumb-item active">Kategori</li>
		</ul>
	</div>
	<!-- tables Section-->
	<section> 
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<a onclick="add('formtambahka','FORM INPUT TAMBAH DATA KATEGORI')" data-toggle="modal" data-target=".tambahdata" class="btn btn-primary" style="color: #fff;"><i class="fa fa-plus"></i> Tambah</a>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable1" style="width: 100%;" class="table">
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Kategori</th>
									<th>VAT</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<?php $no=1;
									foreach ($listkategori as $kat) {
										$param = ' kategori';
										$getdelete ="'".$param."'".",'kategori',"."'listkategori'".",'".$kat->kategoriId."'" ; 
										$getupdate = "'kategori','".$kat->kategoriId."'" ;
								?>
								<tbody>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $kat->nama_kategori;?></td>
										<td><?php echo $kat->VAT;?>%</td>
										<td>
											<?php
			
											$html ="";
											$html .='  
											<a href="#" onclick="edit('.$getupdate.')" title="Edit" data-toggle="modal" data-target=".update" class="btn btn-warning">
											<i class="fa fa-edit"></i></a>
											<a href="#" title="Delete" onclick="hapusdata('.$getdelete.')" class="btn btn-danger">
											<i class="fa fa-times"></i></a>'; 
				 
											echo $html;
											?>
											</div>
										</td>
									</tr>
								</tbody>
							<?php }?>
						</table>
					</div>
					<!-- Modal-->
					<div tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade tambahdata">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title judulfrm"></h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<form id="formtambahka" autocomplete="off">
									<div class="modal-body">
										<div class="form-group">
											<label class="control-label">Nama Kategori</label>
											<input type="text" name ='nama_kategori' id="nama_kategori" class="form-control">
										</div>
										<div class="form-group">       
											<label class="control-label">VAT</label>
											<input type="text" name ='vat' id="vat" class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
										<button type="submit" onclick = "savekategori()" id="btnsavekategori" class="btn btn-primary">Save</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div  tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade update">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 id="exampleModalLabel" class="modal-title jdlformkategori"></h4>
									<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
								</div>
								<form id="formupdate" autocomplete="off">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Kategori</label>
											<input type="hidden" name ='kategoriId' id="kategoriId">
											<input type="text" name ='nama_kategoriedit' id="nama_kategoriedit" class="form-control">
										</div>
										<div class="form-group">       
											<label>VAT</label>
											<input type="text" name ='vatedit' id="vatedit" class="form-control">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
										<button type="submit" onclick = "updatekategori()" id="btnupdatekategori" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>