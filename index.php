<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>

<body>

</body>

</html>

<?php
ini_set('display errors', 1);
error_reporting(E_ALL);

echo '<header>';
echo '<h1>PORTAL DIGITAL</h1>';
echo '<nav>
        <ul>
            <li><a href=\'http://localhost/php/portal_digital/index.php#economiafem/\'>Economia Feminita</a></li>
            <li><a href=\'http://localhost/php/portal_digital/index.php#redusers/\'>Red Users</a></li>
        </ul>
    </nav>';
echo '</header>';

echo '<main>';

$economiafem_response = file_get_contents('https://economiafeminita.com/wp-json/wp/v2/posts');

if ($economiafem_response !== false) {
    $noticias_economiafem = json_decode($economiafem_response, true);
    echo '<section id="economiafem">';
    echo '<h2><em>ECONOMIA FEMINITA</em></h2>';
    for ($i = 0; $i < 5; $i++) {
        
        echo '<h3><a href=\'' . $noticias_economiafem[$i]['link'] . '\' target= blank>' . $noticias_economiafem[$i]['title']['rendered'] . '</a></h3>';

    }
    
    echo '</section>';
}
$redusers_response = file_get_contents('https://www.redusers.com/noticias/wp-json/wp/v2/posts');

$redusers2 = substr($redusers_response, 3); //Así se eliminan 3 caracteres invisibles.

if ($redusers2 !== false) {
    $noticias_redusers = json_decode($redusers2, true);
    echo '<section id="redusers">';
    echo '<h2><em>RED USERS</em></h2>';
    echo '<section id="cont_redusers">';
    for ($i = 0; $i < 3; $i++) {
        
        echo '<article>';
        echo '<h3><a href=\'' . $noticias_redusers[$i]['link'] . '\' target= blank>' . $noticias_redusers[$i]['title']['rendered'] . '</a></h3>';
        echo '<figure><a href=\'' . $noticias_redusers[$i]['link'] . '\' target= blank><img src=\'' . $noticias_redusers[$i]['thumbnail_url_medium'] . '\'></a></figure>';
        echo '</article>';
        
    }
    echo '</section>';
    echo '</section>';
}
echo '</main>';
echo '<footer><p>Diseño y desarrollo por Matías Sarti</p></footer>';
