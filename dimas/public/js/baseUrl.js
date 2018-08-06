var table;
var method;
var method_save;
function getBaseURL(){
	var urls 	= location.href;  
	var baseURL = urls.substring(0, urls.indexOf('/', 14));
	if(baseURL.indexOf('http://localhost') != -1){ 
		var url 	 	 = location.href ;  
		var pathname 	 = location.pathname;  
		var index1 	 	 = url.indexOf(pathname) ;
		var index2		 = url.indexOf("/", index1 + 1) ;
		var baseLocalUrl = url.substr(0, index2) ;
		
		return baseLocalUrl ;
	}else{  
		return baseURL ;
	}
}
function resetform(param){ 
    $("#"+param).get(0).reset();
	$("#"+param)[0].reset(); 
} 

function add(paramform,txtjudul){  
	resetform(paramform) ;  
	$('.judulfrm').text(txtjudul) ;    
}
