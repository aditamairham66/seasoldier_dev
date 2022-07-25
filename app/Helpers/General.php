<?php

namespace App\Helpers;

use App\Services\CmsSettingsService;
use DateInterval;
use DatePeriod;
use DateTime;
use Exception;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class General
{
    /**
     * @return bool
     */
    public static function isMobile(): bool
    {
        $useragent = request()->userAgent();
        if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4))) {
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function screenLoad(): bool
    {
        if (!Cookie::get('loadScreen')) {
            Cookie::queue('loadScreen', true, 2628000);
            return true;
        }
        return false;
    }

    /**
     * @return bool
     */
    public static function checkScreenLoad(): bool
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
    public static function RandomCode(array $not_in = [], int $length = 6, bool $capital = true): string
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
    public static function splitWord($word, int $get = 0)
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
    public static function makeSlug($title): string
    {
        $replace = str_replace(' ', '-', str_replace(',', '', str_replace('.', '', str_replace('"', '', $title))));
        return strtolower($replace);
    }

    /**
     * @param $array
     * @param $parts
     * @return array
     */
    public static function fill_chunks($array, $parts): array
    {
        $t = 0;
        $result = array_fill(0, $parts - 1, array());
        $max = ceil(count($array) / $parts);
        foreach ($array as $v) {
            count($result[$t]) >= $max and $t++;
            $result[$t][] = $v;
        }
        return $result;
    }

    /**
     * @param $array
     * @param $parts
     * @return array
     */
    public static function alternate_chunks($array, $parts): array
    {
        $t = 0;
        $result = array();
        $max = ceil(count($array) / $parts);
        foreach (array_chunk($array, $max) as $v) {
            if ($t < $parts) {
                $result[] = $v;
            } else {
                foreach ($v as $d) {
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
    public static function multiple_array($array, $size): array
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
     * @throws Exception
     */
    public static function dateArray($start, $end): array
    {
        $result = [];

        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            new DateTime($end)
        );

        foreach ($period as $value) {
            $result[] = $value->format('Y-m-d');
        }
        $result[] = date('Y-m-d', strtotime($end));

        return $result;
    }

    /**
     * @param int $n
     * @return string|void
     */
    public static function ToOrdinal(int $n)
    {
        $ordinal = '';

        /* Convert a cardinal number in the range 0 - 999 to an ordinal in
           words. */

        /* The ordinal will be collected in the variable $ordinal.
         Initialize it as an empty string.*/

        /* Check that the number is in the permitted range. */
        if ($n >= 0 && $n <= 999)
            return null;
        else {
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
                $ordinal .= "th";
            } else {
                /* Otherwise put in a blank space to separate the hundreds from
               what follows. */
                $ordinal .= " ";
            }
        } else {
            $ordinal = "";
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
    public static function ToCardinalUnits($n): ?string
    {
        /* Convert a number in the range 0 to 9 into its word equivalent. */

        /* Make sure the number is in the permitted range. */
        if ($n >= 0 && $n <= 9)
            return null;
        else {
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
            default:
                return null;
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public static function menuTag($name): bool
    {
        Session::put('menu_tag', $name);
        return true;
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
        return $video_youtube[0];
    }

    /**
     * @param $url
     * @param null $callback
     * @return array
     */
    public static function reqInstagram($url, $callback = null): array
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            //            CURLOPT_URL => "https://api.instagram.com/oembed/?callback=$callback&url=$url&access_token=123%7C456",
            CURLOPT_URL => "https://api.instagram.com/oembed/?url=$url",
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
    public static function resInstagram($res): array
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
            if (!file_exists(storage_path('app/uploads/instagram'))) { //Verify if the directory exists
                mkdir(storage_path('app/uploads/instagram')); //create it if do not exists
            }
            $thumbnail_url = 'uploads/instagram/' . date("Y-m-d") . "_" . md5(str_random(5)) . "_instagram.png";
            file_put_contents(storage_path('app/' . $thumbnail_url), file_get_contents($file));
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

    /**
     * @return array
     */
    public static function footerData(): array
    {
        return CmsSettingsService::getFooterByKey();
    }

    /**
     * request instagram 2
     */
    public static function reqInstagram2($url)
    {
        $url = "$url/media?size=l";
        $thumbnail_url = 'uploads/instagram/' . date("Y-m-d") . "_" . md5(str_random(5)) . "_instagram.png";
        file_put_contents(storage_path('app/' . $thumbnail_url), file_get_contents($url));
        return $thumbnail_url;
    }
}
