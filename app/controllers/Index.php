<?php
declare(strict_types=1);


/**
 * Class IndexController
 */
class IndexController extends Global_LocalControllerGlobal
{
    public $actions = [
        'index' => 'actions/default/IndexAction.php',
        'test' => 'actions/default/TestAction.php'
    ];
}