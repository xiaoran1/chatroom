function getXmlHttpObject(){
    var xhr = null;
    try{
        xhr = new XMLHttpRequest();
    }catch(e){
        xhr = new ActiveXObject('Microsoft.XMLHTTP');
    }
    return xhr;
}

function $(id){
	return document.getElementById(id);
}