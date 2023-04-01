<!--<button class="sair"> <a href="./login.php">Sair</a> </button>
        <h3>#title</h3> -->

        

<!DOCTYPE html>
<html>
<head>
        <link rel="stylesheet" href="../style/reset.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
        <title><?php echo $title; ?></title>
        <style>
                .sair{
                                            
                
                }
                .sair :hover{
                        
                }
        </style>
  <!-- outros elementos do cabeçalho, como links de estilo CSS, scripts JS, etc. -->
</head>
<body>
        <header style="text-align": center; display: flex; justify-content: center; align-items: center; flex-direction: column;>
                <h3><?php echo $title; ?></31>
                
        </header>
                <script >
			date = new Date().toLocaleDateString();	document.write(date);
		</script>
                    <script>
                        function goBack() { window.history.back(); }
                </script>


<button class="sair" onclick="goBack()">Sair</button>


                
        