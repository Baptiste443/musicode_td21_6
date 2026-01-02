<?php
require 'vendor/autoload.php'; 
require 'model/musicode.php'; 

session_start();

$page = isset($_GET['page']) ? $_GET['page'] : 'musics';



if ($page === 'login') {
    require 'controllers/login.php';
}
elseif ($page === 'register') {
    require 'controllers/register.php';
}
elseif ($page === 'logout') {
    require 'controllers/logout.php';
}
elseif ($page === 'account' || strpos($page, 'account/') === 0) {
    require 'controllers/account.php';
}
elseif ($page === 'library' || strpos($page, 'library/') === 0) {
    require 'controllers/library.php';
}
elseif ($page === 'musics' || strpos($page, 'musics/') === 0) {
    require 'controllers/musics.php';
}
else {
    echo "Page introuvable (404)";
}