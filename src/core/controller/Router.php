<?

namespace core\controller;

class Router
{

    public static $list = [];

    public static function myGet($url, $namePage)
    {
        self::$list[] = [
            'url' => $url,
            'namePage' => $namePage
        ];
    }

    public static function myPost($url, $class, $method)
    {
        self::$list[] = [
            'url' => $url,
            'class' => $class,
            'method' => $method
        ];
    }

    public static function tryAction()
    {
        $rout = $_GET['rout'] ?? '';
        foreach (self::$list as $val) {
            if ($val['url'] === '/' . $rout) {
                if ($_SERVER['REQUEST_METHOD'] === 'POST'){
                    switch ($val['url']) {
                        case '/addProdu':
                        case '/redact':
                        case '/delete':
                            $method = $val['method'];
                            $class = new $val['class'];
                            $class->$method();
                            exit;
                    }
                } else {
                    require_once __DIR__ . '/../views/' . $val['namePage'] . '.php';
                    die();
                }
            } 
        }
        die('Такой инфы нету');
    }
}
