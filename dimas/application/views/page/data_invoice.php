<header class="page-header">
	<div class="container-fluid">
		<h2 class="no-margin-bottom">Invoice</h2>
	</div>
</header>
<!-- Breadcrumb-->
<div class="breadcrumb-holder container-fluid">
	<ul class="breadcrumb">
		<li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
		<li class="breadcrumb-item active">Invoice</li>
	</ul>
</div>
<!-- tables Section-->
<section> 
	<div class="container-fluid">
		<!-- <div class="card"> -->
			
			<ul class="nav nav-pills" role="tablist">
				<li class="nav-item" style="background-color: #fff">
					<a class="nav-link active" href="#ppn" role="tab" data-toggle="pill">DATA PPN</a>
				</li>
				<li class="nav-item" style="background-color: #fff">
					<a class="nav-link" href="#tambahdata" role="tab" data-toggle="pill">Tambah Data</a>
				</li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content" >
				<div role="tabpanel" class="tab-pane fade in show active" id="ppn">
					<div class="card">
						<div class="card-header">
							<h4 class="pull-left">Invoice PPN</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive">
								<table id="tableppn" style="width: 100%;" class="table">
									<thead>
										<tr>
											<th>No</th>
											<th>Invoice No</th>
											<th>Tanggal Invoice</th>
											<th>Nama Perusahaan</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<div role="tabpanel" class="tab-pane fade" id="tambahdata">
					<div class="card">
						<div class="card-header">
							<h4 class="pull-left">FORM INPUT TAMBAH DATA</h4>
						</div>
						<div class="card-body">
							<div class="row">
								<form id="" autocomplete="off">
									<div class="form-row">
										<div class="form-group col-md-2">
											<label class="control-label">Invoice No.</label>
											<input type="text" name ='inv_id' id="inv_id" class="form-control" value="<?php echo $kode; ?>">
										</div>
										<div class="form-group col-md-5">       
											<label class="control-label">Tanggal Invoice</label>
											<input type="text" name ='tgl_invoice' id="tgl_invoice" class="form-control">
										</div>
										<div class="form-group col-md-5">
											<label class="control-label">Nama Perusahaan</label>
											<select name="nama_perusahaan" id="nama_perusahaan" class="form-control">
												<option value="">Pilih Perusahaan</option>
											</select>
										</div>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">       
											<label class="control-label">Nama Kategori</label>
											<select name="nama_kategori" id="nama_kategori" class="form-control">
												<option value="">Pilih Kategori</option>
											</select>
										</div>
										<div class="form-group col-md-6">
											<label class="control-label">Tanggal Pembayaran</label>
											<input type="text" name="tgl_t_pembayaran"  id="tgl_t_pembayaran" class="form-control">
										</div>
									</div>
									<table class="invppn" style="width: 100%">
										<thead>
											<tr>
												<th style="width: 5%">No.</th>
												<th style="width: 45%">Nama Project</th>
												<th style="width: 10%">Qty</th>
												<th style="width: 10%">Unit</th>
												<th style="width: 10%">Price</th>
												<th style="width: 10%">Amount</th>
												<th style="width: 10%"></th>
											</tr>
										</thead>
										<tbody>
											<tr id="0">
												<td><input type="text" name="" value="1" class="form-control form-control-sm"></td>
												<td><input type="text" name="nama_project" class="form-control form-control-sm"></td>
												<td><input type="text" name="qty" class="form-control form-control-sm"></td>
												<td><input type="text" name="unit" class="form-control form-control-sm"></td>
												<td><input type="text" name="price" class="form-control form-control-sm"></td>
												<td><input type="text" name="amount" id="amount" class="form-control form-control-sm"></td>
												<td><input type="button" class="btn btn-sm btn-primary " id="add" value="Add" /></td>
											</tr>
										</tbody>
									</table>
									<br>
									<button type="submit" onclick = "saveinvppn()" id="btnsavekategori" class="btn btn-primary">Save</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</div>
</section>
