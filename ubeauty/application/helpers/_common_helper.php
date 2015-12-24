<?php
if (!function_exists('changealias')) {
    function changealias($alias)
    {
        $alias = EncString($alias);

        //thêm trường hợp các kí tự đặc biệt
        $alias = preg_replace("/(!|\"|#|$|%|'|̣)/", '', $alias);
        $alias = preg_replace("/(̀|́|̉|$|>)/", '', $alias);
        $alias = preg_replace("'<[\/\!]*?[^<>]*?>'si", "", $alias);

        $alias = str_replace("----", " ", $alias);
        $alias = str_replace("---", " ", $alias);
        $alias = str_replace("--", " ", $alias);

        $alias = preg_replace('/(\W+)/i', '-', $alias);
        $alias = str_replace(array(
            '-8220-', '-8221-', '-7776-'
        ), '-', $alias);
        $alias = preg_replace('/[^a-zA-Z0-9\-]+/e', '', $alias);
        $alias = str_replace(array(
            'dAg', 'DAg', 'uA', 'iA', 'yA', 'dA', '--', '-8230'
        ), array(
            'dong', 'Dong', 'uon', 'ien', 'yen', 'don', '-', ''
        ), $alias);
        $alias = preg_replace('/(\-)$/', '', $alias);
        $alias = preg_replace('/^(\-)/', '', $alias);
        return $alias;
    }
}

/**
 * EncString()
 *
 * @param mixed $text
 * @return
 */
if (!function_exists('EncString')) {
    function EncString($text)
    {
        $text = html_entity_decode($text);
        //thay thế chữ thuong
        $text = preg_replace("/(å|ä|ā|à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|ä|ą)/", 'a', $text);
        $text = preg_replace("/(ß|ḃ)/", "b", $text);
        $text = preg_replace("/(ç|ć|č|ĉ|ċ|¢|©)/", 'c', $text);
        $text = preg_replace("/(đ|ď|ḋ|đ)/", 'd', $text);
        $text = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|ę|ë|ě|ė)/", 'e', $text);
        $text = preg_replace("/(ḟ|ƒ)/", "f", $text);
        $text = str_replace("ķ", "k", $text);
        $text = preg_replace("/(ħ|ĥ)/", "h", $text);
        $text = preg_replace("/(ì|í|î|ị|ỉ|ĩ|ï|î|ī|¡|į)/", 'i', $text);
        $text = str_replace("ĵ", "j", $text);
        $text = str_replace("ṁ", "m", $text);

        $text = preg_replace("/(ö|ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|ö|ø|ō)/", 'o', $text);
        $text = str_replace("ṗ", "p", $text);
        $text = preg_replace("/(ġ|ģ|ğ|ĝ)/", "g", $text);
        $text = preg_replace("/(ü|ù|ú|ū|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|ü|ų|ů)/", 'u', $text);
        $text = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ|ÿ)/", 'y', $text);
        $text = preg_replace("/(ń|ñ|ň|ņ)/", 'n', $text);
        $text = preg_replace("/(ŝ|š|ś|ṡ|ș|ş|³)/", 's', $text);
        $text = preg_replace("/(ř|ŗ|ŕ)/", "r", $text);
        $text = preg_replace("/(ṫ|ť|ț|ŧ|ţ)/", 't', $text);

        $text = preg_replace("/(ź|ż|ž)/", 'z', $text);
        $text = preg_replace("/(ł|ĺ|ļ|ľ)/", "l", $text);

        $text = preg_replace("/(ẃ|ẅ)/", "w", $text);

        $text = str_replace("æ", "ae", $text);
        $text = str_replace("þ", "th", $text);
        $text = str_replace("ð", "dh", $text);
        $text = str_replace("£", "pound", $text);
        $text = str_replace("¥", "yen", $text);

        $text = str_replace("ª", "2", $text);
        $text = str_replace("º", "0", $text);
        $text = str_replace("¿", "?", $text);

        $text = str_replace("µ", "mu", $text);
        $text = str_replace("®", "r", $text);

        //thay thế chữ hoa
        $text = preg_replace("/(Ä|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|Ą|Å|Ā)/", 'A', $text);
        $text = preg_replace("/(Ḃ|B)/", 'B', $text);
        $text = preg_replace("/(Ç|Ć|Ċ|Ĉ|Č)/", 'C', $text);
        $text = preg_replace("/(Đ|Ď|Ḋ)/", 'D', $text);
        $text = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|Ę|Ë|Ě|Ė|Ē)/", 'E', $text);
        $text = preg_replace("/(Ḟ|Ƒ)/", "F", $text);
        $text = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ|Ï|Į)/", 'I', $text);
        $text = preg_replace("/(Ĵ|J)/", "J", $text);

        $text = preg_replace("/(Ö|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|Ø)/", 'O', $text);
        $text = preg_replace("/(Ü|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|Ū|Ų|Ů)/", 'U', $text);
        $text = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ|Ÿ)/", 'Y', $text);
        $text = str_replace("Ł", "L", $text);
        $text = str_replace("Þ", "Th", $text);
        $text = str_replace("Ṁ", "M", $text);

        $text = preg_replace("/(Ń|Ñ|Ň|Ņ)/", "N", $text);
        $text = preg_replace("/(Ś|Š|Ŝ|Ṡ|Ș|Ş)/", "S", $text);
        $text = str_replace("Æ", "AE", $text);
        $text = preg_replace("/(Ź|Ż|Ž)/", 'Z', $text);

        $text = preg_replace("/(Ř|R|Ŗ)/", 'R', $text);
        $text = preg_replace("/(Ț|Ţ|T|Ť)/", 'T', $text);
        $text = preg_replace("/(Ķ|K)/", 'K', $text);
        $text = preg_replace("/(Ĺ|Ł|Ļ|Ľ)/", 'L', $text);

        $text = preg_replace("/(Ħ|Ĥ)/", 'H', $text);
        $text = preg_replace("/(Ṗ|P)/", 'P', $text);
        $text = preg_replace("/(Ẁ|Ŵ|Ẃ|Ẅ)/", 'W', $text);
        $text = preg_replace("/(Ģ|G|Ğ|Ĝ|Ġ)/", 'G', $text);
        $text = preg_replace("/(Ŧ|Ṫ)/", 'T', $text);

        return $text;
    }
}


