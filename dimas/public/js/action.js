function savesperusahaan(){  
	var url = getBaseURL() +"/home/perusahaan/save" ;
	$("#formtambahper").validate({
		rules: {
			nama_perusahaan: "required" 
		},
		messages: { 
			nama_perusahaan: "Harus terisi" 
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formtambahper').serialize(),
				dataType: "JSON",
				beforeSend: function(){
					$('#btnsaveper').text('loading..');
				},
				success: function(data){ 
					switch(data.save.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() { 
								 
								resetform('formtambahper') ;
								location.reload();
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$('#btnsaveper').text('Save');
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	}); 
}
function updateperusahaan(){ 
	var url = getBaseURL() +"/home/perusahaan/update" ;
	$("#formupdateper").validate({
		rules: {
			nama_perusahaanedit: "required" 
		},
		messages: { 
			nama_perusahaanedit: "Harus terisi" 
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formupdateper').serialize(),
				dataType: "JSON",
				beforeSend: function(){ 
					$("#btneditper").text("Loading..");
				},
				success: function(data){ 
					switch(data.update.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() { 
								$('.updateper').modal('hide'); 
								resetform('formupdateper') ;
								location.reload();
								 
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$("#btneditper").text("Update");
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	}); 
}

function savesperusahaannon(){  
	var url = getBaseURL() +"/home/perusahaan_non/save" ;
	$("#formtambahpernon").validate({
		rules: {
			nama_perusahaan_non: "required" 
		},
		messages: { 
			nama_perusahaan_non: "Harus terisi" 
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formtambahpernon').serialize(),
				dataType: "JSON",
				beforeSend: function(){
					$('#btnsavepernon').text('loading..');
				},
				success: function(data){ 
					switch(data.save.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() { 
								 
								resetform('formtambahpernon') ;
								location.reload();
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$('#btnsavepernon').text('Save');
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	}); 
}
function updateperusahaannon(){ 
	var url = getBaseURL() +"/home/perusahaan/update" ;
	$("#formupdatepernon").validate({
		rules: {
			nama_perusahaan_nonedit: "required" 
		},
		messages: { 
			nama_perusahaan_nonnedit: "Harus terisi" 
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formupdatepernon').serialize(),
				dataType: "JSON",
				beforeSend: function(){ 
					$("#btneditpernon").text("Loading..");
				},
				success: function(data){ 
					switch(data.update.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() { 
								$('.updatepernon').modal('hide'); 
								resetform('formupdatepernon') ;
								location.reload();
								 
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$("#btneditpernon").text("Update");
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	}); 
}

function savekategori(){
	var url = getBaseURL() +"/home/kategori/save" ;
	$("#formtambahka").validate({
		rules: {
			nama_kategori: "required",
			vat:"required" 
		},
		messages: { 
			nama_kategori: "Harus terisi",
			vat:"Harus terisi" 
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formtambahka').serialize(),
				dataType: "JSON",
				beforeSend: function(){
					$('#btnsavekategori').text('loading..');
				},
				success: function(data){ 
					switch(data.save.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() {  
								resetform('formtambahka') ;
								location.reload();
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.save.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$('#btnsavekategori').text('Save');
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	});
}
function updatekategori(){ 
	var url = getBaseURL() +"/home/kategori/update" ;
	$("#formupdate").validate({
		rules: {
			nama_kategori: "required",
			vat:"required" 
		},
		messages: {
			nama_kategori: "Harus terisi",
			vat:"Harus terisi"
		},
		submitHandler: function() { 
			$.ajax({
				url : url,
				type: "POST",
				data: $('#formupdate').serialize(),
				dataType: "JSON",
				beforeSend: function(){ 
					$("#btnupdatekategori").text("Loading..");
				},
				success: function(data){ 
					switch(data.update.sukses){ 
						case 0:  
							$.toast({
								heading: 'Success',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'success',
								hideAfter: 2000, 
								stack: 6
							  });
							setTimeout(function() { 
								$('.update').modal('hide'); 
								resetform('formupdate') ;
								location.reload();
								 
							}, 1000); 
							break;   
						case 1:  
							$.toast({
								heading: 'Warning',
								text: data.update.pesan,
								position: 'top-right',
								loaderBg:'#ff6849',
								icon: 'warning',
								hideAfter: 2000, 
								stack: 6
							});
							break;  
					}  
				},
				complete : function (){
					$("#btnupdatekategori").text("Update");
				},
				error: function (jqXHR, textStatus, errorThrown){  
					$.toast({
						heading: 'Error Request',
						text: 'Status error = ' + textStatus + ", Error = " + errorThrown ,
						position: 'top-right',
						loaderBg:'#ff6849',
						icon: 'warning',
						hideAfter: 2000, 
						stack: 6
					});
				}
			});  
			return false;
		} 
	}); 
}

