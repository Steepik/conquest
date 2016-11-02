<?php

/**
 * Work with data from inputs
 *
 * Class Request
 */


class Request {

    /**
     * Filtration our data
     *
     * @param $data - get data from inputs
     * @return string - filtered data
     */

    public static function filtration($data)
    {
        $data = htmlspecialchars(trim(strip_tags($data)));
        return $data;
    }
}