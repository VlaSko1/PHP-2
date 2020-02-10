    <?php
include realpath("../vendor/autoload.php");
$loader = new \Twig\Loader\FilesystemLoader('../twigtemplates');

$twig = new \Twig\Environment($loader);
echo $twig->render('index.twig', ['name' => 'Admin']);