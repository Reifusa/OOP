<?

    spl_autoload_register(function($name){
        require_once __DIR__ . '/src/' . str_replace('\\', '/', $name) . '.php'; 
    });

    require '../ООП/src/core/router.php';