if (!function_exists('truncateString_')) {
    function truncateString_($str, $len, $charset = "UTF-8")
    {
        $str = html_entity_decode($str, ENT_QUOTES, $charset);
        if (mb_strlen($str, $charset) > $len) {
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes) - 1];
            unset($arr);
            if (strcasecmp($arrRes[count($arrRes) - 1], $last))
                unset($arrRes[count($arrRes) - 1]);
            return implode(' ', $arrRes) . "...";
        }
        return $str;
    }
}

function v2e_special($value)
{
    $value = str_replace("â", "a", $value);
    $value = str_replace("ấ", "a", $value);
    $value = str_replace("ầ", "a", $value);
    $value = str_replace("ẩ", "a", $value);
    $value = str_replace("ẫ", "a", $value);
    $value = str_replace("ậ", "a", $value);
    #---------------------------------A^

    $value = str_replace("Â", "a", $value);
    $value = str_replace("Ấ", "a", $value);
    $value = str_replace("Ầ", "a", $value);
    $value = str_replace("Ẩ", "a", $value);
    $value = str_replace("Ẫ", "a", $value);
    $value = str_replace("Ậ", "a", $value);
    #---------------------------------a

    $value = str_replace("á", "a", $value);
    $value = str_replace("à", "a", $value);
    $value = str_replace("ả", "a", $value);
    $value = str_replace("ã", "a", $value);
    $value = str_replace("ạ", "a", $value);
    #---------------------------------A

    $value = str_replace("Á", "a", $value);
    $value = str_replace("À", "a", $value);
    $value = str_replace("Ả", "a", $value);
    $value = str_replace("Ã", "a", $value);
    $value = str_replace("Ạ", "a", $value);
    #---------------------------------a(

    $value = str_replace("ă", "a", $value);
    $value = str_replace("ắ", "a", $value);
    $value = str_replace("ằ", "a", $value);
    $value = str_replace("ẳ", "a", $value);
    $value = str_replace("ẵ", "a", $value);
    $value = str_replace("ặ", "a", $value);
    #---------------------------------A(

    $value = str_replace("Ă", "a", $value);
    $value = str_replace("Ắ", "a", $value);
    $value = str_replace("Ằ", "a", $value);
    $value = str_replace("Ẳ", "a", $value);
    $value = str_replace("Ẵ", "a", $value);
    $value = str_replace("Ặ", "a", $value);
    #---------------------------------e^

    $value = str_replace("ê", "e", $value);
    $value = str_replace("ế", "e", $value);
    $value = str_replace("ề", "e", $value);
    $value = str_replace("ể", "e", $value);
    $value = str_replace("ễ", "e", $value);
    $value = str_replace("ệ", "e", $value);
    #---------------------------------E^

    $value = str_replace("Ê", "e", $value);
    $value = str_replace("Ế", "e", $value);
    $value = str_replace("Ề", "e", $value);
    $value = str_replace("Ể", "e", $value);
    $value = str_replace("Ễ", "e", $value);
    $value = str_replace("Ệ", "e", $value);
    #---------------------------------e

    $value = str_replace("é", "e", $value);
    $value = str_replace("è", "e", $value);
    $value = str_replace("ẻ", "e", $value);
    $value = str_replace("ẽ", "e", $value);
    $value = str_replace("ẹ", "e", $value);
    #---------------------------------E

    $value = str_replace("É", "e", $value);
    $value = str_replace("È", "e", $value);
    $value = str_replace("Ẻ", "e", $value);
    $value = str_replace("Ẽ", "e", $value);
    $value = str_replace("Ẹ", "e", $value);
    #---------------------------------i

    $value = str_replace("í", "i", $value);
    $value = str_replace("ì", "i", $value);
    $value = str_replace("ỉ", "i", $value);
    $value = str_replace("ĩ", "i", $value);
    $value = str_replace("ị", "i", $value);
    #---------------------------------I

    $value = str_replace("Í", "i", $value);
    $value = str_replace("Ì", "i", $value);
    $value = str_replace("Ỉ", "i", $value);
    $value = str_replace("Ĩ", "i", $value);
    $value = str_replace("Ị", "i", $value);
    #---------------------------------o^

    $value = str_replace("ô", "o", $value);
    $value = str_replace("ố", "o", $value);
    $value = str_replace("ồ", "o", $value);
    $value = str_replace("ổ", "o", $value);
    $value = str_replace("ỗ", "o", $value);
    $value = str_replace("ộ", "o", $value);
    #---------------------------------O^

    $value = str_replace("Ô", "o", $value);
    $value = str_replace("Ố", "o", $value);
    $value = str_replace("Ồ", "o", $value);
    $value = str_replace("Ổ", "o", $value);
    $value = str_replace("Ỗ", "o", $value);
    $value = str_replace("Ộ", "o", $value);
    #---------------------------------o*

    $value = str_replace("ơ", "o", $value);
    $value = str_replace("ớ", "o", $value);
    $value = str_replace("ờ", "o", $value);
    $value = str_replace("ở", "o", $value);
    $value = str_replace("ỡ", "o", $value);
    $value = str_replace("ợ", "o", $value);
    #---------------------------------O*

    $value = str_replace("Ơ", "o", $value);
    $value = str_replace("Ớ", "o", $value);
    $value = str_replace("Ờ", "o", $value);
    $value = str_replace("Ở", "o", $value);
    $value = str_replace("Ỡ", "o", $value);
    $value = str_replace("Ợ", "o", $value);
    #---------------------------------u*

    $value = str_replace("ư", "u", $value);
    $value = str_replace("ứ", "u", $value);
    $value = str_replace("ừ", "u", $value);
    $value = str_replace("ử", "u", $value);
    $value = str_replace("ữ", "u", $value);
    $value = str_replace("ự", "u", $value);
    #---------------------------------U*

    $value = str_replace("Ư", "u", $value);
    $value = str_replace("Ứ", "u", $value);
    $value = str_replace("Ừ", "u", $value);
    $value = str_replace("Ử", "u", $value);
    $value = str_replace("Ữ", "u", $value);
    $value = str_replace("Ự", "u", $value);
    #---------------------------------y

    $value = str_replace("ý", "y", $value);
    $value = str_replace("ỳ", "y", $value);
    $value = str_replace("ỷ", "y", $value);
    $value = str_replace("ỹ", "y", $value);
    $value = str_replace("ỵ", "y", $value);
    #---------------------------------Y

    $value = str_replace("Ý", "y", $value);
    $value = str_replace("Ỳ", "y", $value);
    $value = str_replace("Ỷ", "y", $value);
    $value = str_replace("Ỹ", "y", $value);
    $value = str_replace("Ỵ", "y", $value);
    #---------------------------------DD

    $value = str_replace("Đ", "d", $value);
    $value = str_replace("đ", "d", $value);
    #---------------------------------o

    $value = str_replace("ó", "o", $value);
    $value = str_replace("ò", "o", $value);
    $value = str_replace("ỏ", "o", $value);
    $value = str_replace("õ", "o", $value);
    $value = str_replace("ọ", "o", $value);
    #---------------------------------O

    $value = str_replace("Ó", "o", $value);
    $value = str_replace("Ò", "o", $value);
    $value = str_replace("Ỏ", "o", $value);
    $value = str_replace("Õ", "o", $value);
    $value = str_replace("Ọ", "o", $value);
    #---------------------------------u

    $value = str_replace("ú", "u", $value);
    $value = str_replace("ù", "u", $value);
    $value = str_replace("ủ", "u", $value);
    $value = str_replace("ũ", "u", $value);
    $value = str_replace("ụ", "u", $value);
    #---------------------------------U

    $value = str_replace("Ú", "u", $value);
    $value = str_replace("Ù", "u", $value);
    $value = str_replace("Ủ", "u", $value);
    $value = str_replace("Ũ", "u", $value);
    $value = str_replace("Ụ", "u", $value);
    #---------------------------------

    return $value;
}

