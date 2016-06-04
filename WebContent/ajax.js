function ajax(method,url,data,success){
    var xhr = null;
    //if (window.XMLHttpRequest) {
    //    xhr=  new XMLHttpRequest();
    //} else {
    //    xhr = new ActiveXObject('Microsoft.XMLHTTP');
    //}
    try{
        xhr = new XMLHttpRequest();
    }catch(e){
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    }
    /*
    open function
    	parameter
    	1: open type
    	2: address
    	3: sychrones or not
    */
    if(method == 'get' && data){
    	url += '?'+data;
    }
	xhr.open(method,url,true);
    if(method == 'get'){
    	xhr.send();
    }else{
    	xhr.setRequestHeader('content-type','application/x-www-form-urlencoded');
    	xhr.send(data);
    }
	xhr.onreadystatechange = function(){
		if(xhr.readyState == 4){
			if(xhr.status == 200){
				success && success(xhr.responseText);
			}else{
				alert("error happen, Err:"+xhr.status);
			}		
		}
	}
}