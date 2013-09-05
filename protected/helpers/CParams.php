<?php

class CParams {

    public static function params($paramKey, $paramValue) {
        $params = $_GET;
        $params[$paramKey] = $paramValue;
        return $params;
    }


}