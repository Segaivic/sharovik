<?php

class CCrop {

    /**
     * @param $string строка до обрезки
     * @param $limit лимит обрезки
     * @return string
     */
    public static function crop_str($string, $limit)
	{
        if (strlen($string) < $limit) {
            $str  = $string;
        }

        else {
            $str = mb_substr($string,0, $limit, 'UTF-8').'...';   //режем строку от 0 до limit
        }

        return $str;

    }

}