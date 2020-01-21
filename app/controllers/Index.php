<?php
declare(strict_types=1);


/**
 * Class IndexController
 */
class IndexController extends Global_LocalControllerAbstract
{

    public $actions = [
        'index' => 'actions/index/index/Index.php'
    ];

    public function testAction()
    {
        var_dump('test');
    }
}