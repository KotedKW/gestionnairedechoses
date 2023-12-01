<?php
  if (!empty($_GET['q'])) {
    switch ($_GET['q']) {
      case 'info':
        phpinfo(); 
        exit;
      break;
    }
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>MES WATURES</title>

        <style> 
        </style>
    </head>

    <body>
      <h1 align="center">Watures pas chères</h1>
    <h3 align="center">Mes marques de watures</h3>
    <?php
    $mysqlConnection = New PDO(
      'mysql:host=localhost;dbname=mydatabaseforlessons;charte=utf8',
      'root',
      '',
    );
    try
    {
      $db = new PDO('mysql:host=localhost;dbname=mydatabaseforlessons;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
    ?>
    
    <?php
$retrieveBrand = $db->prepare('SELECT * FROM brand');
$retrieveBrand->execute();
$brands = $retrieveBrand->fetchAll();
?>

<table border="1px" align="center">
  <tr>
    <td>Marque</td>
    <td>Logo</td>
  </tr>
  <?php
  foreach ($brands as $brand) {
    echo "<tr>";
    echo "<td>'"  .$brand['name'] ."' </td>";
    echo "<td align='center'> <img height=75px width=100px title='".$brand['name']. "' src='" .$brand['url'] . "'/>";
    echo "</tr>";
}
?>
</table>
  <a href="/brand_add.php">Ajouter une marque</a>
    </body>
</html>