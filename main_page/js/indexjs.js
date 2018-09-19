
$(document).ready(function(){

   

}); 


//AJAX
function $_xmlHttpRequest()
{   
	//現今所有的瀏覽器均支援XMLHttpRequest物件（IE5、IE6僅支援ActiveXObject）
	if(window.ActiveXObject)
    {
    	xmlHTTP=new ActiveXObject("Microsoft.XMLHTTP");
    }
    else if(window.XMLHttpRequest)
    {
        xmlHTTP=new XMLHttpRequest();
    }
}

//傳送選項給PHP並印出表單
function sendCur() {
	var cur1 = document.getElementById("cur1").value;
	var cur2 = document.getElementById("cur2").value;
	if (cur1==cur2) {
		alert("請選擇不同貨幣~!");
		return;
	}
	var tbDiv = document.getElementById("tableDiv");
	$("#tableDiv").slideUp("fast");
	$_xmlHttpRequest();
    xmlHTTP.open("GET","\\main_page\\php\\return_rate_function.php?cur1="+cur1+"&cur2="+cur2,true);

    xmlHTTP.onreadystatechange=function echoTb() {
        if(xmlHTTP.readyState == 4)
        {
            if(xmlHTTP.status == 200)
            {
                var str=xmlHTTP.responseText;
                document.getElementById("tableDiv").innerHTML=str;
                $("#tableDiv").slideDown("slow");
            }
        }
    }
    xmlHTTP.send(null);
}

function meunOpen() {
	$("#leftMeun").stop( true, false);
	$("#leftMeun").animate({left:"0px"});
}

function meunClose() {
	$("#leftMeun").stop( true, false);
	$("#leftMeun").animate({left:"-200px"});
}