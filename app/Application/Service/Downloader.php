<?php
/**
 * Created by PhpStorm.
 * User: helen
 * Date: 06/04/16
 * Time: 12:21
 */

namespace Application\Service;

/**
 * Class Downloader
 * @package Application\Service
 */
class Downloader
{
    protected $ch;

    public function __construct()
    {
        $this->ch = curl_init();
        $this->setOption(CURLOPT_RETURNTRANSFER, 1);
    }

    public function __destruct()
    {
        curl_close($this->ch);
    }

    public function setOption($name, $value)
    {
        curl_setopt($this->ch, $name, $value);
    }

    public function getContent($url)
    {
        $this->setOption(CURLOPT_URL, $url);
        $res = curl_exec($this->ch);
        return $res;
    }
}