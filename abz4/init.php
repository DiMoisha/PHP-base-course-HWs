// Настраиваем конфиг, здесь можно получать данные из файлов и т.п и записывать их в Registry
$registry           = Registry::getInstance();
$registry->picDir      = "images/slider/";
$registry->delay       = 3000;
$registry->duration    = 600;