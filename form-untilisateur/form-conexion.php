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
      <link rel="stylesheet" type="text/css" href="css/style.css">

<div class="jumbotron">
    <h1>foumuler de connexion</h1>
    <div class="container-fluid">
        <form action="verif-conexion.php" method="POST">
            <table>
                <tr>
                    <td><label>e-mail</label></td>
                        <td>
                            <input type="email" name="email">
                        </td>
                    </label>

                    <td><label>password</label></td>
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
            <p><a href='oubli.php'>nouveau mot de passe</a></p>
        </form>
    </div>
</div>
<?php
  }
?>