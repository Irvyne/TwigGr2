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

$articles = [
    [
        'name'    => 'My Beautiful Article',
        'content' => 'Hi, it\'s my content!',
        'enabled' => true,
        'date'    => new DateTime('now'),
    ],
    [
        'name'    => 'zeljkfhzekjfbh',
        'content' => 'azpdklpkbvwh',
        'enabled' => false,
        'date'    => new DateTime('now'),
    ],
    [
        'name'    => 'Lipsum',
        'content' => 'Lorem',
        'enabled' => true,
        'date'    => new DateTime('now'),
    ],
];

echo $twig->render('Blog/article.html.twig', [
    'articles' => $articles,
]);
