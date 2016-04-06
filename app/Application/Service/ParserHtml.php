<?php
namespace Application\Service;

/**
 * Class ParserHtml
 * @package Application\Service
 */
class ParserHtml extends Parse
{
    /**
     * @param $arrTags
     * @param $register
     * @return array
     */
    public function getTagsCount($arrTags, $register = true){
        $countArray = [];
        foreach($arrTags as $tag){
            //регистронезависимый
            if(!$register){
                $tag = strtolower($tag);
            }
            if(!array_key_exists($tag,$countArray)){
                $countArray[$tag] = 1;
                continue;
            }
            $countArray[$tag]++;
        }
        return $countArray;
    }
}