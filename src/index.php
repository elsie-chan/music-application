 <?php
 // define load vendor paths
    require_once(dirname(__DIR__). '/vendor/autoload.php');

 use App\Route\Route;
 use Symfony\Component\Dotenv\Dotenv;

    $controller_path = __DIR__ . '/controllers';
    $model_path = __DIR__ . '/models';
    $system_path = __DIR__ . '/system';
    $help_path = __DIR__ . '/helper';
    $route_path = __DIR__ .'/routes';
    $dotenv = new Dotenv();

    require_once('routes/Route.php');
    require_once('helper/helper.php');
    require_once('controllers/Controller.php');
    require_once('models/Model.php');
    require_once('system/constant.php');


    if (file_exists($controller_path)) {
        $files = scandir($controller_path);
        foreach ($files as $file) {
            if (!file_exists($file)) {
                require_once("controllers/".$file);
            }
        }
    }

    if (file_exists($model_path)) {
        $files = scandir($model_path);
        foreach ($files as $file) {
            if (!file_exists($file)) {
                require_once("models/".$file);
            }
        }
    }
$route = new Route();
$controller_name = $route->controller;
$method_name = $route->method;

 if (file_exists('controllers/'.$controller_name.'.php')) {
     require_once('controllers/'. $controller_name .'.php');
 }

 $controller = new $controller_name();

 if (!method_exists($controller, $method_name)) {
     echo "Loi";
 }
 $controller->{$method_name}();


