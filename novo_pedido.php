<?php
  include_once("seguranca.php");
  protegePagina();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>New Order</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"> Company Name</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
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
                                    <a class="nav-link" href="pedidos_andamento.php">Orders in progress</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="despesas.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Expenses</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">User: </div>
                        User
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">New Order</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <form>
                            <div class="form-group mb-5">
                                <label for="cliente">Customer Name</label>
                                <input type="text" class="form-control" id="cliente" placeholder="Customer Name">
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h3>Promotions</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('01').name,'codigo_01');" name="Promotion 1" type="checkbox" class="form-check-input" id="01" value="09.90">
                                        <label class="form-check-label" for="01">Promotion 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_01" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('02').name,'codigo_02');" name="Promotion 2" type="checkbox" class="form-check-input" id="02" value="15.90">
                                        <label class="form-check-label" for="02">Promotion 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_02" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('03').name,'codigo_03');" name="Promotion 3" type="checkbox" class="form-check-input" id="03" value="22.90">
                                        <label class="form-check-label" for="03">Promotion 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_03" style="display: none;" placeholder="Qtd.">
                                    </div>
                                     <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('04').name,'codigo_04');" name="Promotion 4" type="checkbox" class="form-check-input" id="04" value="39.90">
                                        <label class="form-check-label" for="04">Promotion 4</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_04" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                    <h3>Burguers</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('06').name,'codigo_06');" name="Burguer 1" type="checkbox" class="form-check-input" id="06" value="5.90">
                                        <label class="form-check-label" for="06">Burguer 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_06" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('07').name,'codigo_07');" name="Burguer 2" type="checkbox" class="form-check-input" id="07" value="6.90">
                                        <label class="form-check-label" for="07">Burguer 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_07" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('08').name,'codigo_08');" name="Burguer 3" type="checkbox" class="form-check-input" id="08" value="7.90">
                                        <label class="form-check-label" for="08">Burguer 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_08" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('09').name,'codigo_09');" name="Burguer 4" type="checkbox" class="form-check-input" id="09" value="10.99">
                                        <label class="form-check-label" for="09">Burguer 4</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_09" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                    <h3>Drinks</h3>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('101').name,'codigo_101');" name="Coffe" type="checkbox" class="form-check-input" id="101" value="3.00">
                                        <label class="form-check-label" for="101">Coffe</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_101" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('102').name,'codigo_102');" name="Juice" type="checkbox" class="form-check-input" id="102" value="3.00">
                                        <label class="form-check-label" for="102">Juice</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_102" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('103').name,'codigo_103');" name="Soda" type="checkbox" class="form-check-input" id="103" value="3.00">
                                        <label class="form-check-label" for="103">Soda</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_103" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('104').name,'codigo_104');" name="Water" type="checkbox" class="form-check-input" id="104" value="3.00">
                                        <label class="form-check-label" for="104">Water</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_104" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h3>BreakFast</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('11').name,'codigo_11');" name="BreakFast 1" type="checkbox" class="form-check-input" id="11" value="3.00">
                                        <label class="form-check-label" for="11">BreakFast 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_11" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('12').name,'codigo_12');" name="BreakFast 2" type="checkbox" class="form-check-input" id="12" value="6.00">
                                        <label class="form-check-label" for="12">BreakFast 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_12" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('13').name,'codigo_13');" name="BreakFast 3" type="checkbox" class="form-check-input" id="13" value="15.00">
                                        <label class="form-check-label" for="13">BreakFast 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_13" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('14').name,'codigo_14');" name="BreakFast 4" type="checkbox" class="form-check-input" id="14" value="30.00">
                                        <label class="form-check-label" for="14">BreakFast 4</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_14" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                <h3>Lunch</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('15').name,'codigo_15');" name="Lunch 1" type="checkbox" class="form-check-input" id="15" value="3.00">
                                        <label class="form-check-label" for="15">Lunch 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_15" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('16').name,'codigo_16');" name="Lunch 2" type="checkbox" class="form-check-input" id="16" value="6.00">
                                        <label class="form-check-label" for="16">Lunch 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_16" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('17').name,'codigo_17');" name="Lunch 3" type="checkbox" class="form-check-input" id="17" value="15.00">
                                        <label class="form-check-label" for="17">Lunch 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_17" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('18').name,'codigo_18');" name="Lunch 4" type="checkbox" class="form-check-input" id="18" value="30.00">
                                        <label class="form-check-label" for="18">lunch 4</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_18" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                <h3>Dinner</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('19').name,'codigo_19');" name="Dinner 1" type="checkbox" class="form-check-input" id="19" value="5.00">
                                        <label class="form-check-label" for="19">Dinner 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_19" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('20').name,'codigo_20');" name="Dinner 2" type="checkbox" class="form-check-input" id="20" value="8.00">
                                        <label class="form-check-label" for="20">Dinner 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_20" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('21').name,'codigo_21');" name="Dinner 3" type="checkbox" class="form-check-input" id="21" value="16.00">
                                        <label class="form-check-label" for="21">Dinner 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_21" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('22').name,'codigo_22');" name="Dinner 4" type="checkbox" class="form-check-input" id="22" value="32.00">
                                        <label class="form-check-label" for="22">Dinner 4</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_22" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h3>Desserts</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('23').name,'codigo_23');" name="Dessert 1" type="checkbox" class="form-check-input" id="23" value="10.00">
                                        <label class="form-check-label" for="23">Dessert 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_23" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('24').name,'codigo_24');" name="Dessert 2" type="checkbox" class="form-check-input" id="24" value="18.00">
                                        <label class="form-check-label" for="24">Dessert 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_24" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>


                            </div>
                            
                            <div class="row sm-4 mt-3">
                                <div class="col-sm-12">
                                    <div class="form-group mt-3">
                                        <h3>Customer Observations</h3>
                                        <textarea style="height:100px;" name="observacao" class="form-control" id="observacao" placeholder="Customer Observations"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-3">
                                        <h3>Shipping Rate</h3>
                                        <input type="text" name="frete" class="form-control" id="frete" placeholder="Shipping Rate">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-3">
                                        <h3>Discount</h3>
                                        <input type="text" name="desconto" class="form-control" id="desconto" placeholder="Tap the Discount">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <a style="color: #fff;" onclick="gerar_nota();" class="btn btn-primary">Calculate Order</a>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <a style="color: #fff;" onclick="excluir_pedido();" class="btn btn-danger">Delete Order</a>
                                </div>
                            </div>
                        </form>

                        <br>

                        <div class="row mt-4">
                            <div class="col-sm-6" id="descricao">

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
    </body>
    <script src="./js/pedidos.js"></script>
</html>
