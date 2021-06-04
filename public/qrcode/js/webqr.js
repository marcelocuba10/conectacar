// QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

   
        
var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>'+
    '<div id="imghelp" style="display:block;">Arraste e solte um QRCode aqui'+
    '<br>ou selecione um arquivo'+
    '<input style="font-size: 12px!important;" type="file" onchange="handleFiles(this.files)"/>'+
    '</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
    handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
    qrcode.decode(dt.getData('URL'));
  }
}


function reload(){
	document.getElementById("v").load();
}
function handleFiles(f)
{
    var o=[];
    
    for(var i =0;i<f.length;i++)
    {
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

            a = qrcode.decode(e.target.result);
            console.log(a);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]); 
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    //if(stype!=1)
      //  return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                a =  qrcode.decode();
                
                    var hash = a;
		    axios.post('/backend/financial/payments/'+hash+'/qr', {
		        params: { 
		            hash: hash,
		        }
		    })
		    .then(function (response) {
		    
		    if(response.data == '0'){
		      	   document.getElementById("result").innerHTML="<strong><font color='red'>Cobrança não encontrada</strong>";
		      	   return;
		      }else{
		      	   document.getElementById("result").innerHTML=response.data;
		           //document.getElementById("imghelp").style.display='none';
		           document.getElementById("idtrans").value=hash;
		           document.getElementById("btc").style.display='block';
		      }
      
		        
		    })
		    .catch(function (error) {
		        //console.log(error);
		    })
		    .finally(function () {
		        // always executed
		    });  
            }
            catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                console.log(e);
                setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function read(a)
{
    // var html="<br>";
    // if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
    //     html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
    // html+="<b>"+htmlEntities(a)+"</b><br><br>";
    // document.getElementById("result").innerHTML=html;

    var hash = a;
    axios.post('/backend/financial/payments/'+hash+'/qr', {
        params: { 
            hash: hash,
        }
    })
    .then(function (response) {
        document.getElementById("result").innerHTML=response.data;
        document.getElementById("imghelp").style.display='none';
        document.getElementById("idtrans").value=hash;
        document.getElementById("botaoEnviar").style.display='block';
    })
    .catch(function (error) {
        //console.log(error);
    })
    .finally(function () {
        // always executed
    });  

}   

function pay(){
    var id = document.getElementById("idtrans").value;
    var e = document.getElementById("carteira_id");
    var carteira_id = e.options[e.selectedIndex].value;
    
    if(!carteira_id){
        alert('Selecione uma carteira para pagamento!');
        return;
    }
    

    axios.post('/backend/financial/payments/'+id+'/pay', {
        params: { 
            id: id,
            carteira_id:carteira_id
        }
    })
    .then(function (response) {
    
       //alert('Cód return QRNCC: '+response.data);
       //return;
      	id = response.data;
	
	montaTela('/backend/financial/payments/'+id+'/edit');
	return;
	
	
      if(response.data == '5'){
      	   alert('A carteira selecionada não é da mesma moeda da cobrança!');
      	   document.getElementById("btc").style.display='none';
      	   return;
      }
      
      
      if(response.data == '4'){
      	   alert('Essa conta já foi paga!');
      	   document.getElementById("btc").style.display='none';
      	   return;
      }
      
      
      if(response.data == '3'){
      	   alert('Operação não pode ser para sua própria conta!');
      	   document.getElementById("btc").style.display='none';
      	   return;
      }
      
      if(response.data == '2'){
      	   alert('Saldo insuficiente!!');
      	   document.getElementById("btc").style.display='none';
      	   return;
      }
      
      if(response.data == '1'){
      	   montaTela('/backend/financial/extracts');
      	   //return;
      }
      
      
    })
    .catch(function (error) {
        //console.log(error);
    })
    .finally(function () {
        // always executed
    });  
}

function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) 
{

    v.srcObject = stream;
    v.play();

    gUM=true;
    setTimeout(captureToCanvas, 500);
}
        
function error(error)
{
    gUM=false;
    return;
}

function load()
{    
   
        initCanvas(800, 600);
        //qrcode.callback = read;
        //document.getElementById("mainbody").style.display="inline";
        setwebcam();
    
    
}

function setwebcam()
{    
    //document.getElementById("botaoEnviar").style.display='none';
     document.getElementById("btc").style.display='none';
    
    var options = true;
    if(navigator.mediaDevices && navigator.mediaDevices.enumerateDevices)
    {
        try{
            navigator.mediaDevices.enumerateDevices()
            .then(function(devices) {
              devices.forEach(function(device) {
                if (device.kind === 'videoinput') {
               
                  if(device.label.toLowerCase().search("back") >-1)
                    options={'deviceId': {'exact':device.deviceId}, 'facingMode':'environment'} ;
                }
                console.log(device.kind + ": " + device.label +" id = " + device.deviceId);
              });
              
              setwebcam2(options);
            });
        }
        catch(e)
        {
            console.log(e);
        }
    }
    else{
        console.log("no navigator.mediaDevices.enumerateDevices" );
        setwebcam2(options);
    }
    
}

function setwebcam2(options)
{
    
    var url = window.location.origin+'/392/load.gif';
    //console.log(url);
    document.getElementById("result").innerHTML="<img style='width:20px!important;' src="+url+"></img>";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");
    
   

    if(n.mediaDevices.getUserMedia)
    {   
    
        n.mediaDevices.getUserMedia({video: { facingMode: { exact: "environment" } }, audio: false}).
            then(function(stream){
            console.log(stream);
                success(stream);
            }).catch(function(error){
                console.log(error)
            });
    }
    else
    if(n.getUserMedia)
    {
        webkit=true;
        n.getUserMedia({video: { facingMode: { exact: "environment" } }, audio: false}, success, error);
    }
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video:{ facingMode: { exact: "environment" } }, audio: false}, success, error);
    }

    //document.getElementById("qrimg").style.opacity=0.2;
    //document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 500);
}

function setimg()
{   //document.getElementById("botaoEnviar").style.display='none';
    document.getElementById("result").innerHTML="- Aguardando arquivo - ";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    //document.getElementById("qrimg").style.opacity=1.0;
    //document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
    
}
