<?php 
  include_once("seguranca.php");
  protegePagina();
?>

<?php 

// Abrindo a conexão com o MySQL
    function DBconnect(){
        $link = @mysqli_connect(DB_hostname, DB_username, DB_password, DB_database) or die(mysqli_connect_error());

        return $link;
    }

// Fechando a conexão com o MySQL
    function DBclose($link){
        @mysqli_close($link) or die(mysqli_error($link));
    }

?> 