function v2e($value)
{
    #---------------------------------SPECIAL
    $value = str_replace("&quot;", "", $value);
    $value = str_replace(".", "", $value);
    $value = str_replace("=", "", $value);
    $value = str_replace("+", "", $value);
    $value = str_replace("!", "", $value);
    $value = str_replace("@", "", $value);
    $value = str_replace("#", "", $value);
    $value = str_replace("$", "", $value);
    $value = str_replace("%", "", $value);
    $value = str_replace("^", "", $value);
    $value = str_replace("&", "", $value);
    $value = str_replace("*", "", $value);
    $value = str_replace("(", "", $value);
    $value = str_replace(")", "", $value);
    $value = str_replace("`", "", $value);
    $value = str_replace("~", "", $value);
    $value = str_replace(",", "", $value);
    $value = str_replace("/", "", $value);
    $value = str_replace("\\", "", $value);
    $value = str_replace('"', "", $value);
    $value = str_replace("'", "", $value);
    $value = str_replace(":", "", $value);
    $value = str_replace(";", "", $value);
    $value = str_replace("|", "", $value);
    $value = str_replace("[", "", $value);
    $value = str_replace("]", "", $value);
    $value = str_replace("{", "", $value);
    $value = str_replace("}", "", $value);
    $value = str_replace("(", "", $value);
    $value = str_replace(")", "", $value);
    $value = str_replace("?", "", $value);
    #---------------------------------a^

    $value = str_replace("â", "a", $value);
    $value = str_replace("ấ", "a", $value);
    $value = str_replace("ầ", "a", $value);
    $value = str_replace("ẩ", "a", $value);
    $value = str_replace("ẫ", "a", $value);
    $value = str_replace("ậ", "a", $value);
    #---------------------------------A^

    $value = str_replace("Â", "a", $value);
    $value = str_replace("Ấ", "a", $value);
    $value = str_replace("Ầ", "a", $value);
    $value = str_replace("Ẩ", "a", $value);
    $value = str_replace("Ẫ", "a", $value);
    $value = str_replace("Ậ", "a", $value);
    #---------------------------------a

    $value = str_replace("á", "a", $value);
    $value = str_replace("à", "a", $value);
    $value = str_replace("ả", "a", $value);
    $value = str_replace("ã", "a", $value);
    $value = str_replace("ạ", "a", $value);
    #---------------------------------A

    $value = str_replace("Á", "a", $value);
    $value = str_replace("À", "a", $value);
    $value = str_replace("Ả", "a", $value);
    $value = str_replace("Ã", "a", $value);
    $value = str_replace("Ạ", "a", $value);
    #---------------------------------a(

    $value = str_replace("ă", "a", $value);
    $value = str_replace("ắ", "a", $value);
    $value = str_replace("ằ", "a", $value);
    $value = str_replace("ẳ", "a", $value);
    $value = str_replace("ẵ", "a", $value);
    $value = str_replace("ặ", "a", $value);
    #---------------------------------A(

    $value = str_replace("Ă", "a", $value);
    $value = str_replace("Ắ", "a", $value);
    $value = str_replace("Ằ", "a", $value);
    $value = str_replace("Ẳ", "a", $value);
    $value = str_replace("Ẵ", "a", $value);
    $value = str_replace("Ặ", "a", $value);
    $value = str_replace("Ă", "a", $value);
    #---------------------------------e^

    $value = str_replace("ê", "e", $value);
    $value = str_replace("ế", "e", $value);
    $value = str_replace("ề", "e", $value);
    $value = str_replace("ể", "e", $value);
    $value = str_replace("ễ", "e", $value);
    $value = str_replace("ệ", "e", $value);
    #---------------------------------E^

    $value = str_replace("Ê", "e", $value);
    $value = str_replace("Ế", "e", $value);
    $value = str_replace("Ề", "e", $value);
    $value = str_replace("Ể", "e", $value);
    $value = str_replace("Ễ", "e", $value);
    $value = str_replace("Ệ", "e", $value);
    #---------------------------------e

    $value = str_replace("é", "e", $value);
    $value = str_replace("è", "e", $value);
    $value = str_replace("ẻ", "e", $value);
    $value = str_replace("ẽ", "e", $value);
    $value = str_replace("ẹ", "e", $value);
    #---------------------------------E

    $value = str_replace("É", "e", $value);
    $value = str_replace("È", "e", $value);
    $value = str_replace("Ẻ", "e", $value);
    $value = str_replace("Ẽ", "e", $value);
    $value = str_replace("Ẹ", "e", $value);
    #---------------------------------i

    $value = str_replace("í", "i", $value);
    $value = str_replace("ì", "i", $value);
    $value = str_replace("ỉ", "i", $value);
    $value = str_replace("ĩ", "i", $value);
    $value = str_replace("ị", "i", $value);
    #---------------------------------I

    $value = str_replace("Í", "i", $value);
    $value = str_replace("Í", "i", $value);
    $value = str_replace("Ỉ", "i", $value);
    $value = str_replace("Ĩ", "i", $value);
    $value = str_replace("Ị", "i", $value);
    #---------------------------------o^

    $value = str_replace("ô", "o", $value);
    $value = str_replace("ố", "o", $value);
    $value = str_replace("ồ", "o", $value);
    $value = str_replace("ổ", "o", $value);
    $value = str_replace("ỗ", "o", $value);
    $value = str_replace("ộ", "o", $value);
    #---------------------------------O^

    $value = str_replace("Ô", "o", $value);
    $value = str_replace("Ố", "o", $value);
    $value = str_replace("Ồ", "o", $value);
    $value = str_replace("Ổ", "o", $value);
    $value = str_replace("Ỗ", "o", $value);
    $value = str_replace("Ộ", "o", $value);
    #---------------------------------o*

    $value = str_replace("ơ", "o", $value);
    $value = str_replace("ớ", "o", $value);
    $value = str_replace("ờ", "o", $value);
    $value = str_replace("ở", "o", $value);
    $value = str_replace("ỡ", "o", $value);
    $value = str_replace("ợ", "o", $value);
    #---------------------------------O*

    $value = str_replace("Ơ", "o", $value);
    $value = str_replace("Ớ", "o", $value);
    $value = str_replace("Ờ", "o", $value);
    $value = str_replace("Ở", "o", $value);
    $value = str_replace("Ỡ", "o", $value);
    $value = str_replace("Ợ", "o", $value);
    #---------------------------------u*

    $value = str_replace("ư", "u", $value);
    $value = str_replace("ứ", "u", $value);
    $value = str_replace("ừ", "u", $value);
    $value = str_replace("ử", "u", $value);
    $value = str_replace("ữ", "u", $value);
    $value = str_replace("ự", "u", $value);
    #---------------------------------U*

    $value = str_replace("Ư", "u", $value);
    $value = str_replace("Ứ", "u", $value);
    $value = str_replace("Ừ", "u", $value);
    $value = str_replace("Ử", "u", $value);
    $value = str_replace("Ữ", "u", $value);
    $value = str_replace("Ự", "u", $value);
    #---------------------------------y

    $value = str_replace("ý", "y", $value);
    $value = str_replace("ỳ", "y", $value);
    $value = str_replace("ỷ", "y", $value);
    $value = str_replace("ỹ", "y", $value);
    $value = str_replace("ỵ", "y", $value);
    #---------------------------------Y

    $value = str_replace("Ý", "y", $value);
    $value = str_replace("Ỳ", "y", $value);
    $value = str_replace("Ỷ", "y", $value);
    $value = str_replace("Ỹ", "y", $value);
    $value = str_replace("Ỵ", "y", $value);
    #---------------------------------DD

    $value = str_replace("Đ", "d", $value);
    $value = str_replace("đ", "d", $value);
    #---------------------------------o

    $value = str_replace("ó", "o", $value);
    $value = str_replace("ò", "o", $value);
    $value = str_replace("ỏ", "o", $value);
    $value = str_replace("õ", "o", $value);
    $value = str_replace("ọ", "o", $value);
    #---------------------------------O

    $value = str_replace("Ó", "o", $value);
    $value = str_replace("Ò", "o", $value);
    $value = str_replace("Ỏ", "o", $value);
    $value = str_replace("Õ", "o", $value);
    $value = str_replace("Ọ", "o", $value);
    #---------------------------------u

    $value = str_replace("ú", "u", $value);
    $value = str_replace("ù", "u", $value);
    $value = str_replace("ủ", "u", $value);
    $value = str_replace("ũ", "u", $value);
    $value = str_replace("ụ", "u", $value);
    #---------------------------------U

    $value = str_replace("Ú", "u", $value);
    $value = str_replace("Ù", "u", $value);
    $value = str_replace("Ủ", "u", $value);
    $value = str_replace("Ũ", "u", $value);
    $value = str_replace("Ụ", "u", $value);
    #---------------------------------

    return $value;
}

