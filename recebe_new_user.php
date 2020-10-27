<?php
$us_cpf = $_POST["form_cpf"]; 
$us_rg = $_POST["form_rg"]; 
$us_rgm = $_POST["form_rgm"]; 
$us_nome = $_POST["form_nome"]; 
$us_nome_guerra = $_POST["form_nome_guerra"]; 
$us_patente = $_POST["form_patente"]; 
$us_sexo = $_POST["form_sexo"];
$us_endereco = $_POST["form_endereco"];
$us_bairro = $_POST["form_bairro"];
$us_email = $_POST["form_email"];
$us_telefone = $_POST["form_telefone"];
$us_whatsapp = $_POST["form_whatsapp"];
$us_senha = password_hash($_POST["form_senha"], PASSWORD_DEFAULT);
$us_permissao = '0';
$us_status = 'SUSPENSO';

$conexao = mysqli_connect("localhost", "root", "horus4321", "pmapcorreg");
// Check connection
$sql = "SELECT * FROM usuario WHERE us_cpf=$us_cpf";
$result = mysqli_query($conexao, $sql); 

if (mysqli_num_rows($result) > 0) {
  $us_existente = '<div class="alert alert-danger" id="revisao"><strong>Usuário já cadastrado!<a href="form_new_user.php"> Voltar</a></strong></div>';
} else {
  mysqli_query($conexao, "INSERT INTO usuario (us_cpf, us_rg, us_rgm, us_patente, us_nome, us_nome_guerra, us_sexo, us_endereco, us_bairro, us_email, us_telefone, us_whatsapp, us_senha,  us_permissao, us_status) VALUES ('$us_cpf', '$us_rg','$us_rgm', '$us_patente', '$us_nome', '$us_nome_guerra', '$us_sexo', '$us_endereco', '$us_bairro', '$us_email', '$us_telefone', '$us_whatsapp', '$us_senha', '$us_permissao', 'AGUARDANDO')") or die(mysqli_error($conexao));
  $us_existente = '<div class="alert alert-success alert-dismissible" id="revisao"><strong>Usuário cadastrado com sucesso!</strong> Aguarde novas orientações em breve.<a href="http://www.pm.ap.gov.br"> Voltar</a></strong></div>';
}

$sql = "SELECT * FROM usuario WHERE us_cpf=$us_cpf";
$result = mysqli_query($conexao, $sql); 

if (mysqli_num_rows($result) > 0) {

  // output data of each row
    while($row = mysqli_fetch_assoc($result)) { 

?>
<!DOCTYPE html>
  <head>
    <meta http-equiv="content-type" content="text/html, charset=utf-8" />
    <meta http-equiv="content-language" content="pt-br, en-US, fr, en " />  
    <meta name="author" content="1º Tenente Carlos Morais" />
    <meta name="description" content="Denúncias online para a CORREGEDORIA-GERAL" />
    <meta name="keywords" content="corregedoria, PM, PMAP, denúncia" />
    <meta name="generator" content=sublime />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="copyright" content="Governo do Estado do Amapá" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    
    <title>CORREGEDORIA-GERAL DA PMAP - Usuário cadastrado</title>
    <style type="text/css">
    article {
      border: 1px solid silver;
      padding: 15px;
      margin: 10px;
      border-radius: 5px;
      box-shadow: 1px 1px 10px grey; 
    }

    .header {
      border: 1px solid silver;
      padding-top: 15px;
      border-radius: 5px;
      margin: 5px;
    }

    #pheader{color: white;}

    p {
      font-weight: bold;
      text-align: center;}

@media only screen and (max-width: 775px) {
  #brasaocorreg {
    display: none;
  }

  #brasaopm {
    display: none;
  }

  #header {
    background-image: url("pmap.png");
    background-repeat: no-repeat;
    background-blend-mode: lighten;
    background-position: center;
  }

  #pheader{
    color: black;
    font-size: 15px;
  }

  .justificado {text-align: justify;}
}

@media print {
    #noprint {display: none;}
  }
    </style>
  
   </head>
  <body>

<div class="container">

<article>
<div id="header" class="container-fluid header bg-secondary">

<div class="row">  
  <div class="col-sm-4">
    <img src="pmap.png" class="img-fluid" id="brasaopm" style="padding-bottom: 10px">
  </div>
  <div class="col-sm-4 align-self-center">
    <p id="pheader">GOVERNO DO ESTADO DO AMAPÁ<br>
    POLÍCIA MILITAR<br>
    CORREGEDORIA-GERAL<br>
    </p>
  </div>

</article>
</div>

<div class="container">
<article>
<form action="recebe_denuncia.php" method="post">

<div class="container-fluid header bg-secondary"><p class="text-light">DADOS DO USUÁRIO</p></div>

<div class="container-fluid">

<?php echo $us_existente; ?>

  <div class="form-group">
    Nome: <?php echo $row["us_nome"]; ?>
  </div>

  <div class="form-group">
    <?php
  switch ($row["us_patente"]) {
    case "sd":
        echo "Graduação: Soldado";
        break;
    case "cb":
        echo "Graduação: Cabo";
        break;
    case "3sgt":
        echo "Graduação: 3º Sargento";
        break;
    case "2sgt":
        echo "Graduação: 2º Sargento";
        break;
    case "1sgt":
        echo "Graduação: 1º Sargento";
        break;
    case "st":
        echo "Graduação: Sub Tenente";
        break;
    case "cad1":
        echo "Graduação: Cadete 1º ano";
        break;
    case "cad2":
        echo "Graduação: Cadete 2º ano";
        break;
    case "cad3":
        echo "Graduação: Cadete 3º ano";
        break;
    case "asp":
        echo "Graduação: Aspirante";
        break;
    case "2ten":
        echo "Posto: 2º Tenente";
        break;
    case "1ten":
        echo "Posto: 1º Tenente";
        break;
    case "cap":
        echo "Posto: Capitão";
        break;
    case "maj":
        echo "Posto: Major";
        break;
    case "tc":
        echo "Posto: Tenente Coronel";
        break;
    case "cel":
        echo "Posto: Coronel";
        break;
}

    ?>

  </div>

  <div class="form-group">
    Nome de guerra: <?php echo $row["us_nome_guerra"]; ?>
  </div>

  <div class="form-group">
  Sexo: <?php echo $row["us_sexo"]; ?>
  </div>

  <div class="row">
    <div class="col"><div class="form-group">
    CPF: <?php echo $row["us_cpf"]; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    RG: <?php echo $row["us_rg"]; ?>
    </div>
  </div>

    <div class="col"><div class="form-group">
    RGM: <?php echo $row["us_rgm"]; ?>
    </div>
  </div>
  </div>  

  <div class="form-group">
    Endereço: <?php echo $row["us_endereco"]; ?>
  </div>

  <div class="form-group">
    Bairro: <?php echo $row["us_bairro"]; ?>
  </div>

  <div class="form-group">
    E-mail: <?php echo $row["us_email"]; ?>
  </div>

<div class="row">
<div class="col"><div class="form-group">
    Telefone:<?php echo $row["us_telefone"]; ?>
  </div></div>

<div class="col"><div class="form-group">
    Whatsapp: <?php echo $row["us_whatsapp"]; } }?>
  </div></div>
</div>
</div>
</article>
</div>


 </body>
  </html>