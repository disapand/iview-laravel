<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018-08-17
 * Time: 21:12
 */

namespace App\Handlers;


class Tools
{
    static function getfirstchar($s0){
        $fchar = ord($s0{0});
        if($fchar >= ord("A") and $fchar <= ord("z") )return strtoupper($s0{0});
        //$s1 = iconv("UTF-8","gb2312//IGNORE", $s0);
        // $s2 = iconv("gb2312","UTF-8//IGNORE", $s1);
        $s1 = self::get_encoding($s0,'GB2312');
        $s2 = self::get_encoding($s1,'UTF-8');
        if($s2 == $s0){$s = $s1;}else{$s = $s0;}
        $asc = ord($s{0}) * 256 + ord($s{1}) - 65536;
        if($asc >= -20319 and $asc <= -20284) return "a";
        if($asc >= -20283 and $asc <= -19776) return "b";
        if($asc >= -19775 and $asc <= -19219) return "c";
        if($asc >= -19218 and $asc <= -18711) return "d";
        if($asc >= -18710 and $asc <= -18527) return "e";
        if($asc >= -18526 and $asc <= -18240) return "f";
        if($asc >= -18239 and $asc <= -17923) return "g";
        if($asc >= -17922 and $asc <= -17418) return "h";
        if($asc >= -17417 and $asc <= -16475) return "j";
        if($asc >= -16474 and $asc <= -16213) return "k";
        if($asc >= -16212 and $asc <= -15641) return "l";
        if($asc >= -15640 and $asc <= -15166) return "m";
        if($asc >= -15165 and $asc <= -14923) return "n";
        if($asc >= -14922 and $asc <= -14915) return "o";
        if($asc >= -14914 and $asc <= -14631) return "p";
        if($asc >= -14630 and $asc <= -14150) return "q";
        if($asc >= -14149 and $asc <= -14091) return "r";
        if($asc >= -14090 and $asc <= -13319) return "s";
        if($asc >= -13318 and $asc <= -12839) return "t";
        if($asc >= -12838 and $asc <= -12557) return "w";
        if($asc >= -12556 and $asc <= -11848) return "x";
        if($asc >= -11847 and $asc <= -11056) return "y";
        if($asc >= -11055 and $asc <= -10247) return "z";
        return null;
    }

    static function get_encoding($data,$to)
    {
        $encode_arr = array('UTF-8', 'ASCII', 'GBK', 'GB2312', 'BIG5', 'JIS', 'eucjp-win', 'sjis-win', 'EUC-JP');
        $encoded = mb_detect_encoding($data, $encode_arr);
        $data = mb_convert_encoding($data, $to, $encoded);
        return $data;
    }

    static function pinyin1($zh)
    {
        $ret = "";
        $s1 = iconv("UTF-8", "gb2312", $zh);
        $s2 = iconv("gb2312", "UTF-8", $s1);
        if ($s2 == $zh) {
            $zh = $s1;
        }
        for ($i = 0; $i < strlen($zh); $i++) {
            $s1 = substr($zh, $i, 1);
            $p = ord($s1);
            if ($p > 160) {
                $s2 = substr($zh, $i++, 2);
                $ret .= self::getfirstchar($s2);
            } else {
                $ret .= $s1;
            }
        }
        return $ret;
    }
}