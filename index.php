<?php
/**
 * @author Thibaud BARDIN (https://github.com/Irvyne).
 * This code is under MIT licence (see https://github.com/Irvyne/license/blob/master/MIT.md)
 */

require __DIR__.'/vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem([
    __DIR__.'/views',
]);

$twig = new Twig_Environment($loader, [
    //'cache' => null,
]);

$dsn        = 'mysql:host=localhost;dbname=blog';
$user       = 'root';
$password   = 'toor';

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    @mail('thibaud.bardin+error@gmail.com', 'Erreur sur mon Site', $e->getMessage());
    echo 'Erreur de connexion a la BDD';
    die;
}

$sql = "SELECT * FROM article";
$pdoStmt = $pdo->query($sql);
$articles = $pdoStmt->fetchAll(PDO::FETCH_OBJ);

echo $twig->render('Blog/article.html.twig', [
    'articles' => $articles,
]);
