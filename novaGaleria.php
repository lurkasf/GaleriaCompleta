<?php
	include_once("conexao.php");
	if(!isset($_POST['new_galery']))
	{
		$list = explode("/",$_SERVER['HTTP_REFERER']);
		$page = $list[count($list)-1];
		if($page == ''){
			$page = 'index.php';
		}
		//echo "pagina: $page, referer: ",$_SERVER['HTTP_REFERER'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nova Galeria</title>
</head>
<body>
	<div>
		<form method="post">
			<label>Nome:</label>
			<input type="text" name="new_galery">
			<input type="text" name="descricao">
			<input type="hidden" name="remetente" value="<?php echo $page?>">
			<input type="submit" name="Salvar">
		</form>
	</div>
</body>
<?php 
	//echo $_SERVER['HTTP_REFERER'];
	
	if(isset($_POST['new_galery'])){
		$stmt = $conn->prepare("INSERT INTO galerias (nome, descricao) VALUES (?, ?)");
		$stmt->bind_param('ss', $_POST['new_galery'], $_POST['descricao']);
		if($stmt->execute()){
			header("Location: {$_POST['remetente']}");
			/*echo"
				<h2>Enviada com sucesso</h2>
				<div>
					<form method='post' target='upload.php'>
						<input type='hidden' name='valor'> 
						<input type='submit' name='Salvar' value='OK'>
					</form>
				</div>
			";*/
		}else{
			//echo "Error: " . "<br>" . mysqli_error($conn);
			if (mysqli_error($conn) == "Duplicate entry 'Camping' for key 'nome'")
			{
				echo "
				<h2>
					Este nome já existe
				</h2>";
			}
		}
		$stmt->close();
	}else{

	}
?>
</html>
