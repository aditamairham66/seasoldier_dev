<?php

if (!function_exists('screenLoad'))
{
    /**
     * screen loading
     *
     * @return bool
     */
    function screenLoad()
    {
        return App\Helpers\General::screenLoad();
    }
}

if (!function_exists('checkScreenLoad'))
{
    /**
     * check screen loading
     *
     * @return bool
     */
    function checkScreenLoad()
    {
        return App\Helpers\General::checkScreenLoad();
    }
}

if (!function_exists('RandomCode'))
{
    /**
     * return random code string
     *
     * @param array $not_in
     * @param int $length
     * @param bool $capital
     * @return string
     */
    function RandomCode($not_in = [], $length = 6, $capital = true)
    {
        return App\Helpers\General::RandomCode($not_in, $length, $capital);
    }
}

if (!function_exists('getSessionDelegate'))
{
    /**
     * return session delegate
     *
     * @param $value
     * @return mixed
     */
    function getSessionDelegate($value) {
        return App\Helpers\General::getSessionDelegate()->$value;
    }
}

if (!function_exists('sliptWord'))
{
    /**
     * split word
     *
     * @param $word
     * @param int $get
     * @return mixed
     */
    function sliptWord($word, $get = 0) {
        return App\Helpers\General::sliptWord($word, $get);
    }
}

if (!function_exists('makeSlug'))
{
    /**
     * make slug
     *
     * @param $title
     * @return string
     */
    function makeSlug($title)  {
        return App\Helpers\General::makeSlug($title);
    }
}

if (!function_exists('fill_chunck'))
{
    /**
     * @param $array
     * @param $parts
     * @return array
     */
    function fill_chunck($array, $parts)  {
        return App\Helpers\General::fill_chunck($array, $parts);
    }
}

if (!function_exists('alternate_chunck'))
{
    /**
     * @param $array
     * @param $parts
     * @return array
     */
    function alternate_chunck($array, $parts)  {
        return App\Helpers\General::alternate_chunck($array, $parts);
    }
}

if (!function_exists('multiple_array'))
{
    /**
     * @param $array
     * @param $size
     * @return array
     */
    function multiple_array($array, $size)  {
        return App\Helpers\General::multiple_array($array, $size);
    }
}

if (!function_exists('dateArray'))
{
    /**
     * @param $start
     * @param $end
     * @return array
     * @throws Exception
     */
    function dateArray($start, $end)  {
        return App\Helpers\General::dateArray($start, $end);
    }
}

if (!function_exists('ToOrdinal'))
{
    /**
     * @param $n
     * @return string|void
     */
    function ToOrdinal($n) {
        return App\Helpers\General::ToOrdinal($n);
    }
}

if (!function_exists('menuTag'))
{
    /**
     * @param $name
     */
    function menuTag($name) {
        return App\Helpers\General::menuTag($name);
    }
}

if (!function_exists('getMenuTag'))
{
    /**
     * @return mixed
     */
    function getMenuTag() {
        return App\Helpers\General::getMenuTag();
    }
}

if (!function_exists('YoutubeTakeID'))
{
    /**
     * @param $url
     * @return mixed|string
     */
    function YoutubeTakeID($url) {
        return App\Helpers\General::YoutubeTakeID($url);
    }
}
