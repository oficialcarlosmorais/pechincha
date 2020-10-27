<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {
  border: 3px solid #f1f1f1;
  border-radius: 20px;
box-shadow: 10px 10px 5px #000000;
  width: 30%;
  margin: auto;
  width: 30%;

  }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;


}

span.psw {
  float: right;
  padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 500px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
  form{width: 90%;}
}
</style>
</head>
<main>
<body>

<h2 align="center">Login</h2>

<form action="login.php" method="post">
  <div class="imgcontainer">
   <!-- <img src="img_avatar2.png" alt="Avatar" class="avatar">-->
  </div>

  <div class="container">
    <label for="cpf"><b>Usuário</b></label>
    <input type="text" placeholder="Usuário" name="cpf" required>

    <label for="senha"><b>Senha</b></label>
    <input type="password" placeholder="Senha" name="senha" required>
        
    <button type="submit" name="btn_login">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Lembrar
    </label>
  </div>

</form>

</body>
</main>
</html>
