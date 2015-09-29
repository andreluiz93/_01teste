<?php 

require '../sql_commands.php';

$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$acesso = $_POST['access'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$bairro = $_POST['bairro'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$telefone = $_POST['telefone'];
$celular = $_POST['celular'];

if (!($nome) || !($usuario) || !($senha) || $acesso == 'n' || !($email) || !($cpf)
	|| !($endereco) || !($numero) || !($complemento) || !($bairro) || !($cep)
	|| !($cidade) || !($estado) || !($telefone) || !($celular))
    {
        echo "nullFields";
        return;
}
 
$insert = SQL::insertUsers($nome, $usuario, md5($senha), $email, 
                    $cpf, $endereco, $numero, $complemento, $bairro, $cep, 
                    $cidade, $estado, $telefone, $celular, $acesso);

if($insert) 
    echo 'success';
else 
    echo 'other';

?>