<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<div id='semaforo'>
		<ul>
			<li>
				<?php
				include'../../config/conexionBD.php';

				$sql = "SELECT * FROM producto WHERE pr_codigo = ".$_GET['codigo'];
				$result = $conn -> query($sql);
				$row2 = $result -> fetch_assoc();

				if ($row2['pr_nivel_azucar'] == 'alto')
					echo "<div class='smf' style='background-color: red;'>ALTO EN AZÚCAR</div>";
				elseif ($row2['pr_nivel_azucar'] == 'medio')
					echo "<div class='smf' style='background-color: yellow;'>MEDIO EN AZÚCAR</div>";
				elseif ($row2['pr_nivel_azucar'] == 'bajo')
					echo "<div class='smf' style='background-color: green;'>BAJO EN AZÚCAR</div>";
				else
					echo "<div class='smf'>NO CONTIENE AZÚCAR</div>";
				?>
			</li>
			<li>
				<?php
				if ($row2['pr_nivel_sal'] == 'alto')
					echo "<div class='smf' style='background-color: red;'>ALTO EN SAL</div>";
				elseif ($row2['pr_nivel_sal'] == 'medio')
					echo "<div class='smf' style='background-color: yellow;'>MEDIO EN SAL</div>";
				elseif ($row2['pr_nivel_sal'] == 'bajo')
					echo "<div class='smf' style='background-color: green;'>BAJO EN SAL</div>";
				else
					echo "<div class='smf'>NO CONTIENE SAL</div>";
				?>
			</li>
			<li>
				<?php
				if ($row2['pr_nivel_grasa'] == 'alto')
					echo "<div class='smf' style='background-color: red;'>ALTO EN GRASA</div>";
				elseif ($row2['pr_nivel_grasa'] == 'medio')
					echo "<div class='smf' style='background-color: yellow;'>MEDIO EN GRASA</div>";
				elseif ($row2['pr_nivel_grasa'] == 'bajo')
					echo "<div class='smf' style='background-color: green;'>BAJO EN GRASA</div>";
				else
					echo "<div class='smf'>NO CONTIENE GRASA</div>";
				?>
			</li>
		</ul>
	</div>

	<div id='detalle'>
		<i id="close" class="material-icons" onclick="popOut()">close</i>
		<?php
		echo "<h1>".$row2['pr_nombre']."</h1>";
		echo "<p>".$row2['pr_descripcion']."</p>";
		?>
		<strong>Califica este producto:</strong>
		<form id="form">
			<p class="clasificacion">
			<input id="radio1" type="radio" name="estrellas" value="5" onchange="calificar(this.value, <?php echo $_GET['codigo']; ?>)">
			<label for="radio1">★</label>
			<input id="radio2" type="radio" name="estrellas" value="4" onchange="calificar(this.value, <?php echo $_GET['codigo']; ?>)">
			<label for="radio2">★</label>
			<input id="radio3" type="radio" name="estrellas" value="3" onchange="calificar(this.value, <?php echo $_GET['codigo']; ?>)">
			<label for="radio3">★</label>
			<input id="radio4" type="radio" name="estrellas" value="2" onchange="calificar(this.value, <?php echo $_GET['codigo']; ?>)">
			<label for="radio4">★</label>
			<input id="radio5" type="radio" name="estrellas" value="1" onchange="calificar(this.value, <?php echo $_GET['codigo']; ?>)">
			<label for="radio5">★</label>
			</p>
		</form>
	</div>
	</body>
</html>
						

							