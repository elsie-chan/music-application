 <?php
 // define load vendor paths
require_once(__DIR__.'/vendor/autoload.php');

use App\Route\Route;
use Symfony\Component\Dotenv\Dotenv;

$controller_path = __DIR__ . '/src/controllers';
$model_path = __DIR__ . '/src/models';
$system_path = __DIR__ . '/src/system';
$help_path = __DIR__ . '/src/helper';
$route_path = __DIR__ .'/src/routes';
$dotenv = new Dotenv();

session_start();


require_once('./src/system/constant.php');
require_once('./src/system/Security.php');
require_once('./src/routes/Route.php');
require_once('./src/helper/helper.php');
require_once('./src/controllers/Controller.php');
require_once('./src/models/Model.php');

if (file_exists($controller_path)) {
    $files = scandir($controller_path);
    foreach ($files as $file) {
        if (!file_exists($file)) {
            require_once("./src/controllers/".$file);
        }
    }
}

if (file_exists($model_path)) {
    $files = scandir($model_path);
    foreach ($files as $file) {
        if (!file_exists($file)) {
            require_once("./src/models/".$file);
        }
    }
}

require_once(__DIR__. '/route.php');
if (!$flag) {
    require_once (assets('views/layout/404.php'));
}