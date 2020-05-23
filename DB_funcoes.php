<?php 
  include_once("seguranca.php");
  protegePagina();
?>

<?php 
// Deleta registros 
function DBdelete($table, $where = null){
    $where = ($where) ? " where ".$where : null;

    $query = "delete from ".$table.$where;
    return DBexecute($query);
}


// Altera registros
function DBupdate($tabela, array $data, $where = null){
    foreach($data as $key => $value){
        $mudanca[] = $key." = '".$value."'"; 
    }

    $mudanca = implode(", ", $mudanca);
    $where = ($where) ? " WHERE ".$where : null;

    $query = "UPDATE ".$tabela." SET ".$mudanca.$where;
    return DBexecute($query);
}


// lendo registros
        function DBread($table,$params=null,$campos="*"){
            if($params){
                $params = " ".$params;
            }
            $query = "SELECT ".$campos." FROM ".$table.$params;
            $result = DBexecute($query);

            if(!mysqli_num_rows($result)){
                return false;
            }else{
                while($res = mysqli_fetch_assoc($result)){
                    $data[] = $res;
                }
            }
            return $data;
        }


// Grava registro (insere na query os campos e valores, passados através de um array)
function DBcreate($table, array $data){

    $campos = implode(",", array_keys($data));
    $valores = "'".implode("', '", $data)."'";
    $query = "insert into ".$table." (".$campos." ) values ( ".$valores." )";

    return DBexecute($query);
}


// Executando querys
        function DBexecute($query){
            $link = DBconnect();
            $result = mysqli_query($link, $query) or die(mysqli_error($link));


            DBclose($link);

            return $result; //True or False
        }


?>