if (!function_exists('SEO')) {
    function SEO($name = '')
    {
        $name = v2e($name);
        $name = preg_replace("/[^a-z,A-Z,0-9,_,-]/", "-", $name);
        $name = str_replace("---", "-", $name);
        $name = str_replace("--", "-", $name);
        return strtolower($name);
    }
}

if (!function_exists('random_string')) {
    function random_string($length = 4)
    {
        $sWord = '';
        $sChars = 'abcdefghjklmnprtwyzABCDEFGHJKLMNPRTWXYZ1234567890';
        for ($i = 1; $i <= $length; $i++) {
            $nNumber = rand(1, strlen($sChars));
            $sWord .= substr($sChars, $nNumber - 1, 1);
        }
        return $sWord;
    }
}

if (!function_exists('pr')) {
    function pr($data, $type = 0)
    {
        $ip = getIP();
        //if ($ip == '183.91.30.105' || $ip == '127.0.0.1') {
        if (1) {
            print '<pre>';
            print_r($data);
            print '</pre>';
            if ($type != 0) {
                exit();
            }
        }
    }
}

if (!function_exists('CutText')) {
    function CutText($text, $n = 80)
    {
        // string is shorter than n, return as is
        if (strlen($text) <= $n) {
            return $text;
        }
        $text = substr($text, 0, $n);
        if ($text[$n - 1] == ' ') {
            return trim($text) . "...";
        }
        $x = explode(" ", $text);
        $sz = sizeof($x);
        if ($sz <= 1) {
            return $text . "...";
        }
        $x[$sz - 1] = '';
        return trim(implode(" ", $x)) . "...";
    }
}

