<?php

require_once "config.php";
 
$nome = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $input_nome = trim($_POST["nome"]);
    $nome = $input_nome;       
    
    $sql = "INSERT INTO produtos (nome) VALUES (?)";
         
    if($stmt = mysqli_prepare($link, $sql)){
        
    $p_nome = $nome;

        mysqli_stmt_bind_param($stmt, "s", $p_nome);
            
        if(mysqli_stmt_execute($stmt)){
            header("location: index.php");
            exit();
        } else{
            echo "Algo deu errado, tente mais tarde.";
        }
    }
         
    mysqli_stmt_close($stmt);
   
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Criar um novo Produto</h2>
                    </div>
                    <p>Preencha o campo com o nome do produto.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>">                            
                        </div>
                        <input type="submit" class="btn btn-primary" value="Criar">
                        <a href="index.php" class="btn btn-default">Cancelar</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>