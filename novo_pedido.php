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
        <title>Novo Pedido</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php"> Boka Hamburgueria</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">Settings</a><a class="dropdown-item" href="#">Activity Log</a> -->
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
                            <div class="sb-sidenav-menu-heading">Quadro Geral</div>
                            <a class="nav-link" href="index.php"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Informações</a
                            >
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pedidos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="novo_pedido.php">Novo Pedido</a>
                                    <a class="nav-link" href="pedidos_andamento.php">Pedidos em Andamento</a>
                                </nav>
                            </div>
                            <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            > -->
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuário:</div>
                        Gabriel
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Novo Pedido</h1>
                        <ol class="breadcrumb mb-4">
                        </ol>
                        <form>
                            <div class="form-group mb-5">
                                <label for="cliente">Nome do Cliente</label>
                                <input type="text" class="form-control" id="cliente" placeholder="Nome do Cliente">
                            </div>
                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h3>Promoções</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('01').name,'codigo_01');" name="Combo 1" type="checkbox" class="form-check-input" id="01" value="09.90">
                                        <label class="form-check-label" for="01">Combo 1</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_01" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('02').name,'codigo_02');" name="Combo 2" type="checkbox" class="form-check-input" id="02" value="15.90">
                                        <label class="form-check-label" for="02">Combo 2</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_02" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('03').name,'codigo_03');" name="Combo 3" type="checkbox" class="form-check-input" id="03" value="22.90">
                                        <label class="form-check-label" for="03">Combo 3</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_03" style="display: none;" placeholder="Qtd.">
                                    </div>
                                     <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('04').name,'codigo_04');" name="4 Masters" type="checkbox" class="form-check-input" id="04" value="39.90">
                                        <label class="form-check-label" for="04">4 Masters</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_04" style="display: none;" placeholder="Qtd.">
                                    </div>
                                  <!--  <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('05').name,'codigo_05');" name="Emp. Queijadinha" type="checkbox" class="form-check-input" id="05" value="1.50">
                                        <label class="form-check-label" for="05">Queijadinha</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_05" style="display: none;" placeholder="Qtd.">
                                    </div> -->
                                </div>

                                <div class="col-sm-4 mt-4">
                                    <h3>Hambúrguers</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('06').name,'codigo_06');" name="Boka Mini" type="checkbox" class="form-check-input" id="06" value="5.90">
                                        <label class="form-check-label" for="06">Boka Mini</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_06" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('07').name,'codigo_07');" name="Boka Mini Salada" type="checkbox" class="form-check-input" id="07" value="6.90">
                                        <label class="form-check-label" for="07">Boka Mini Salada</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_07" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('08').name,'codigo_08');" name="Boka Duplo" type="checkbox" class="form-check-input" id="08" value="7.90">
                                        <label class="form-check-label" for="08">Boka Duplo</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_08" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('09').name,'codigo_09');" name="Boka Master" type="checkbox" class="form-check-input" id="09" value="10.99">
                                        <label class="form-check-label" for="09">Boka Master</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_09" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                    <h3>Refrigerante</h3>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('10').name,'codigo_10');" name="Refrigerante 290ml" type="checkbox" class="form-check-input" id="10" value="3.00">
                                        <label class="form-check-label" for="10">Refrigerante 290ml</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_10" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4 mt-4">
                                    <h3>Sequilhos Palitinho</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('11').name,'codigo_11');" name="Seq. Palitinho 100g" type="checkbox" class="form-check-input" id="11" value="3.00">
                                        <label class="form-check-label" for="11">100g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_11" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('12').name,'codigo_12');" name="Seq. Palitinho 200g" type="checkbox" class="form-check-input" id="12" value="6.00">
                                        <label class="form-check-label" for="12">200g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_12" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('13').name,'codigo_13');" name="Seq. Palitinho 500g" type="checkbox" class="form-check-input" id="13" value="15.00">
                                        <label class="form-check-label" for="13">500g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_13" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('14').name,'codigo_14');" name="Seq. Palitinho 1kg" type="checkbox" class="form-check-input" id="14" value="30.00">
                                        <label class="form-check-label" for="14">1kg</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_14" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                <h3>Sequilhos Coração</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('15').name,'codigo_15');" name="Seq. Coração 100g" type="checkbox" class="form-check-input" id="15" value="3.00">
                                        <label class="form-check-label" for="15">100g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_15" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('16').name,'codigo_16');" name="Seq. Coração 200g" type="checkbox" class="form-check-input" id="16" value="6.00">
                                        <label class="form-check-label" for="16">200g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_16" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('17').name,'codigo_17');" name="Seq. Coração 500g" type="checkbox" class="form-check-input" id="17" value="15.00">
                                        <label class="form-check-label" for="17">500g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_17" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('18').name,'codigo_18');" name="Seq. Coração 1kg" type="checkbox" class="form-check-input" id="18" value="30.00">
                                        <label class="form-check-label" for="18">1kg</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_18" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                <h3>Sequilhos Casadinho</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('19').name,'codigo_19');" name="Seq. Casadinho 100g" type="checkbox" class="form-check-input" id="19" value="5.00">
                                        <label class="form-check-label" for="19">100g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_19" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('20').name,'codigo_20');" name="Seq. Casadinho 250g" type="checkbox" class="form-check-input" id="20" value="8.00">
                                        <label class="form-check-label" for="20">250g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_20" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('21').name,'codigo_21');" name="Seq. Casadinho 500g" type="checkbox" class="form-check-input" id="21" value="16.00">
                                        <label class="form-check-label" for="21">500g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_21" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('22').name,'codigo_22');" name="Seq. Casadinho 1kg" type="checkbox" class="form-check-input" id="22" value="32.00">
                                        <label class="form-check-label" for="22">1kg</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_22" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-sm-4 mt-4">
                                <h3>Pavê</h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('23').name,'codigo_23');" name="Pave peq." type="checkbox" class="form-check-input" id="23" value="10.00">
                                        <label class="form-check-label" for="23">Pequeno</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_23" style="display: none;" placeholder="Qtd.">
                                    </div>
                                    <div class="form-check mt-3">
                                        <input onclick="checkbox_marcado(document.getElementById('24').name,'codigo_24');" name="Pave grande" type="checkbox" class="form-check-input" id="24" value="18.00">
                                        <label class="form-check-label" for="24">Grande</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_24" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>

                                <div class="col-sm-4 mt-4">
                                <h3>Saquinho de Brownie </h3>
                                    <div class="form-check">
                                        <input onclick="checkbox_marcado(document.getElementById('25').name,'codigo_25');" name="Brownie 80g" type="checkbox" class="form-check-input" id="25" value="5.00">
                                        <label class="form-check-label" for="25">Brownie 80g</label>
                                        <br>
                                        <input type="number" class="form-control" id="codigo_25" style="display: none;" placeholder="Qtd.">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row sm-4 mt-3">
                                <div class="col-sm-12">
                                    <div class="form-group mt-3">
                                        <h3>Observações do Cliente</h3>
                                        <textarea style="height:100px;" name="observacao" class="form-control" id="observacao" placeholder="Observações do Cliente"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group mt-3">
                                        <h3>Informe o Frete</h3>
                                        <input type="text" name="frete" class="form-control" id="frete" placeholder="Valor do Frete">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-sm-6">
                                    <a style="color: #fff;" onclick="gerar_nota();" class="btn btn-primary">Gerar Nota</a>
                                </div>
                            </div>
                            
                            <div class="row mt-2">
                                <div class="col-sm-6">
                                    <a style="color: #fff;" onclick="excluir_pedido();" class="btn btn-danger">Excluir Pedido</a>
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
                            <div class="text-muted">Copyright &copy; Boka Hamburgueria 2020</div>
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
