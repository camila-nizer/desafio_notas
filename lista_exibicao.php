<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sistema de Médias</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php

            function lista_professores(){
                include('conexao.php');

                echo "<table border=1>";
                echo "<tr>";
                echo "<th> Professor </th>";
                echo "<th> CPF </th>";
                echo "<th> Data Nasc. </th>";
                echo "</tr>";

                $sql="SELECT * FROM professores";
                $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)){
                    $nome_professor=$registro['nome_professor']; 
                    $cpf=$registro['cpf'];
                    $nascimento=$registro['nascimento'];
                    $nascimento = date_create($nascimento);
                    $nascimento = date_format($nascimento, 'd-m-Y');
                    echo"<tr>";
                    echo "<td>".$nome_professor."</td>";
                    echo "<td>".$cpf."</td>";
                    echo "<td>".$nascimento."</td>";
                    echo "</tr>";
                    }

            }


            function lista_disciplinas(){
                include('conexao.php');


                echo "<table border=1>";
                echo "<tr>";
                echo "<th> Disciplina </th>";
                echo "<th> Carga Horária </th>";
                echo "<th> Professor </th>";
                echo "</tr>";

                $sql="SELECT * FROM disciplinas INNER JOIN professores on id_professor = id_professor_fk ";
                $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)){
                    $nome_disciplina=$registro['nome_disciplina']; 
                    $carga_horaria=$registro['carga_horaria'];
                    $id_professor=$registro['id_professor'];
                    $nome_professor=$registro['nome_professor'];

                    echo"<tr>";
                    echo "<td>".$nome_disciplina."</td>";
                    echo "<td>".$carga_horaria."</td>";
                    echo "<td>".$nome_professor."</td>";
                    echo "</tr>";
                    }

            }


            function lista_turmas(){
                include('conexao.php');


                echo "<table border=1>";
                echo "<tr>";
                echo "<th> Turma </th>";
                echo "<th> Ano Letivo </th>";
                echo "<th> Sala </th>";
                echo "</tr>";

                $sql="SELECT * FROM turma";
                $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)){
                    $id_turma=$registro['id_turma'];
                    $ano_letivo=$registro['ano_letivo']; 
                    $sala=$registro['sala'];

                    echo"<tr>";
                    echo"<td>".$id_turma."</td>";
                    echo "<td>".$ano_letivo."</td>";
                    echo "<td>".$sala."</td>";
                    echo "</tr>";
                    }

            }

            function lista_alunos(){
                include('conexao.php');


                echo "<table border=1>";
                echo "<tr>";
                echo "<th> Aluno </th>";
                echo "<th> CPF </th>";
                echo "<th> Data Nasc. </th>";
                echo "</tr>";

                $sql="SELECT * FROM alunos";
                $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)){
                    $nome_aluno=$registro['nome_aluno']; 
                    $cpf=$registro['cpf'];
                    $nascimento=$registro['nascimento'];

                    $nascimento = date_create($nascimento);
                    $nascimento = date_format($nascimento, 'd-m-Y');
                    echo"<tr>";
                    echo "<td>".$nome_aluno."</td>";
                    echo "<td>".$cpf."</td>";
                    echo "<td>".$nascimento."</td>";
                    echo "</tr>";
                    }

            }

            function lista_notas(){
                include('conexao.php');


                echo "<table border=1>";
                echo "<tr>";
                echo "<th> ID </th>";
                echo "<th> Aluno </th>";
                echo "<th> Disciplina </th>";
                echo "<th> Nota </th>";
                echo "<th> Turma </th>";
                echo "</tr>";

                $sql="SELECT * FROM alunos_disciplinas 
                INNER JOIN alunos on id_aluno = id_aluno_fk 
                INNER JOIN turma on id_turma = id_turma_fk 
                INNER JOIN disciplinas on id_disciplina = id_disciplina_fk  where status='ativo'";
                $resultado= mysqli_query($conexao, $sql) or die ("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)){
                    $id_alunos_disciplinas=$registro['id_alunos_disciplinas'];
                    $nome_aluno=$registro['nome_aluno'];
                    $nome_disciplina=$registro['nome_disciplina']; 
                    $nota=$registro['nota'];
                    $id_turma=$registro['id_turma'];
                    $sala=$registro['sala'];


                    echo"<tr>";
                    echo"<td>".$id_alunos_disciplinas."</td>";
                    echo"<td>".$nome_aluno."</td>";
                    echo "<td>".$nome_disciplina."</td>";
                    echo "<td>".$nota."</td>";
                    echo "<td>".$id_turma."</td>";
                    echo "<td>"."<form action='confirma_apagar.php' method='GET'> 
                    <button>Apagar<input type='hidden' name='opcao' value='$id_alunos_disciplinas'></buttom> </form>"."</td>";
                    echo "</tr>";
                    }

            }

            echo"<center><a href='index.php'><button>Página Inicial</button></a></center>";
                

            lista_professores();
            echo"<br/>";

            lista_disciplinas();
            echo"<br/>";

            lista_turmas();
            echo"<br/>";

            lista_alunos();
            echo"<br/>";

            lista_notas();
            echo"<br/>";

        ?>

    </body>
</html>

