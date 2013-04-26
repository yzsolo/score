function getRootPath() //得到网站的根目录
  { 
    var strFullPath=window.document.location.href; 
    var strPath=window.document.location.pathname; 
    var pos=strFullPath.indexOf(strPath); 
    var prePath=strFullPath.substring(0,pos); 
    var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
    return(prePath+postPath); 
  } 
function change_flag($para){
	
	var xmlhttpreq;
		
			if(window.XMLHttpRequest){
				xmlhttpreq = new XMLHttpRequest();
			}else if(window.ActiveXObject){
				try{
					xmlhttpreq = new ActiveXObject("Msxm12.XMLHTTP");
				}catch(e){
					try{
						xmlhttpreq = new ActiveXObject("Microsoft.XMLHTTP");
					}catch(e){}
				}
			}

		var url = getRootPath()+"/index.php/admin/change_flag/"+$para;
		alert(url);
		xmlhttpreq.open("GET",url,true);
		xmlhttpreq.send();
		xmlhttpreq.onreadystatechange = function(){
			if(xmlhttpreq.readyState==4 && xmlhttpreq.status==200){
				alert(xmlhttpreq.responseText);
			}
		}
}