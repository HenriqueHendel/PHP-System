<?php
  include_once("seguranca.php");
  protegePagina();
    // Incluindo arquivos da configuração do banco de dados
        include_once("DB_config.php");
        include_once("DB_connection.php");
        include_once("DB_funcoes.php");
    
    // Requisições
        // Colocando pedido na lista de pedidos em andamento
            if(isset($_POST["finaliza_pedido"])){
                $cliente = $_POST["cliente"];
                $pedido = $_POST["pedido"];
                $observacoes = $_POST["observacoes"];
                $frete = (float)$_POST["frete"];
                $valor_total = (float)$_POST["valor_total"];
                $valor_pago= (float)$_POST["valor_pago"];
                $valor_troco=(float)$_POST["valor_troco"];
                $forma_pagamento=$_POST["forma_pagamento"];
                $data_pedido=$_POST["data_pedido"];
                $valor_pedido = $valor_total-$frete;
                
                $pedido_andamento = array(
                    "cliente"=>$cliente,
                    "pedido"=>$pedido,
                    "observacoes"=>$observacoes,
                    "frete"=>$frete,
                    "valor_total"=>$valor_total,
                    "valor_pago"=>$valor_pago,
                    "valor_troco"=>$valor_troco,
                    "data_pedido"=>$data_pedido,
                    "valor_pedido"=>$valor_pedido,
                    "forma_pagamento"=>$forma_pagamento
                );

                $result = DBcreate("pedidos_andamento",$pedido_andamento);

                if($result){
                    echo("Order Done and In Progress");
                    finaliza_pedido($cliente,$pedido,$frete,$valor_total,$valor_pago,$valor_troco,$data_pedido,$forma_pagamento,$valor_pedido);
                }else{
                    echo("Não foi possível finalizar o pedido");
                }
            }

        // Armazenado informações do pedido no banco de dados quando este for finalizado
            function finaliza_pedido($cliente,$pedido,$frete,$valor_total,$valor_pago,$valor_troco,$data_pedido,$forma_pagamento,$valor_pedido){

                $informacoes_pedido = array(
                    "cliente"=>$cliente,
                    "pedido"=>$pedido,
                    "frete"=>$frete,
                    "valor_total"=>$valor_total,
                    "valor_pago"=>$valor_pago,
                    "valor_troco"=>$valor_troco,
                    "data_pedido"=>$data_pedido,
                    "valor_pedido"=>$valor_pedido,
                    "forma_pagamento"=>$forma_pagamento
                );

                $result = DBcreate("pedidos",$informacoes_pedido);

                if(!$result){
                    echo("Erro ao salvar pedido no histórico");
                }
            }

            // Apagando ou terminando pedido da lista de pedidos em andamento quando este for confirmado
                if(isset($_POST["pedido_finalizado"])){
                    $id_cliente = $_POST["id_cliente"];
                    $result = DBdelete("pedidos_andamento","id_cliente=$id_cliente");

                    if($result){
                        echo("Order Finished");
                        // echo("<script>document.location= 'index.php';</script>");
                    }else{
                        echo("Não foi possível terminar o pedido");
                    }
                }
                
                if(isset($_POST["pedido_cancelado"])){
                    $id_cliente = $_POST["id_cliente"];
                    $result_andamento = DBdelete("pedidos_andamento","id_cliente=$id_cliente");
                    $result_pedido = DBdelete("pedidos","id_cliente=$id_cliente");

                
                    if($result_pedido){
                        echo("O pedido foi cancelado");
                    }else{
                        echo("Não foi possível cancelar o pedido");
                    }
                }

            // Excluindo pedido já feito e salvo no histórico de pedidos
            if(isset($_POST["excluir_pedido"])){
                $id_cliente = $_POST["id_cliente"];
                $result_pedido = DBdelete("pedidos","id_cliente=$id_cliente");

            
                if($result_pedido){
                    echo("O pedido foi excluído");
                }else{
                    echo("Não foi possível excluir o pedido");
                }
            }

        