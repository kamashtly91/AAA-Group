<?php
/**
 * Created by PhpStorm.
 * User: helen
 * Date: 06/04/16
 * Time: 13:03
 */

namespace Application\Service;

/**
 * Class Console
 * @package Application\Service
 */
class Console
{
    public function printCountTags()
    {
        $downloader = new Downloader();
        $parser = new  ParserHtml();
        $content = $downloader->getContent('http://pikabu.ru');
        $array = $parser->parseToArray('/<[a-z]+/', $content);
        $countArray = $parser->getTagsCount($array, false);
        foreach ($countArray as $key => $value) {
            print("Тэг " . substr($key, 1) . "  входит в страницу " . $value . " раз. \n");
        }
    }

}