function getIP()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) //check ip from share internet
    {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) //to check ip is pass from proxy
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function resizeImage($src, $w = 0, $h = 0)
{
    if ($w != 0 && $h != 0) {
        return PATH_URL . 'imgresize.php?width=' . $w . '&height=' . $h . '&cropratio=1:1&image=' . $src;
    } elseif ($w != 0) {
        return PATH_URL . 'imgresize.php?width=' . $w . '&image=' . $src;
    } elseif ($h != 0) {
        return PATH_URL . 'imgresize.php?height=' . $h . '&image=' . $src;
    }
}

if (!function_exists('img')) {
    function img($image_path, $width = 0, $height = 0)
    {
        //Get the Codeigniter object by reference
        $CI = & get_instance();
        //Alternative image if file was not found
        if (!file_exists($image_path) || !is_file($image_path)) {
            $image_path = 'static/images/img/no-image.jpg';
        }

        //The new generated filename we want
        $fileinfo = pathinfo($image_path);

        //MAKE A FOLDER
        if (!empty($width) && !empty($height)) {
            $uploadDir_Thumb = 'static/cache/' . $width . 'x' . $height . '/';
        } else {
            $uploadDir_Thumb = 'static/cache/thumb/';
        }
        Newfolder($uploadDir_Thumb);
        $new_image_path = $uploadDir_Thumb . $fileinfo['filename'] . '.' . $fileinfo['extension'];

        //The first time the image is requested
        //Or the original image is newer than our cache image
        if ((!file_exists($new_image_path)) || filemtime($new_image_path) < filemtime($image_path)) {
            $CI->load->library('image_lib');
            //The original sizes
            $original_size = getimagesize($image_path);
            $original_width = $original_size[0];
            $original_height = $original_size[1];
            $ratio = $original_width / $original_height;


            //The requested sizes
            $requested_width = $width;
            $requested_height = $height;

            //if smaller then return
            if (($requested_width > $original_width) && $requested_height == 0)
                return PATH_URL . $image_path;
            elseif (($requested_height > $original_height) && $requested_width == 0)
                return PATH_URL . $image_path;
            //Initialising
            $new_width = 0;
            $new_height = 0;

            //Calculations
            if ($requested_width > $requested_height) {
                $new_width = $requested_width;
                $new_height = $new_width / $ratio;
                if ($requested_height == 0)
                    $requested_height = $new_height;

                if ($new_height < $requested_height) {
                    $new_height = $requested_height;
                    $new_width = $new_height * $ratio;
                }
            } else {
                $new_height = $requested_height;
                $new_width = $new_height * $ratio;
                if ($requested_width == 0)
                    $requested_width = $new_width;

                if ($new_width < $requested_width) {
                    $new_width = $requested_width;
                    $new_height = $new_width / $ratio;
                }
            }

            $new_width = ceil($new_width);
            $new_height = ceil($new_height);

            //Resizing
            $config = array();
            $config['image_library'] = 'gd2';
            $config['source_image'] = $image_path;
            $config['new_image'] = $new_image_path;
            $config['maintain_ratio'] = FALSE;
            $config['height'] = $new_height;
            $config['width'] = $new_width;
            $CI->image_lib->initialize($config);
            $CI->image_lib->resize();
            $CI->image_lib->clear();
            //Crop if both width and height are not zero
            if (($width != 0) && ($height != 0)) {
                $x_axis = floor(($new_width - $width) / 2);
                $y_axis = floor(($new_height - $height) / 2);

                //Cropping
                $config = array();
                $config['source_image'] = $new_image_path;
                $config['maintain_ratio'] = FALSE;
                $config['new_image'] = $new_image_path;
                $config['width'] = $width;
                $config['height'] = $height;
                $config['x_axis'] = $x_axis;
                $config['y_axis'] = $y_axis;
                $config['quality'] = '100%';
                $CI->image_lib->initialize($config);
                $CI->image_lib->crop();
                $CI->image_lib->clear();
            }
        }
        return PATH_URL . $new_image_path;
    }
}
function check_dir_upload($targetDir)
{
    if (!is_dir($targetDir . date('Y'))) {
        @mkdir($targetDir . date('Y'), 0777);
    }
    if (!is_dir($targetDir . date('Y') . '/' . date('m'))) {
        @mkdir($targetDir . date('Y') . '/' . date('m'), 0777);
    }
    if (!is_dir($targetDir . date('Y') . '/' . date('m') . '/' . date('d'))) {
        @mkdir($targetDir . date('Y') . '/' . date('m') . '/' . date('d'), 0777);
    }
}

