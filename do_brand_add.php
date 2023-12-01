<html><h1>Insert dans la table Brand </h1>
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
    $name = $_POST['name'];
    $url= $_POST['url'];
    $request=$db->prepare('INSERT INTO `brand` (`name`, `url`) VALUES (:name, :url)');
    $request->bindParam('name', $name);
    $request->bindParam('url', $url);
    if ($request->execute()) {
        header('Location: index.php');
        exit();
    }else{
        echo "Erreur lors de l'insertion des données" . $request->error;
    }
?>
<!-- 
    
-->
</html>