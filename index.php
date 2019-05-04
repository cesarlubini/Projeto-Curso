<?php
	include "inc/head.php";
	include "inc/header.php";
	include "req/database.php";

	try {
		$query = $conexao->query('SELECT * FROM cursos');

		$cursos = $query->fetchAll(PDO::FETCH_ASSOC);

		// var_dump ($cursos);

	} catch( PDOException $Exception) {
		echo $Exception->getMessage();
	}

	// $cursos = [
	// 		"Full Stack" => ["Curso de Desenvolvimento Web", 1000.99, "full.jpeg", "fullstack"],
	// 		"Marketing Digital" => ["Curso de Marketing", 1000.98, "marketing.jpg", "marketing"],
	// 		"UX" => ["Curso de User Experience", 9000.98, "ux.jpg", "ux"],
	// 		"Mobile Android" => ["Curso de Apps", 1000.97, "android.png", "android"]
	// ];
?>

	<div class="container">
		<div class="row">
			<?php foreach ($cursos as $key => $infosCurso) : ?>
				<div class="col-sm-6 col-md-6">
					<div class="thumbnail">
					<img src="assets/img/produtos/<?php echo $infosCurso['image']; ?>" alt="<?php echo "Foto Curso " . $infosCurso['nome']; ?>">
						<div class="caption">
							<h3><?php echo $infosCurso['nome']; ?></h3>
							<p><?php echo $infosCurso['descricao']; ?></p>
							<p><?php echo "R$: " . $infosCurso['preco'] . ",00";?></p>
							<a href="#" data-toggle="modal" data-target="<?php echo "#".$infosCurso['tag'] ?>" class="btn btn-info" role="button">Comprar</a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			<?php foreach ($cursos as $key => $infosCurso) : ?>
				<!-- Modal -->
				<div class="modal fade" id="<?php echo $infosCurso['tag'] ?>" role="dialog">
					<div class="modal-dialog">
					
						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Preencha os seus dados</h4>
							</div>
							<div class="modal-body">
								<h4>Curso de: <?php echo $infosCurso['nome']?></h4>
								<h4>Preço: R$ <?php echo $infosCurso['preco'];?></h4>
								<form action="validarCompra.php" method="POST">
									<input id="nomeCurso" name="nomeCurso" type="hidden" value="<?php echo  $infosCurso['nome']?>">
									<input id="precoCurso" name="precoCurso" type="hidden" value="<?php echo $infosCurso['preco'];?>">
									<div class="input-group col-md-5">
										<label for="nomeCompleto">Nome Completo</label>
										<input id="nomeCompleto" name="nomeCompleto" type="text" class="form-control">
									</div>
									<div class="input-group col-md-5">
										<label for="cpf">CPF</label>
										<input id="cpf" name="cpf" type="number" class="form-control">
									</div>
									<div class="input-group col-md-5">
										<label for="nroCartao">Numero do Cartão</label>
										<input id="nroCartao" name="nroCartao" type="text" class="form-control">
									</div>
									<div class="input-group col-md-5">
										<label for="validade">Validade</label>
										<input id="validade" name="validade" type="month" class="form-control">
									</div>
									<div class="input-group col-md-5">
										<label for="cvv">CVV</label>
										<input id="cvv" name="cvv" type="number" class="form-control">
									</div>
									<button class="btn bt-primary" type="submit">Comprar</button>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>

<?php include "inc/footer.php";?>