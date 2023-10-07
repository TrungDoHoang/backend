<?php

if (!function_exists('formatDatetime')) {
    function formatDatetime($time)
    {
        return date('d-m-Y', strtotime($time));
    }
}


if (!function_exists('formatShortDateValidated')) {
    function formatShortDateValidated($param, $key)
    {
        $param[$key] = '';
        if (
            (isset($param['day']) && strlen($param['day'])) &&
            (isset($param['month']) && strlen($param['month'])) &&
            (isset($param['year']) && strlen($param['year']))
        ) {
            $param[$key] = sprintf(
                '%s-%s-%s', 
                $param['day'], 
                $param['month'], 
                $param['year']
            );
        }

        return $param[$key];
    }
}