function parserEditorHTML($str)
{
    $str = str_replace('../../../static/uploads/editor/', PATH_URL . 'static/uploads/editor/', $str);
    $str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)&amp;feature=([A-Za-z0-9]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);
    $str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);
    return $str;
}

function url_login_openid($type = 'google')
{
    if ($type == 'google') {
        $params = array(
            'response_type' => 'token',
            'client_id' => G_CLIENT_ID,
            'redirect_uri' => REDIRECT_URL,
            'state' => 'profile',
            'scope' => 'https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile https://www.google.com/m8/feeds'
        );

        $url = 'https://accounts.google.com/o/oauth2/auth?';
        foreach ($params as $key => $param) {
            $url .= $key . '=' . urlencode($param) . '&';
        }
    }
    if ($type == 'yahoo') {
        $params = array(
            'openid.claimed_id' => 'http://specs.openid.net/auth/2.0/identifier_select',
            'openid.identity' => 'http://specs.openid.net/auth/2.0/identifier_select',
            'openid.mode' => 'checkid_setup',
            'openid.ns' => 'http://specs.openid.net/auth/2.0',
            'openid.realm' => PATH_URL,
            'openid.return_to' => REDIRECT_URL . '/login/yahoo',
            'openid.ns.oauth' => 'http://specs.openid.net/extensions/oauth/1.0',
            'openid.oauth.consumer' => YH_CLIENT_KEY,
            'openid.ns.ax' => 'http://openid.net/srv/ax/1.0',
            'openid.ax.mode' => 'fetch_request',
            'openid.ax.required' => 'email,fullname,nickname,gender,language,timezone,image',
            'openid.ax.type.email' => 'http://axschema.org/contact/email',
            'openid.ax.type.fullname' => 'http://axschema.org/namePerson',
            'openid.ax.type.nickname' => 'http://axschema.org/namePerson/friendly',
            'openid.ax.type.gender' => 'http://axschema.org/person/gender',
            'openid.ax.type.image' => 'http://axschema.org/media/image/default',
        );

        $url = 'https://open.login.yahooapis.com/openid/op/auth?';
        foreach ($params as $key => $param) {
            $url .= $key . '=' . urlencode($param) . '&';
        }
    }
    if ($type == 'fb') {
        $url = 'https://www.facebook.com/dialog/oauth/?client_id=' . FB_CLIENT_ID . '&redirect_uri=' . REDIRECT_URL . '&state=' . FB_CLIENT_SECRET . '&display=popup&scope=email,publish_stream';
    }
    return $url;
}

