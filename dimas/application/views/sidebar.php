 <!-- Side Navbar -->
 <nav class="side-navbar">
  <!-- Sidebar Header-->
  <div class="sidebar-header d-flex align-items-center">
	<div class="avatar"><img src="<?php echo base_url('public/img/avatar-1.jpg')?>" alt="..." class="img-fluid rounded-circle"></div>
	<div class="title">
	  <h1 class="h4">Mark Stephen</h1>
	  <p>Web Designer</p>
  </div>
</div>
<!-- Sidebar Navidation Menus--><span class="heading">Main</span>
<ul class="list-unstyled">
	<li class="<?php echo (isset($menuhome)) ? "active": "" ;?>">
		<a href="<?php echo site_url('admin');?>"> 
			<i class="icon-home"></i>Home </a>
	</li>
	<li class="<?php echo (isset($menukat) OR isset($menuper) OR isset($menupernon)) ? "active": "" ;?>">
		<a href="#exampledropdownDropdown" aria-expanded="<?php echo (isset($menukat) OR isset($menuper) OR isset($menupernon)) ? "false": "" ;?>" data-toggle="collapse"> 
			<i class="icon-interface-windows"></i>Master Data</a>
	  	<ul id="exampledropdownDropdown" class="collapse list-unstyled <?php echo (isset($menukat) OR isset($menuper) OR isset($menupernon)) ? "show": "" ;?>">
			<li class="<?php echo (isset($menukat)) ? "active": "" ;?>">
				<a href="<?php echo site_url('admin/kategori');?>"><i class="icon-list-1">
				</i> Kategori</a>
			</li>
			<li class="<?php echo (isset($menuper)) ? "active": "" ;?>">
				<a href="<?php echo site_url('admin/perusahaan');?>">
					<i class="fa fa-building-o"></i> Perusahaan
				</a>
			</li>
			<li class="<?php echo (isset($menupernon)) ? "active": "" ;?>">
				<a href="<?php echo site_url('admin/perusahaan_non');?>">
					<i class="fa fa-building-o"></i> Perusahaan Non
				</a>
			</li>
		</ul>
	</li>
<li class="<?php echo (isset($menuuser)) ? "active": "" ;?>">
	<a href="<?php echo site_url('admin/datauser');?>">
		<i class="icon-bill"></i>Invoice </a>
</li>
<li class="<?php echo (isset($menuuser)) ? "active": "" ;?>">
	<a href="<?php echo site_url('admin/datauser');?>"><i class="icon-padnote"></i>Laporan</a>
</li>
</nav>