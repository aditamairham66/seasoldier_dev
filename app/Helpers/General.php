<?php

namespace App\Helpers;

use crocodicstudio\crudbooster\helpers\CRUDBooster;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class General
{
    public static function screenLoad()
    {
        if (!Cookie::get('loadScreen')) {
            Cookie::queue('loadScreen', true, 2628000);
        }
    }

    public  static function checkScreenLoad()
    {
        $res = false;
        if (Cookie::get('loadScreen')) {
            $res = true;
        }
        return $res;
    }

    /**
     * return random code string
     *
     * @param array $not_in
     * @param int $length
     * @param bool $capital
     * @return string
     */
    public static function RandomCode($not_in = [], $length = 6, $capital = true)
    {
        $code = str_random($length);
        if ($capital) {
            $code = strtoupper($code);
        }

        if (in_array($code, $not_in)) {
            $code = self::RandomCode();
        }

        return $code;
    }

    /**
     * return session delegate
     *
     * @return mixed
     */
    public static function getSessionDelegate()
    {
        return Session::get('delegate_session');
    }

    /**
     * split word
     *
     * @param $word
     * @param int $get
     * @return mixed
     */
    public static function sliptWord($word, $get = 0)
    {
        $split = str_split($word);
        return $split[$get];
    }

    /**
     * make slug
     *
     * @param $title
     * @return string
     */
    public static function makeSlug($title)
    {
        $replace = str_replace(' ','-', str_replace(',','', str_replace('.','', str_replace('"','', $title))));
        return strtolower($replace);
    }

    /**
     * @param $array
     * @param $parts
     * @return array
     */
    public static function fill_chunck($array, $parts)
    {
        $t = 0;
        $result = array_fill(0, $parts - 1, array());
        $max = ceil(count($array) / $parts);
        foreach($array as $v) {
            count($result[$t]) >= $max and $t ++;
            $result[$t][] = $v;
        }
        return $result;
    }

    /**
     * @param $array
     * @param $parts
     * @return array
     */
    public static function alternate_chunck($array, $parts) {
        $t = 0;
        $result = array();
        $max = ceil(count($array) / $parts);
        foreach(array_chunk($array, $max) as $v) {
            if ($t < $parts) {
                $result[] = $v;
            } else {
                foreach($v as $d) {
                    $result[] = array($d);
                }
            }
            $t += count($v);
        }
        return $result;
    }

    /**
     * @param $array
     * @param $size
     * @return array
     */
    public static function multiple_array($array, $size)
    {
        if (!empty($array)) {
            if (count($array) > 0) {
                $list = [];
                foreach ($array as $row) {
                    $list[] = $row;
                }
                return array_chunk($list, $size);
            }
        }
        return [];
    }

    /**
     * @param $start
     * @param $end
     * @return array
     * @throws \Exception
     */
    public static function dateArray($start, $end)
    {
        $result = [];

        $period = new \DatePeriod(
            new \DateTime($start),
            new \DateInterval('P1D'),
            new \DateTime($end)
        );

        foreach ($period as $key => $value) {
            $result[] = $value->format('Y-m-d');
        }
        $result[] = date('Y-m-d',strtotime($end));

        return $result;
    }

    /**
     * @param $n
     * @return string|void
     */
    public static function ToOrdinal($n) {
        /* Convert a cardinal number in the range 0 - 999 to an ordinal in
           words. */

        /* The ordinal will be collected in the variable $ordinal.
         Initialize it as an empty string.*/
        $ordinal = "";

        /* Check that the number is in the permitted range. */
        if ($n >= 0 && $n <= 999)
            null;
        else{
            echo "<br />You have called the function ToOrdinal with this value: $n, but
it is not in the permitted range, from 0 to 999, inclusive.<br />";
            return;
        }
        /* Extract the units. */
        $u = $n % 10;

        /* Extract the tens. */
        $t = floor(($n / 10) % 10);

        /* Extract the hundreds. */
        $h = floor($n / 100);

        /* Determine the hundreds */
        if ($h > 0) {

            /* ToCardinalUnits() works with numbers from 0 to 9, so it's okay
               for finding the number of hundreds, which must lie within this
               range. */
            $ordinal .= self::ToCardinalUnits($h);
            $ordinal .= " hundred";

            /* If tens and units are zero, append "th" and quit */
            if ($t == 0 && $u == 0) {
                $ordinal .=  "th";
            } else {
                /* Otherwise put in a blank space to separate the hundreds from
               what follows. */
                $ordinal .= " ";
            }
        }

        /* Determine the tens, unless there is just one ten.  If units are 0,
           handle them separately */
        if ($t >= 2 && $u != 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twenty-";
                    break;
                case 3:
                    $ordinal .= "thirty-";
                    break;
                case 4:
                    $ordinal .= "forty-";
                    break;
                case 5:
                    $ordinal .= "fifty-";
                    break;
                case 6:
                    $ordinal .= "sixty-";
                    break;
                case 7:
                    $ordinal .= "seventy-";
                    break;
                case 8:
                    $ordinal .= "eighty-";
                    break;
                case 9:
                    $ordinal .= "ninety-";
                    break;
            }
        }
        /* Print the tens (unless there is just one ten) with units == 0 */
        if ($t >= 2 && $u == 0) {
            switch ($t) {
                case 2:
                    $ordinal .= "twentieth";
                    break;
                case 3:
                    $ordinal .= "thirtieth";
                    break;
                case 4:
                    $ordinal .= "fortieth";
                    break;
                case 5:
                    $ordinal .= "fiftieth";
                    break;
                case 6:
                    $ordinal .= "sixtieth";
                    break;
                case 7:
                    $ordinal .= "seventieth";
                    break;
                case 8:
                    $ordinal .= "eightieth";
                    break;
                case 9:
                    $ordinal .= "ninetieth";
                    break;
            }
        }


        /* Print the teens, if the tens is 1. */
        if ($t == 1) {
            switch ($u) {
                case 0:
                    $ordinal .= "tenth";
                    break;
                case 1:
                    $ordinal .= "eleventh";
                    break;
                case 2:
                    $ordinal .= "twelfth";
                    break;
                case 3:
                    $ordinal .= "thirteenth";
                    break;
                case 4:
                    $ordinal .= "fourteenth";
                    break;
                case 5:
                    $ordinal .= "fifteenth";
                    break;
                case 6:
                    $ordinal .= "sixteenth";
                    break;
                case 7:
                    $ordinal .= "seventeenth";
                    break;
                case 8:
                    $ordinal .= "eighteenth";
                    break;
                case 9:
                    $ordinal .= "nineteenth";
                    break;
            }
        }

        /* Print the units. */
        if ($t != 1) {
            switch ($u) {
                case 0:
                    if ($n == 0)
                        $ordinal .= "zeroth";
                    break;
                case 1:
                    $ordinal .= "first";
                    break;
                case 2:
                    $ordinal .= "second";
                    break;
                case 3:
                    $ordinal .= "third";
                    break;
                case 4:
                    $ordinal .= "fourth";
                    break;
                case 5:
                    $ordinal .= "fifth";
                    break;
                case 6:
                    $ordinal .= "sixth";
                    break;
                case 7:
                    $ordinal .= "seventh";
                    break;
                case 8:
                    $ordinal .= "eighth";
                    break;
                case 9:
                    $ordinal .= "ninth";
                    break;
            }
        }
        return $ordinal;
    }

    /**
     * @param $n
     * @return string
     */
    public static function ToCardinalUnits($n) {
        /* Convert a number in the range 0 to 9 into its word equivalent. */

        /* Make sure the number is in the permitted range. */
        if ($n >= 0 && $n <= 9)
            null;
        else
        {
            echo "<br />You have called ToCardinal() with an argument $n, but the permitted range is 0 to 9, inclusive.<br />";
        }

        switch ($n) {
            case 0:
                return "zero";
            case 1:
                return "one";
            case 2:
                return "two";
            case 3:
                return "three";
            case 4:
                return "four";
            case 5:
                return "five";
            case 6:
                return "six";
            case 7:
                return "seven";
            case 8:
                return "eight";
            case 9:
                return "nine";
        }
    }

    /**
     * @param $name
     */
    public static function menuTag($name)
    {
        return Session::put('menu_tag', $name);
    }

    /**
     * @return mixed
     */
    public static function getMenuTag()
    {
        return Session::get('menu_tag');
    }

    /**
     * @param $url
     * @return mixed|string
     */
    public static function YoutubeTakeID($url)
    {
        $video_youtube = explode("?v=", $url);
        if (empty($video_youtube[1]))
            $video_youtube = explode("/v/", $url);

        $video_youtube = explode("&", $video_youtube[1]);
        $video_youtube = $video_youtube[0];

        return $video_youtube;
    }

    /**
     * @param $url
     * @param null $callback
     * @return mixed
     */
    public static function reqInstagram($url, $callback = null)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.instagram.com/oembed/?callback=$callback&url=$url&access_token=123%7C456",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 1000,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Cookie: csrftoken=fBNZh8Q3dCYvWfTEgXe6AklPoth5JkVW; ig_did=CCAE6ED4-C024-4DCF-9012-DA49847569AC; ig_nrcb=1; mid=YNXRWwAEAAEj8LBlNhWDCdhL3hJi'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);

        return self::resInstagram(json_decode($response, true));
    }

    /**
     * @param $res
     * @return array
     */
    public static function resInstagram($res)
    {
        $title = '';
        if (isset($res['title'])) {
            $title = $res['title'];
        }
        $author_name = '';
        if (isset($res['author_name'])) {
            $author_name = $res['author_name'];
        }
        $author_url = '';
        if (isset($res['author_url'])) {
            $author_url = $res['author_url'];
        }
        $thumbnail_url = '';
        if (isset($res['thumbnail_url'])) {
            $file = $res['thumbnail_url'];
            if (!file_exists(storage_path('app/uploads'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads')); //create it if do not exists
            }
            if (!file_exists(storage_path('app/uploads/gallery'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads/gallery')); //create it if do not exists
            }
            $thumbnail_url = 'uploads/gallery/'.date("Y-m-d")."_".md5(str_random(5))."_instagram.png";
            file_put_contents(storage_path('app/'.$thumbnail_url), file_get_contents($file));
        }

        return [
            "title" => $title,
            "author_name" => $author_name,
            "author_url" => $author_url,
            "thumbnail_url" => $thumbnail_url,
        ];
    }

    /**
     * @return false|string
     */
    public static function dateNow()
    {
        date_default_timezone_set('Asia/Jakarta');
        return date('Y-m-d H:i:s');
    }
}