function get_attr_profile_openid($type)
{
    if ($type == 'google') {
        include_once('application/libraries/eac_curl.class.php');
        $options = array();
        $options['CURLOPT_AUTOREFERER'] = 1;
        $options['CURLOPT_CRLF'] = 1;
        $options['CURLOPT_NOPROGRESS'] = 1;
        $http = new cURL($options);
        $http->setOptions($options);
        $src = $http->get("https://www.googleapis.com/oauth2/v1/userinfo?access_token=" . $_GET['access_token']);
        $contact = $http->get("https://www.google.com/m8/feeds/contacts/default/full?max-results=5000&oauth_token=" . $_GET['access_token']);
        $xml = new SimpleXMLElement($contact);
        $xml->registerXPathNamespace('gd', 'http://schemas.google.com/g/2005');
        $result = $xml->xpath('//gd:email');

        $profile = json_decode($src);
        $info['type'] = 'google';
        if (isset($profile->id)) {
            $info['id'] = $profile->id;
        } else {
            $info['id'] = '';
        }
        if ($profile->email) {
            $info['email'] = $profile->email;
        } else {
            $info['email'] = '';
        }
        if ($profile->verified_email) {
            $info['verified_email'] = $profile->verified_email;
        } else {
            $info['verified_email'] = '';
        }
        if ($profile->name) {
            $info['full_name'] = $profile->name;
        } else {
            $info['full_name'] = '';
        }
        if ($profile->given_name) {
            $info['f_name'] = $profile->given_name;
        } else {
            $info['f_name'] = '';
        }
        if ($profile->family_name) {
            $info['l_name'] = $profile->family_name;
        } else {
            $info['l_name'] = '';
        }
        if (isset($profile->picture)) {
            $info['avatar'] = $profile->picture;
        } else {
            $info['avatar'] = '';
        }
        if (isset($profile->locale)) {
            $info['locale'] = $profile->locale;
        } else {
            $info['locale'] = '';
        }
        if (isset($profile->timezone)) {
            $info['timezone'] = $profile->timezone;
        } else {
            $info['timezone'] = '';
        }
        if (isset($profile->gender)) {
            $info['gender'] = $profile->gender;
        } else {
            $info['gender'] = '';
        }
        foreach ($result as $title) {
            $info['contact'][] = $title->attributes()->address;
        }
    } elseif ($type == 'yahoo') {
        $info['type'] = 'yahoo';
        if (isset($_REQUEST['openid_ax_value_email'])) {
            $info['email'] = $_REQUEST['openid_ax_value_email'];
        } else {
            $info['email'] = '';
        }

        if (isset($_REQUEST['openid_ax_value_fullname'])) {
            $info['full_name'] = $_REQUEST['openid_ax_value_fullname'];
        } else {
            $info['full_name'] = '';
        }

        if (isset($_REQUEST['openid_ax_value_nickname'])) {
            $info['nick_name'] = $_REQUEST['openid_ax_value_nickname'];
        } else {
            $info['nick_name'] = '';
        }

        if (isset($_REQUEST['openid_ax_value_gender'])) {
            $info['gender'] = $_REQUEST['openid_ax_value_gender'];
        } else {
            $info['gender'] = '';
        }

        if (isset($_REQUEST['openid_ax_value_image'])) {
            $info['avatar'] = $_REQUEST['openid_ax_value_image'];
        } else {
            $info['avatar'] = '';
        }
    } else {
        $facebook = new Facebook(array(
            'appId' => FB_CLIENT_ID,
            'secret' => FB_CLIENT_SECRET,
        ));
        $user_id = $facebook->getUser();
        if ($user_id) {
            $user_info = $facebook->api('/me');
            $list_firend = $facebook->api('/me/friends');
            $info['type'] = 'facebook';
            $info['uid'] = $user_info['id'];
            $info['email'] = $user_info['email'];
            $info['full_name'] = $user_info['name'];
            $info['list_firend'] = $list_firend;
        }
    }
    return $info;
}

function getRSSFeed($feed_url)
{
    $content = file_get_contents($feed_url);
    $x = new SimpleXmlElement($content);
    $data = $x->channel->item;
    return $data;
}

if (!function_exists('Newfolder')) {

    function Newfolder($folder)
    {
        $arr_folder = explode('/', $folder);
        $fol = '';
        foreach ($arr_folder as $row) {
            if (!empty($row)) {
                $fol .= $row . '/';
                if (!file_exists($fol)) {
                    @mkdir($fol, 0777);
                } else {
                    if ($row != 'static') {
                        $mod = substr(sprintf('%o', fileperms($fol)), -4);
                        if ($mod != 0777) {
                            @chmod($fol, 0777);
                        }
                    }
                }
            }
        }
    }

}
/**
 * getSiteName()
 *
 * @return
 */
