function pedido_finalizado(id_cliente, acao){      
    if(id_cliente){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.overrideMimeType("text/xml");
    
        xmlhttp.onload = ()=>{
            if(xmlhttp.readyStatus==4){
                if(xmlhttp.status==200){
                    alert(xmlhttp.responseText);
                    window.location.href = "index.php";
                }else{
                    alert(xmlhttp.responseText);
                }
            }else{
                alert(xmlhttp.responseText);
            }
        }
    
        xmlhttp.open("POST","requests.php",true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        if(acao=="pedido finalizado"){
            xmlhttp.send("id_cliente="+id_cliente+"&pedido_finalizado=sim"); 
        }else{
            alert("Não foi possível terminar o pedido");
        }
    }else{
        alert("Não foi possível finalizar o pedido. Verifique o id do cliente");
    }
}

function pedido_excluido(id_cliente, acao){
    if(id_cliente){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.overrideMimeType("text/xml");
    
        xmlhttp.onload = ()=>{
            if(xmlhttp.readyStatus==4){
                if(xmlhttp.status==200){
                    alert(xmlhttp.responseText);
                    window.location.href = "index.php";
                }else{
                    alert(xmlhttp.responseText);
                }
            }else{
                alert(xmlhttp.responseText);
            }
        }
    
        xmlhttp.open("POST","requests.php",true);
        xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
        if(acao=="pedido cancelado"){
            xmlhttp.send("id_cliente="+id_cliente+"&pedido_cancelado=sim"); 
        }else{
            alert("Não foi possível cancelar o pedido");
        }

    }else{
        alert("Não foi possível finalizar o pedido. Verifique o id do cliente");
    }
}