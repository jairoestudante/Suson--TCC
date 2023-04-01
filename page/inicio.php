
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/reset.css">
    <link rel="stylesheet" href="../style/style.css">
    <script src="https://kit.fontawesome.com/46655aa59e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    <title>Carteira de Vacinas</title>
</head>
<header>        
        <?php $title = "Carteira de Vacinas";
         include 'cabecalho.php';
         ?>
    </header>
<body class="cadastrar">
    
    <main class="menu">
        
       <il class="opcoes">
                          
            <a href="./vacinas.php" style="font-size: 16px" > <button class="fa-solid fa-syringe" style="font-size: 50px;"><br><br>Vacinas</a></button>          
                            
            <a href="./agenda.php" style="font-size: 16px"><button class="fa-solid fa-calendar-days"  style="font-size: 50px;"><br><br>Agenda</a></button>
                          
            <a href="./mapa.php" style="font-size: 16px"><button class="fa-solid fa-map-location-dot" style="font-size: 50px;"><br><br> Mapa UBS </a></button>
           
            <a href="./dependentes.php" style="font-size: 16px"><button class="fa-solid fa-family"  style="font-size: 50px;"><span class="material-symbols-outlined" style="font-size: 50px">
                    family_restroom</span><br><br>Dependentes</a></button>
           
            <a href="./campanhas.php" style="font-size: 16px"><button><span class="material-symbols-outlined" style="font-size: 50px;">info</span><br><br>Campanhas</a></button>
            
            <a href="./cadastro.php" style="font-size: 16px"><button><span class="material-symbols-outlined" style="font-size: 50px;">person_add</span><br><br>Cadastrar</a> </button>
            
        </il>   
          
    </main>
    
    
    
   
    
</body>

<?php 
        require_once("rodape.php");
        ?>
        
</html>