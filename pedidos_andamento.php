<?php
    include_once("seguranca.php");
    protegePagina();
    include_once("DB_config.php");
    include_once("DB_connection.php");
    include_once("DB_funcoes.php");

    $infos_pedido = DBread("pedidos_andamento",null,"id_cliente,cliente,pedido,observacoes");
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Orders in Progress</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Company Name</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul> 
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="./index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Company Informations</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Orders
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="./novo_pedido.php">New Order</a>
                                    <a class="nav-link" href="./pedidos_andamento.php">Orders in Progress</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="despesas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Expenses</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">User:</div>
                        User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <h3>Orders in Progress</h3>
                    <hr>
                        <table class="table table-striped table-advance table-hover">
                            <tbody>
                                <tr>
                                <th>Customer</th>
                                <th>Order</th>
                                <th>Observations</th>
                                <th>Finish Order</th>
                                <th>Delete Order</th>
                                </tr>
                                <?php 
                                    if($infos_pedido){
                                        foreach($infos_pedido as $info_pedido){
                                            $id_cliente = $info_pedido["id_cliente"];
                                            $cliente = $info_pedido["cliente"];
                                            $pedido = $info_pedido["pedido"];
                                            $observacoes = $info_pedido["observacoes"];
    
                                            echo('<tr>');
                                            echo('<td>'.$cliente.'</td>');
                                            echo('<td>'.$pedido.'</td>');
                                            echo('<td>'.$observacoes.'</td>');
                                            echo("<td><button class='btn btn-primary' onclick='pedido_finalizado($id_cliente,\"pedido finalizado\");'>Finish Order</button></td>");
                                            echo("<td><button class='btn btn-danger' onclick='pedido_excluido($id_cliente,\"pedido cancelado\");'>Delete Order</button></td>");
                                            echo('</tr>');
                                        }
                                    }else{
                                        echo("<h2>There is no Order in Progress</h2>");
                                    }
                                ?>
                            </tbody>
                        </table>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Company Name 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/pedidos_andamento.js"></script>
    </body>
</html>
