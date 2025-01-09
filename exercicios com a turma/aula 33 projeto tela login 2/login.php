<?php
//Pegando os dados vindos do formuláio
$login = ($_POST['login']);
$senha = ($_POST['senha']);
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');
//$telefone = addcslashes($_POST['te']);
//addcslashes para uso de string.

//Configurações de credenciais
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'tela_login_formulario';

//Conexão com o banco de dados

$conn = new mysqli($server, $usuario, $senha, $banco);

/*$conn = new mysqli('localhost', 'root', '', 'tela_login_formulario',);*/


//Verificar conexão
if($conn->connect_error){
    die("Falha ao se comunicar com o banco de dados: ".$conn->connect_error);
}
$smtp = $conn->prepare("INSERT INTO mensagens(login, senha, data, hora)VALUES(?,?,?,?)");
$smtp->bind_param("ssss",$login, $senha, $data_atual, $hora_atual);
if($smtp->execute()){
    echo"Mensagem enviada com sucesso!";
}else{
    echo"Erro no envio da mensagem: ".$smtp->error;
}
$smtp->close();
$conn->close();


/*$destinatario = "lecy.barbosa@educacao.mg.gov.br";
$assunto = "Acessar conta -lecy17@gmail.com.br ";
$corpoEmail = "Nome: ".$login. "\n". "Senha: ".$senha;
$cabeca = "From: lecy17@gmail.com.br". "\n". "Reply-to: ".$senha. "\n"."X=Mailer:PHP/".phpversion();
//consulta a última versão do php
//From  = destinatário
if(login($para, $assunto, $corpo, $cabeca)) {
    echo("E-mail enviado com sucesso!");
}else{
    echo("Houve um erro ao enviar o email.");
}*/
?>






