<?php
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Galerias
	</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/bootstrap.css" rel="stylesheet">		
	<link href="css/personalizado.css" rel="stylesheet">
</head>
<body class="view" style="background-color: lightcyan ; ">
	<!--<div class="view" style="background-image: url('imagens/carousel/ (2).jpg'); background-repeat: repeat;background-size: cover;">-->
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
	            	<form style="float: left;" method="post" action="novaGaleria.php">
						<input style="color:blue" type="submit" name="" value="CRIAR GALERIA">
					</form>
					<a style="color:blue; float: right;" href="upload.php"><input type="button" name="" value="FAZER UPLOAD"></a>
	            </div>
	        </div>
	    </nav>
	    <!-- Fim Menu -->
	    <div style="margin-top:60px">
			<div id="conteudo" class="container">
			  <div class="row">
			    	<?php 
			    		/*busca a lista de galerias existentes*/
			    		$galery;
			    		$query_galerias = "SELECT * FROM galerias ORDER BY id ASC";
			    		$result_galerias = mysqli_query($conn, $query_galerias);
			    		/*faz uma repetição para mostrar todas as galerias*/
			    		while($row_galery = mysqli_fetch_assoc($result_galerias)){ 
			    	?>
	    			<div class="col-sm-4" style="text-align: center;">
    					<form action="carrossel.php" method="POST" enctype="multipart/form-data">   
    						<input type="hidden" name="galeria"  value="<?php echo $row_galery['id']?>"> 
    						<input type="hidden" name="tema" value="<?php echo $row_galery['nome']?>">
    						<input class="outra" type="image" out="submit" src="imagens/carousel/<?php echo $row_galery['thumbnail'];?>"></input>
						</form>
						<?php echo $row_galery['nome']; ?>
						<br><br>
	    			</div>
		    		<?php } ?>
			  </div>
			</div>
		</div>
	</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>