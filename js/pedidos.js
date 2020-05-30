var cliente;
var descricao;
var frete;
var elemento;
var qtd_produto;
var valor_total = 0;
var valor_troco;
var valor_pago;
var confirmados = [];
var qtd = [];
var marcados = [];
var lanches="";
var observacoes;
var pedido="";
var forma_pagamento="";
var mes = new Date().getMonth()+1;
var data_pedido= new Date().getDate()+"/"+mes+"/"+new Date().getFullYear(); 

function checkbox_marcado(name,id_qtd){

    if(marcados.indexOf(name)== -1){
        marcados.push(name);
    }

    if(document.getElementsByName(name)[0].checked){
        document.getElementById(id_qtd).style="width:30%; display: show;";
    }else{
        document.getElementById(id_qtd).style="width:30%; display: none;";
    }
}

function gerar_nota(){
    observacoes = document.getElementById("observacao").value || null
    for(let i=0;i<marcados.length;i++){
        
        elemento = document.getElementsByName(marcados[i])[0];
        
        if(elemento.checked==true){
            qtd.push(document.getElementById("codigo_"+elemento.id).value);
            qtd_produto = parseFloat((elemento.value * qtd[i]).toFixed(2));
            confirmados.push(elemento.id);
            lanches+=qtd[i]+"x "+elemento.name+"--------R$"+qtd_produto+"<br>";
            valor_total += qtd_produto;
            pedido += qtd[i]+" "+elemento.name+" <br>";
        }
    }

    cliente = document.getElementById("cliente").value || null;
    frete = document.getElementById("frete").value || null;
    
    if(frete==null || frete==""){
        verifica_frete();
        function verifica_frete(){
            frete = parseFloat(prompt("Digite o valor do frete"));
            if(frete=="" || frete==null){
                verifica_frete();
            }
        }   
    }

    lanches+="Frete--------R$"+frete+"<br>" || null;
    valor_total += parseFloat(frete);


    if(cliente==null){
        verifica_cliente();
        function verifica_cliente(){
            cliente = prompt("Digite o nome do cliente");
            if(cliente=="" || cliente==null){
                verifica_cliente();
            }
        }
    }
    
    if(lanches=="string"){
        document.location="novo_pedido.php";
    }
    
    if(observacoes==null || observacoes=="" || typeof(observacoes)==undefined){
        observacoes="sem observação";
        descricao = 'BOKA HAMBURGUERIA <br> R. São Francisco de Assis, 253 <br> 75 99110-5059 <br> hamburgueriadoboka@gmail.com <br> --------------------------- <br> CLIENTE: <br>'+cliente+'<br> --------------------------- <br> DESCRIÇÃO DA COMANDA: <br>' +lanches+' --------------------------- <br> VALOR A SER PAGO: <br> R$ '+parseFloat(valor_total.toFixed(2))+' <br> ---------------------------  <br> DESEJA CONFIRMAR O PEDIDO? <br><br><br> <button class="btn btn-primary" onclick="prepara_pedido();"> Preparar Pedido</button>';
    }else{
        descricao = 'BOKA HAMBURGUERIA <br> R. São Francisco de Assis, 253 <br> 75 99110-5059 <br> hamburgueriadoboka@gmail.com <br> --------------------------- <br> CLIENTE: <br>'+cliente+'<br> --------------------------- <br> DESCRIÇÃO DA COMANDA: <br>'+lanches+' --------------------------- <br> OBSERVAÇÕES DO CLIENTE: <br>'+observacoes+'<br> -------------------------- <br>VALOR A SER PAGO: <br> R$ '+parseFloat(valor_total.toFixed(2))+' <br> ---------------------------  <br> DESEJA CONFIRMAR O PEDIDO? <br><br><br> <button class="btn btn-primary" onclick="prepara_pedido();"> Preparar Pedido</button>';
    }
    document.getElementById("descricao").innerHTML = descricao;

}

function excluir_pedido(){
    window.location.href = "novo_pedido.php";
}

function prepara_pedido(){
    valor_pago = parseFloat(prompt("Digite quanto o cliente pagou"));
    forma_pagamento = prompt("Especifique a forma de pagamento do cliente \n 1 para Débito \n 2 para Crédito \n 3 para Espécie");
    verifica_pagamento();
    function verifica_pagamento(){
        switch (forma_pagamento) {
            case "1":
                forma_pagamento="Débito"
                break;
            
            case "2":
                forma_pagamento="Crédito"
                break;

            case "3":
                forma_pagamento="Espécie"
                break;
                    
            default:
                alert("A forma de pagamento não foi definida corretamente. Por favor, utilize os valores 1, 2 ou 3");
                forma_pagamento = prompt("Especifique a forma de pagamento do cliente \n 1 para Débito \n 2 para Crédito \n 3 para Espécie");
                verifica_pagamento();
        }
    }

    valor_troco = valor_pago - valor_total;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.overrideMimeType("text/xml");

    xmlhttp.onload = ()=>{
        if(xmlhttp.readyState==4){
            if(xmlhttp.status==200){
                alert(xmlhttp.responseText);
                window.location.href = "pedidos_andamento.php";
            }else{
                alert(xmlhttp.responseText);
            }
        }else{
            alert(xmlhttp.responseText);
        }
    }

    xmlhttp.open("POST","requests.php",true);
    xmlhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    

    // xmlhttp.send("cliente="+cliente+"&pedido="+pedido+"&observacoes="+observacoes+"&frete="+frete+"&valor_total="+valor_total+"&valor_pago="+valor_pago+"&valor_troco="+valor_troco+"&forma_pagamento="+forma_pagamento+"&data_pedido="+data_pedido+"&pedido_andamento=sim");

    xmlhttp.send("cliente="+cliente+"&pedido="+pedido+"&observacoes="+observacoes+"&frete="+frete+"&valor_total="+valor_total+"&valor_pago="+valor_pago+"&valor_troco="+valor_troco+"&forma_pagamento="+forma_pagamento+"&data_pedido="+data_pedido+"&finaliza_pedido=sim");
    
}