<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Phototo</title>
    <link href="css/bootstrap.css" rel="stylesheet">		
    <link href="css/personalizado.css" rel="stylesheet">
</head>
<body onkeypress="tecla(event)">
	<!-- Inicio Menu -->
    <nav id="mainNav" class=" navbar-inverse navbar-fixed-top header-menu"> <!-- navbar -->
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
            </div>
            <div id="navbar" class="navbar-collapse collapse">
            	<h1 style="float: left;"> <?php echo $_POST['tema'];?></h1>
                <a style="color:white" href="index.php"><h1 style="float: right;"> Home </h1></a>
            </div>
        </div>
    </nav>
    <!-- Fim Menu -->
	<div class="espaco-topo">
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
			<ol class="carousel-indicators">
				<?php
					if(isset($_POST['galeria']))
                    {
						$galery = $_POST['galeria'];
					}
					else
					{
						header("Location: index.php");
					}
					$controle_ativo = 2;		
					$controle_num_slide = 1;
					$result_carousel = "SELECT * FROM carrossel WHERE galeria = $galery ORDER BY id ASC";
					$resultado_carousel = mysqli_query($conn, $result_carousel);
					while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
						if($controle_ativo == 2){ ?>
							<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li><?php
							$controle_ativo = 1;
						}else{?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $controle_num_slide; ?>"></li><?php
							$controle_num_slide++;
						}
					}
				?>						
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner" role="listbox">
				<?php
					$controle_ativo = 2;						
					$result_carousel = "SELECT * FROM carrossel WHERE galeria = $galery ORDER BY id ASC";
					$resultado_carousel = mysqli_query($conn, $result_carousel);
					while($row_carousel = mysqli_fetch_assoc($resultado_carousel)){ 
						if($controle_ativo == 2){ ?>
							<div class="item active">
								<img src="imagens/carousel/<?php echo $row_carousel['imagem_carousel'];?>" alt="<?php echo $row_carousel['nome']; ?>" style=" width: 100%">
							</div><?php
							$controle_ativo = 1;
						}else{ ?>
							<div class="item">
								<img src="imagens/carousel/<?php echo $row_carousel['imagem_carousel']; ?>" alt="<?php echo $row_carousel['nome']; ?>" style=" width: 100%" >
							</div> <?php
						}
					}
				?>					
			</div>

			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
	
	<!-- <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script> -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script> src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"</script>
    </script>

    <script type="text/javascript">
    	function tecla(event)
    	{
    		alert(event.which);
    	}
    	/*function tecla(event)
    	{
    		alert("HELP");
        	var x = event.which || event.keyCode ;
        	if (x == 27) 
        	{  // 27 is the ESC key
		    	alert ("You pressed the Escape key!");
		  	}

		  	if (event.shiftKey)
		  	{
		  		alert("SHIFT");
		  	}
	  	}*/
    </script>
</body>
</html>