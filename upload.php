<?php
	include_once("conexao.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload de imagens</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
</head>

<body style="background-color: lightcyan">
	<div class="container">
		<h2 style="float: right;"><a style="color:black	" href="index.php">Home</a></h2>
		<h2><strong>Envio de imagens</strong></h2>
		<hr>
			<form method="post" action="novaGaleria.php">
				<input type="submit" name="" value="CRIAR GALERIA">
			</form>
			<form method="POST" enctype="multipart/form-data">		
				<div>
					<label for="">Enviar imagem:</label>
					<input type="file" name="pic" accept="image/*" class="form-control" required>
					<br>
					<label for="">Escreva um nome para a foto:</label>
					<input type="text" name="nome" placeholder="Nome da foto" class="form-control" required>

					<br>
					<label for="">Selecione uma galeria:</label> 

					<select name="galeria" class="form-control" id="sel1">
						<?php
							$galery;
							$query_galerias = "SELECT * FROM galerias ORDER BY id ASC";
							$result_galerias = mysqli_query($conn, $query_galerias);
							while($row_galery = mysqli_fetch_assoc($result_galerias)){
						?>
							<option name="galeria" value="<?php echo $row_galery['id']?>">
								<?php echo $row_galery['nome'] ?>
							</option>

						<?php } ?>
					</select>
					<div align="center">
						<button type="submit" class="btn btn-success">Enviar imagem</button>
					</div>
				</div>
			</form>
		
		<hr>
		
		<?php
		if(isset($_FILES['pic']))
		{
		$ext = strtolower(substr($_FILES['pic']['name'],-4)); //Pegando extensão do arquivo
		$new_name = $_POST['nome'] . $ext; //Definindo um novo nome para o arquivo
		$dir = './imagens/carousel/'; //Diretório para uploads
	
		move_uploaded_file($_FILES['pic']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo
			echo '<div class="alert alert-success" role="alert" align="center">
		
		<img src="./imagens/carousel/' . $new_name . '" class="img img-responsive img-thumbnail" width="200"> 
		<br>
		Imagem enviada com sucesso!
		<br>
		<a href="exemplo_upload_de_imagens.php">
			<button class="btn btn-default">Enviar nova imagem</button>
		</a>
		
		</div>';
			//$query_upload = "INSERT INTO carrossel (imagem_carousel, nome, galeria) VALUES ('23', 'zabumbaas', '4')";
			$stmt = $conn->prepare("INSERT INTO carrossel (imagem_carousel, nome, galeria) VALUES (?, ?, ?)");
			$stmt->bind_param('sss', $new_name, $new_name, $_POST['galeria']);
			//$stmt->execute();
			if($stmt->execute()){
				//echo"success";
				$stmt->close();
				$stmt = $conn->prepare("UPDATE galerias SET thumbnail = ? WHERE id = ?");
				$stmt -> bind_param('sd', $new_name, $_POST['galeria']);
				if($stmt->execute()){
					//echo"SUCCESS";
				}else{
					//echo "FAIL";
				}
				$stmt->close();
				//$query_thumbnail = "SELECT imagem_carousel FROM carrossel where  order by col limit 1;"
			}else{
				echo "Error: " . "<br>" . mysqli_error($conn);
			}
			
		}
		?>
	</div>

<body>
</html>