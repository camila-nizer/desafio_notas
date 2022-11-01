<?php
	include("conexao.php");

    $resposta=$_GET['apagar'];


    $comandodeletar= "UPDATE alunos_disciplinas SET status='inativo' WHERE id_alunos_disciplinas=$resposta";
    $resultado= mysqli_query($conexao, $comandodeletar);

    if($resultado==false){
        echo"falhou";

    }
    else{
        header("Refresh: 0; url=lista_exibicao.php");
    }


    mysqli_close($conexao);
?>