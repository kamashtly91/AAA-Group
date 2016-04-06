<?php

namespace Application\Service;

/**
 * Class Parse
 * @package Application\Service
 */
class Parse
{
    /**
     * @param $content
     * @param $pattern
     * @param array $params
     * @return mixed
     */
    public function parseToArray($pattern, $content, $params = [])
    {
        $offset = array_key_exists('offset', $params) ? $params['offset'] : 0;
        $flags = array_key_exists('flags', $params) ? $params['flags'] : PREG_PATTERN_ORDER;
        preg_match_all($pattern, $content, $matches, $flags, $offset);
        return is_array($matches) ? current($matches) : [];
    }
}