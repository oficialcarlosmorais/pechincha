<?php
//Usuário não autenticado
if ($_SESSION['id'] == '' or $_SESSION['nome'] == '' or $_SESSION['pessoa'] == ''){
  session_unset();
  session_destroy();
  header('Location: index.php?error1');

}

//Expirou o tempo da sessão
if ($_GET['error'] == '2'){
  session_unset();
  session_destroy();
  header('Location: correg_login.php?error=2');
}

//sair
if ($_GET['exit']==1) {
  session_unset();
  session_destroy();
  header('Location: correg_login.php');
}

?>