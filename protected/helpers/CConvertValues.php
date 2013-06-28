<?php

class CConvertValues {

    public static function convBool($val) {

        switch($val){
            case 1:
                $value = 'Да';
                break;

            case 0:
                $value = 'Нет';
                break;

            default:
                $value = 'Не определено';
                $break;
        }

        return $value;
    }
}