<?php
require_once 'ligacaoBD.php';
require_once 'testaSessao.php';

if(testaSessao()){
	if($con=LigaBD()){
		if(isset($_GET["id"])){
			$stm = $con->prepare("delete from contactos where id_contactos=?");
			$stm-> bind_param("i", $_GET["id"]);
			$stm->execute();
		}


		$query=$con->query("select * from contactos");
		echo '<h1>PAINEL DE CONTACTOS - <a href="from_contactos.php"> Adicionar Contacto </a> </h1>';
		echo '<table><tr><th>Primeiro Nome </th>
		<ht>Último Nome</th>
		<th>Editar</th>
		<th>Eliminar</th></tr>';

		while($resultados=$query->fetch_assoc()){
			echo '<tr>';
			echo "<td>" .$resultados['primeiro_nome']."</td><td>"
			.$resultados['ultimo_nome']."</td>".
			"<td> <a href='from_contactos.php?id=".$resultados['id_contacto']."'>Editar</a> </td>"."td> <a href='mostrar_contactos.php?id=".$resultados['id_contacto']."'>Eliminar</a></td>";
			echo '</tr>';
		}
		echo "</table>";
		$con->close();
	}
}
?>