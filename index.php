<?php 
	
	require_once('config.php');

	if (isset($_POST['nome']) && isset($_POST['idade'])) {
		$nome = $_POST['nome'];
		$idade = $_POST['idade'];
		$db->pessoa()->insert(array('nome'=>$nome, 'idade'=>$idade));
		header('Location: index.php');
	}
	if (isset($_GET['delete'])) {
		$id = $_GET['id'];
		$dado = $db->pessoa[$id];
		$dado->delete();
		header('Location: index.php');
	}
	if (isset($_GET['update'])) {
		$id = $_GET['id'];
		$dado = $db->pessoa[$id];
		$dado->update(array('nome' => 'Nome Atualizado', 'idade' => 20));
		header('Location: index.php');
	}

 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>NotORM</title>
</head>
<body>
	
	<form method="POST">
		<p>
			<input type="text" name="nome" placeholder="Preencha com seu nome">
		</p>
		<p>
			<input type="text" name="idade" placeholder="Preencha com sua idade">
		</p>
		<p>
			<button type="submit">Salvar</button>
		</p>
	</form>

	<hr>

	<?php 
		$dados=$db->pessoa();
		foreach ($dados as $dado) {
			echo "<p>" . $dado['nome'] . " - " . $dado['idade'] . "</p>";?>
			<a href="?delete=true&id=<?php echo $dado['id']; ?>"
				onclick="return confirm('Você tem certeza disso?')">Apagar</a>
			<a href="?update=true&id=<?php echo $dado['id']; ?>"
				>Atualizar</a>
		<?php }
	 ?>

</body>
</html>