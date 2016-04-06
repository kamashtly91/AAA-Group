<?php
namespace Application\Controller;

use Application\Service\Console;

/**
 * Class ConsoleController
 * @package Application\Controller
 */
class ConsoleController
{
    public function indexAction()
    {
        $consoleService = new Console();
        $consoleService->printCountTags();
    }

}