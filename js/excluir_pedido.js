function excluir_pedido(id_cliente){
    if(id_cliente){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.overrideMimeType("text/xml");
    
        xmlhttp.onload = ()=>{
            if(xmlhttp.readyStatus==4){
                if(!xmlhttp.status==200){
                    alert(xmlhttp.responseText);
                }
            }else{
                alert(xmlhttp.responseText);
            }
        }
    
        xmlhttp.open("POST","requests.php",false);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

        xmlhttp.send("id_cliente="+id_cliente+"&excluir_pedido=sim"); 
        document.location="index.php";
    }
}