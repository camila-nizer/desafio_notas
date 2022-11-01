<?php
	if(isset($_POST ['vazio'])&& !empty($_POST['vazio'])){

    include("conexao.php");
	$vazio=$_POST['vazio'];

    if($vazio=='Cadastrar_Professor'){
        $nome_professor=$_POST['nome_professor'];
        $cpf=$_POST ['cpf'];
        $nascimento=$_POST['nascimento'];
        
        $validador="SELECT * FROM professores where cpf='$cpf'";
        $resposta_validador=mysqli_query($conexao, $validador) or die ("Erro");
        $array_resposta_validador= mysqli_fetch_array($resposta_validador);

    
        if(($array_resposta_validador)!= null && count($array_resposta_validador)>0){
            echo "<script> alert('Erro: CPF já cadastrado');location.href='index.php';</script>";

        }

        else{
            $sql="INSERT INTO professores (nome_professor, cpf, nascimento) 
                VALUES ('$nome_professor', '$cpf', '$nascimento')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Professor cadastrado com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }
        }
    }


    if($vazio=='Cadastrar_Aluno'){
        $nome_aluno=$_POST['nome_aluno'];
        $cpf=$_POST ['cpf'];
        $nascimento=$_POST['nascimento'];
        	
        $validador="SELECT * FROM alunos where cpf='$cpf'";
        $resposta_validador=mysqli_query($conexao, $validador) or die ("Erro");
        $array_resposta_validador= mysqli_fetch_array($resposta_validador);

        
        if(($array_resposta_validador)!= null && count($array_resposta_validador)>0){
            echo "<script> alert('Erro: CPF/CNPJ já cadastrado');location.href='index.php';</script>";

        }

        else{
            $sql="INSERT INTO alunos (nome_aluno, cpf, nascimento) 
                VALUES ('$nome_aluno', '$cpf', '$nascimento')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Aluno cadastrado com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }
        }
    }


    if($vazio=='Cadastrar_Disciplina'){
        $nome_disciplina=$_POST['nome_disciplina'];
        $carga_horaria=$_POST ['carga_horaria'];
        $id_professor_fk=$_POST['id_professor'];
            
        $sql="INSERT INTO disciplinas (nome_disciplina, carga_horaria, id_professor_fk) 
                VALUES ('$nome_disciplina', '$carga_horaria', '$id_professor_fk')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Disciplina cadastrada com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }
    }

    if($vazio=='Cadastrar_Turma'){
        $ano_letivo=$_POST['ano_letivo'];
        $sala=$_POST ['sala'];

            
        $sql="INSERT INTO turma (ano_letivo, sala) 
                VALUES ('$ano_letivo', '$sala')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Turma cadastrada com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }
    }

    if($vazio=='Cadastrar_Notas'){
        $id_aluno_fk=$_POST['id_aluno'];
        $id_turma_fk=$_POST['id_turma'];
        $id_disciplina_fk=$_POST['id_disciplina'];
        $notas=$_POST['nota'];
        $status='ativo';


        for($i=0; $i<6; $i++){
            $aux_id_disciplina=$id_disciplina_fk[$i];
            $aux_notas=$notas[$i];

            $sql="INSERT INTO alunos_disciplinas (id_aluno_fk,id_turma_fk,id_disciplina_fk,nota,status)
                VALUES ('$id_aluno_fk','$id_turma_fk','$aux_id_disciplina','$aux_notas','$status')";

            if(mysqli_query($conexao, $sql)){
                echo "<html> <head></head><body>
                    <script> alert('Notas cadastradas com sucesso!'); location.href='index.php';</script>
                    </body>
                    </html>";

            }
            else{
                echo "Erro".mysqli_connect_error($conexao);
            }

        }

        
    }









    
    mysqli_close($conexao);
    }
    else{
        echo"Acesso negado.";
    }

?>