if (!function_exists('getSiteName')) {
    function getSiteName()
    {
        $retval = '';
        $CI = & get_instance();
        $CI->db->where('slug', 'title-admincp');
        $row = $CI->db->get('admin_nqt_settings')->row();
        if (!empty($row))
            $retval = $row->content;
        return $retval;
    }
}
if (!function_exists('pagination_ajax')) {

    function pagination_ajax($totalRows, $pageNum = 1, $pageSize, $limit = 3, $link_url = "", $class = "")
    {
        settype($totalRows, "int");
        settype($pageSize, "int");
        if ($totalRows <= 0)
            return "";
        $totalPages = ceil($totalRows / $pageSize);
        if ($totalPages <= 1)
            return "";
        $currentPage = $pageNum;
        if ($currentPage <= 0 || $currentPage > $totalPages)
            $currentPage = 1;

        //From to
        $form = $currentPage - $limit;
        $to = $currentPage + $limit;

        //Tinh toan From to
        if ($form <= 0) {
            $form = 1;
            $to = $limit * 2;
        };
        if ($to > $totalPages)
            $to = $totalPages;

        //Tinh toan nut first prev next last
        $first = '';
        $prev = '';
        $next = '';
        $last = '';
        $link = '';

        //Link URL
        $linkUrl = current_url();

        $get = '';
        $querystring = '';
        if ($_GET) {
            foreach ($_GET as $k => $v) {
                if ($k != 'p')
                    $querystring = $querystring . "&{$k}={$v}";
            }
            $querystring = substr($querystring, 1);
            $get .= '?' . $querystring;
        }
        $sep = (!empty($querystring)) ? '&' : '';
        $linkUrl = $linkUrl . '?' . $querystring . $sep . 'p=';

        if ($currentPage > $limit + 2) {
            /** first */
            //$first= "<a href='$linkUrl' class='first'>...</a>&nbsp;";
        }

        /*         * **** prev ** */
        if ($currentPage > 1) {
            $prevPage = $currentPage - 1;
            $prev = "<a href=\"Javascript:void(0);\" class=\"prev ajax_a\" rel=\"$link_url\" data-page=\"$prevPage\"><</a>";
        }

        /*         * *Next** */
        if ($currentPage < $totalPages) {
            $nextPage = $currentPage + 1;
            $next = "<a href=\"Javascript:void(0);\" class=\"next ajax_a\" rel=\"$link_url\" data-page=\"$nextPage\">></a>";
        }

        /*         * *Last** */
        if ($currentPage < $totalPages - 4) {
            $lastPage = $totalPages;
            //$last= "<a href='$linkUrl$lastPage' class='last'>...</a>";
        }

        /*         * *Link** */
        for ($i = $form; $i <= $to; $i++) {
            if ($currentPage == $i)
                $link .= "<span>$i</span>";
            else
                $link .= "<a class=\"ajax_a\" href=\"Javascript:void(0);\" rel=\"$link_url\" data-page=\"$i\" >$i</a>";
        }

        $pagination = '<div class="pagination">' . $first . $prev . $link . $next . $last . '</div>';

        return $pagination;
    }

}

if (!function_exists('post')) {
    function post($link = '', $field = array())
    {
        include_once('application/libraries/eac_curl.class.php');
        $options = array();
        $fields = array();
        $options['CURLOPT_AUTOREFERER'] = 1;
        $options['CURLOPT_CRLF'] = 1;
        $options['CURLOPT_NOPROGRESS'] = 1;
        $options['CURLOPT_RETURNTRANSFER'] = 1;
        $http = new cURL($options);
        $http->setOptions($options);
        $result = $http->post($link, $field);
        return $result;
    }
}


if (!function_exists('EDITOR')) {
    function EDITOR($str, $width = '')
    {
        $str = str_replace('../../../static/uploads/editor/', PATH_URL . 'static/uploads/editor/', $str);
        $str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)&amp;feature=([A-Za-z0-9]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);
        $str = preg_replace('/http:\/\/www.youtube.com\/watch\?v=([A-Za-z0-9\-\_]+)/is', '<iframe width="500" height="289" src="http://www.youtube.com/embed/$1" frameborder="0" allowfullscreen></iframe>', $str);
        if ($width != '') {
            preg_match_all('/src="(.*)"/msU', $str, $match);
            if (is_array($match[1])) {
                foreach ($match[1] as $item) {
                    if ($item != '') {
                        if (strstr(PATH_URL, $item)) {
                            $item_tmp = str_replace(PATH_URL, '', $item);
                            $str = str_replace($item, img($item_tmp, $width), $str);
                        }
                    }
                }
            }
        }
        return $str;
    }
}

if (!function_exists('truncateString_')) {
    function truncateString_($str, $len, $charset = "UTF-8")
    {
        $str = html_entity_decode($str, ENT_QUOTES, $charset);
        if (mb_strlen($str, $charset) > $len) {
            $arr = explode(' ', $str);
            $str = mb_substr($str, 0, $len, $charset);
            $arrRes = explode(' ', $str);
            $last = $arr[count($arrRes) - 1];
            unset($arr);
            if (strcasecmp($arrRes[count($arrRes) - 1], $last))
                unset($arrRes[count($arrRes) - 1]);
            return implode(' ', $arrRes) . "...";
        }
        return $str;
    }
}

if (!function_exists('last_query')) {

    function last_query($exit = false) {
        $CI = & get_instance();
        echo $CI->db->last_query();
        if ($exit) {
            exit();
        }
    }

}