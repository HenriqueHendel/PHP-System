<?php
    include_once("seguranca.php");
    protegePagina();

    include_once("DB_config.php");
    include_once("DB_connection.php");
    include_once("DB_funcoes.php");

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Company Name</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <?php
    
        $usuarios = DBread("pedidos",null,"valor_pedido");
        $usuarios_despesas = DBread("despesas",null,"nome,valor,data");

        $lucro=0;
        $qtd_pedidos=0;
        $entradas=0;
        $despesas=0;

        if($usuarios_despesas){
            foreach($usuarios_despesas as $gastos){
                $despesas=$despesas+(float)$gastos["valor"];
            }
        }

        if($usuarios){
            foreach($usuarios as $valores){
                $entradas = $entradas+(float)$valores["valor_pedido"];
                $qtd_pedidos = $qtd_pedidos+1;
            }

            $lucro = $entradas - $despesas;
        }


    ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Expenses</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
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
                            <a class="nav-link" href="index.php"
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
                                    <a class="nav-link" href="novo_pedido.php">New Order</a>
                                    <a class="nav-link" href="pedidos_andamento.php">Orders in Progress</a>
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
                    <div class="container-fluid">
                        <h1 class="mt-4">Expenses</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <h4>Register New Expense</h4>
                            <form action=<?php echo($_SERVER["PHP_SELF"]) ?> method="POST">
                                <div class="col-4">
                                    <input class="form-control" name="despesa" type="text" placeholder="Expense">
                                </div>
                                <div class="col-4 mt-3">
                                    <input class="form-control" name="valor" type="number" placeholder="value">
                                </div>
                                <div class="col-4 mt-4">
                                    <button type="submit" class="btn btn-primary" name="adicionar">Register</button>
                                </div>
                            </form>
                        <hr>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">N° Customers</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <strong><?php echo($qtd_pedidos)?></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Cash-Flow</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <strong>$ <?php echo($entradas)?></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Expenses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <strong>$ <?php echo($despesas)?></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Profit</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <strong>$ <?php echo($lucro)?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i></div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Expense</th>
                                                <th>Value</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Expense</th>
                                                <th>Value</th>
                                                <th>Date</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php 
                                                if($usuarios_despesas){
                                                    foreach($usuarios_despesas as $usuarios_despesa){
                                                        echo('
                                                            <tr>
                                                                <td>'.$usuarios_despesa["nome"].'</td>
                                                                <td>'.$usuarios_despesa["valor"].'</td>
                                                                <td>'.$usuarios_despesa["data"].'</td>
                                                            </tr>
                                                        ');
                                                    }
                                                }else{
                                                    echo("<h2>There Is no Expenses</h2><hr>");
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

<?php 

 if(isset($_POST["adicionar"])){

     $nova_despesa=$_POST["despesa"];
     $despesa_valor=$_POST["valor"];
     $date = date('d/m/Y');
     
     $dados=array(
         "nome"=>$nova_despesa,
         "valor"=>$despesa_valor,
         "data"=>$date
     );

     $result=DBcreate("despesas",$dados);

     if($result){
        echo "<script>document.location='despesas.php'</script>";
     }else{
         echo("Não foi possível adicionar a despesa");
     }
 }

?>