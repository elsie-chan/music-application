 <?php
 // define load vendor paths
    require_once(dirname(__DIR__). '/vendor/autoload.php');
    use Symfony\Component\Dotenv\Dotenv;

    $controller_path = __DIR__ . '/controllers';
    $model_path = __DIR__ . '/models';
    $system_path = __DIR__ . '/system';
    $help_path = __DIR__ . '/helper';
    $dotenv = new Dotenv();

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

    $auth = new AuthController();
    $auth->index();

