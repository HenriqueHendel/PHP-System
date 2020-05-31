var cliente;
var descricao;
var frete;
var elemento;
var qtd_produto;
var valor_total = 0;
var desconto;
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
            lanches+=qtd[i]+"x "+elemento.name+"-------- $"+qtd_produto+"<br>";
            valor_total += qtd_produto;
            pedido += qtd[i]+" "+elemento.name+" <br>";
        }
    }

    cliente = document.getElementById("cliente").value || null;
    frete = document.getElementById("frete").value || null;
    desconto = document.getElementById("desconto").value || false;
    
    if(frete==null || frete==""){
        verifica_frete();
        function verifica_frete(){
            frete = parseFloat(prompt("Digite o valor do frete"));
            if(frete=="" || frete==null){
                verifica_frete();
            }
        }   
    }

    lanches+="Shipping Rate-------- $"+frete+"<br>" || null;
    valor_total += parseFloat(frete);

    if(desconto){
        lanches+= "Discount: "+desconto+"% <br>";
        valor_desconto = parseFloat((desconto/100).toFixed(2));
        valor_total = valor_total - (valor_total * valor_desconto);
    }


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
        descricao = 'Company Name <br> Address, Street Number <br> Phone <br> companyemail@gmail.com <br> --------------------------- <br> CUSTOMER: <br>'+cliente+'<br> --------------------------- <br> BILLING: <br>' +lanches+' --------------------------- <br> Total: <br> R$ '+parseFloat(valor_total.toFixed(2))+' <br> ---------------------------  <br> CONFIRM ORDER ? <br><br><br> <button class="btn btn-primary" onclick="prepara_pedido();"> Confirm Order</button>';
    }else{
        descricao = 'Company Name <br> Address, Street Number <br> Phone <br> companyemail@gmail.com <br> --------------------------- <br> CUSTOMER: <br>'+cliente+'<br> --------------------------- <br> BILLING: <br>'+lanches+' --------------------------- <br> CUSTOMER OBSERVATIONS: <br>'+observacoes+'<br> -------------------------- <br>TOTAL: <br> R$ '+parseFloat(valor_total.toFixed(2))+' <br> ---------------------------  <br> CONFIRM ORDER ? <br><br><br> <button class="btn btn-primary" onclick="prepara_pedido();"> Confirm Order</button>';
    }
    document.getElementById("descricao").innerHTML = descricao;

}

function excluir_pedido(){
    window.location.href = "novo_pedido.php";
}

function prepara_pedido(){
    valor_pago = parseFloat(prompt("How many did the customer pay ?"));
    forma_pagamento = prompt("How did the customer pay ? \n 1 to Debit Card \n 2 to Credit Card \n 3 to Cash");
    verifica_pagamento();
    function verifica_pagamento(){
        switch (forma_pagamento) {
            case "1":
                forma_pagamento="Debit Card"
                break;
            
            case "2":
                forma_pagamento="Credit Card"
                break;

            case "3":
                forma_pagamento="Cash"
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