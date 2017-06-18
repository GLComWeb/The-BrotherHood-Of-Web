<?php
  session_start();
  if(isset($_SESSION['id']))
  {
?>
  <a href="deco-sesion.php">Me déconnecter</a>
<?php
  }
  else
  {
?>
<form action="verif-conexion.php" method="POST">
	<table>
		<tr>
			<td>e-mail</td>
				<td>
					<input type="email" name="email">
				</td>
			</label>
			
			<td>password</td>
				<td>
					<input type="password" name="mot_de_passe">
				</td>
			</label>
			<label>
				<td>
					<input type="submit" name="connexion">
				</td>
			</label>
		</tr>
	</table>
</form>
<?php
  }
?>