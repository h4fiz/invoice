 
function edit(action=null,paramid=null){
	var url = getBaseURL() +"/home/home/getdata/" + action + "/" + paramid;   
	
	$.ajax({
		url : url,
		type: "GET",
		dataType: "JSON",
		success: function(data)
		{
			switch(data.sukses){
					 
				case 1: 
					switch(action){ 
						case "user" :   
							$("#judulfrmuser").text('FORM INPUT EDIT DATA USER'); 
							$("#iduser").val(data.data.iduser);       
							$("#usernamelama").val(data.data.username);  
							$("#usernameedit").val(data.data.username);  
							$("#fullnameedit").val(data.data.fullname);   
							$("#tlpedit").val(data.data.tlp);   
							$("#emailedit").val(data.data.email);   
							$("#hak_aksesedit").val(data.data.hak_akses);   
						break ; 
						
						case "perusahaan" :   
							$(".judulfrmper").text('FORM INPUT EDIT DATA PERUSAHAAN'); 
							$("#perusahaanId").val(data.data.perusahaanId);   				
							$("#nama_perusahaanedit").val(data.data.nama_perusahaan);    
						break ;
						
						case "kategori" :   
							$(".jdlformkategori").text('FORM INPUT EDIT DATA KATEGORI'); 
							$("#kategoriId").val(data.data.kategoriId);   				
							$("#nama_kategoriedit").val(data.data.nama_kategori);   				
							$("#vatedit").val(data.data.VAT);    
						break ;  
					} 
				break ; 
			}   
		},
		error: function (jqXHR, textStatus, errorThrown)
		{   
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
}
function hapusdata(ket,paramctrl,paramreload,paramid,param = null) {
	var notive ;  
	var url ;     

	notive  = "Apakah anda yakin ingin menghapus data "+ ket +" ini ?" ;
	  
	url = getBaseURL() +"/home/"+paramctrl+"/deletedata/"+ paramid +"/"+ param ; 
	swal({   
		title: notive,   
		text:"Sebelum melakukan proses penghapusan, periksa kembali data yang akan anda hapus" ,   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Iya!",   
		cancelButtonText: "Tidak!",   
		closeOnConfirm: false,   
		closeOnCancel: false 
	}, function(isConfirm){   
		if (isConfirm) {     
			$.get(url, function(json) { 
				switch(json.sukses)
				{
					case 0 :
						swal("Deleted!", "Anda telah melakukan penghapusan.", "success");   
						location.reload();
					break ; 
					 
				}
			},'json').fail(function() {
				alert( "error" );
			}); 
		} else {     
			swal("Tidak!", "Penghapusan data telah dibatalkan", "error");   
		} 
	}); 
} 
function hapusdatas(ket,paramtable,paramreload,paramid) {
	var notive ;  
	var url ;     

	notive  = "Apakah anda yakin ingin menghapus data "+ ket +" ini ?" ;
	 
	/* switch(paramtable){
		
		case "user" :
			url = getBaseURL() +"/admin/user/deletedata/"+ paramid ;
			break ;
		case "anggota" :
			url = getBaseURL() +"/admin/anggota/deletedata/"+ paramid ;
			break ;
		case "subject" :
			url = getBaseURL() +"/admin/subject/deletedata/"+ paramid ;
			break ;
	}  */
	url = getBaseURL() +"/home/"+paramtable+"/deletedatadetail/"+ paramid ; 
	swal({   
		title: notive,   
		text: "Sebelum melakukan proses penghapusan, periksa kembali data yang akan anda hapus" ,   
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "Iya!",   
		cancelButtonText: "Tidak!",   
		closeOnConfirm: false,   
		closeOnCancel: false 
	}, function(isConfirm){   
		if (isConfirm) {     
			$.get(url, function(json) { 
				switch(json.sukses)
				{
					case 0 :
						swal("Deleted!", "Anda telah melakukan penghapusan.", "success");   
						location.reload();
					break ; 
					 
				}
			},'json').fail(function() {
				alert( "error" );
			}); 
		} else {     
			swal("Tidak!", "Penghapusan data telah dibatalkan", "error");   
		} 
	}); 
} 

function Rupiah(angka){
    var rupiah = '';
    var angkarev = angka.toString().split('').reverse().join('');
    for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+',';
    return rupiah.split('',rupiah.length-1).reverse().join('');
}