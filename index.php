<?php
    include('conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Médias</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="professor_disciplina">

        <div class="cadastro_professor">
            <form action="cadastro.php" method="POST">
                <b><u><center>Cadastro Professor (a)</center></u></b>
                <label for="">Nome completo: </label>
                <input type="text" name="nome_professor" required>
                <br />
                <label for="">CPF </label>
                <input type="text" name="cpf" maxlength="11" size="11" pattern="[0-9]{11}">
                <br />
                <label for="">Data de Nascimento </label>
                <input type="date" name="nascimento">
                <br />
                <input type='submit' name='vazio' value='Cadastrar_Professor'>
            </form>
        </div>

        <div class="cadastro_disciplina">
            <form action="cadastro.php" method="POST">
                <center><b><u>Cadastro Disciplina</u></b></center>
                <label for="">Nome da Disciplina: </label>
                <input type="text" name="nome_disciplina" required>
                <br />
                <label for="">Carga Horária: </label>
                <input type="text" name="carga_horaria" size="3" maxlength="3"> horas.
                <br/>
                <label for="">Professor (a) </label>
                <select name="id_professor">
                    <?php
                    include('conexao.php');

                    $sql = "SELECT * FROM professores";
                    $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                    while ($registro = mysqli_fetch_array($resultado)) {
                        $id_professor = $registro['id_professor'];
                        $nome_professor = $registro['nome_professor'];
                        echo "<option value='$id_professor'> $nome_professor </option>";
                    }
                    ?>
                </select>
                <br/>
                <input type='submit' name='vazio' value='Cadastrar_Disciplina'>
                <br />
            </form>
        </div>
        <hr/>

    </div>

    <div class="turma_aluno">

        <div class="cadastro_turma">
            <center><b><u>Cadastro Turma</u></b></center>
            <form action="cadastro.php" method="POST">
                <label for="">Ano letivo: </label>
                <input type="text" size="4" maxlength="4" name="ano_letivo" required>
                <br/>
                <label for="">Sala </label>
                <input type="text" name="sala"  size="5"  required>
                <br/>
                <input type='submit' name='vazio' value='Cadastrar_Turma'>
            </form>
        </div>

        <div class="cadastro_aluno">
            <center><b><u>Cadastro Aluno</u></b></center>
            <form action="cadastro.php" method="POST">
                <label for="">Nome completo: </label>
                <input type="text" name="nome_aluno" required>
                <br />
                <label for="">CPF </label>
                <input type="text" name="cpf" maxlength="11" size="11" pattern="[0-9]{11}|[0-9]{14}">
                <label for="">Data de Nascimento </label>
                <input type="date" name="nascimento">
                <br />
                <input type='submit' name='vazio' value='Cadastrar_Aluno'>
            </form>
        </div>
        <hr/>
    </div>

    <div class="cadastro_notas">
        <b><u>Cadastro Notas</u></b>
        <form action="cadastro.php" method="POST">
            <label for="">Aluno </label>
            <select name="id_aluno">
                <?php
                include('conexao.php');
 
                $sql = "SELECT * FROM alunos";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_aluno = $registro['id_aluno'];
                    $nome_aluno = $registro['nome_aluno'];
                    $cpf = $registro['cpf'];
                    echo "<option value='$id_aluno'> $nome_aluno </option>";
                }
                ?>
            </select>
            
            <label for="">Turma: </label>
            <select name="id_turma">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM turma";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_turma = $registro['id_turma'];
                    $sala=$registro['sala'];
                    echo "<option value='$id_turma'> $sala </option>";
                }
                ?>
            </select>
            <br/>
            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>

            <label for="">Média 1 </label>
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">
            <br/>
            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>

            <label for="">Média 2 </label>
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">
            <br/>

            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>

            <label for="">Média 3 </label> 
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">
            <br/>

            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>
            <label for="">Média 4 </label>
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">
            <br/>

            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>
            <label for="">Média 5 </label>
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">

            <br />
            <label for="">Disciplina </label>
            <select name="id_disciplina[]">
                <?php
                include('conexao.php');

                $sql = "SELECT * FROM disciplinas";
                $resultado = mysqli_query($conexao, $sql) or die("Erro ao tentar acessar registro");
                while ($registro = mysqli_fetch_array($resultado)) {
                    $id_disciplina = $registro['id_disciplina'];
                    $nome_disciplina=$registro['nome_disciplina'];
                    echo "<option value='$id_disciplina'> $nome_disciplina </option>";
                }
                ?>
            </select>

            <label for="">Média 6 </label>
            <input type="text" step=".01" maxlength="4" size="5" name="nota[]">
            <br />
            <input type='submit' name='vazio' value='Cadastrar_Notas'>
        </form>
    </div>
    <hr/>
    <center>
    <?php
        echo"<a href='lista_exibicao.php'><button>Exibir cadastros</button></a>";
    ?>
    </center>
    

</body>

</html>