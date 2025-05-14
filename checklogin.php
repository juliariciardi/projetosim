<?php
session_start();

$user = $_POST['user'];
$password = $_POST['pass'];
$senha_hash = hash('sha256', $password);

$connect = mysqli_connect('localhost', 'root', 'root','SIM') or die('Erro ao abrir a ligação.');

$sql = "SELECT * FROM USERS WHERE username = '$user' AND password = '$senha_hash'";
$result = mysqli_query($connect, $sql) or die(mysqli_error($connect));

if (mysqli_num_rows($result) == 1) {
    $_SESSION['authUser']=1;
} else {
    $_SESSION['authUser']= 0;
}
include("header.php");

if (isset($_SESSION['authUser']) and $_SESSION['authUser'] ==1) {
    echo "Login bem sucedido!";
} else  {
    echo "Login falhou!";
    ?>
    <div class="login">
        <h2>Autenticação do Utilizador</h2>
        <form action="checklogin.php" method="POST">
            <p>Utilizador:<input type="text" name="user" required></p>
            <p>Password:<input type="password" name="pass" required></p>
            <p><button type="submit">Enviar</button></p>
        </form>
    </div>
<?php }?>
<?php include("footer.php");?>