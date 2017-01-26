<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\helpers\Url;

class DemoController extends Controller
{
    public function actionIndex()
    {
        $menuEntries = array(
            'index.php' => 'Home',
            'hello.php' => 'Hello World Function',
            'alias.php' => 'Hello World Alias',
            'class.php' => 'Hello World Class',
            'extern.php' => 'Export Javascript',
            'plugins.php' => 'Plugin Usage',
            'config.php' => 'Config File',
            'directories.php' => 'Register Directories',
            'namespaces.php' => 'Register Namespaces',
            'autoload-default.php' => 'Default Autoloader',
            'autoload-composer.php' => 'Composer Autoloader',
            'autoload-disabled.php' => 'Third Party Autoloader',
            'module.php' => 'Module',
            'laravel/' => 'Laravel Framework',
            'symfony/' => 'Symfony Framework',
            'zend/' => 'Zend Framework',
            'codeigniter/' => 'CodeIgniter Framework',
            'yii/' => 'Yii Framework',
            'cake/' => 'CakePHP Framework',
        );

        // Set the layout
        $this->layout = 'demo';
        // Call the Jaxon module
        $jaxon = Yii::$app->getModule('jaxon');
        $jaxon->register();

        return $this->render('index', array(
            'jaxonCss' => $jaxon->css(),
            'jaxonJs' => $jaxon->js(),
            'jaxonScript' => $jaxon->script(),
            'menuEntries' => $menuEntries,
        ));
    }

    public function actionProcess()
    {
        $jaxon = Yii::$app->getModule('jaxon');
        // Process Jaxon request
        if($jaxon->canProcessRequest())
        {
            $jaxon->processRequest();
        }
    }
}
