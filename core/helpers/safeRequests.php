<?php


class safeRequests {

    public static function clearData($data) {
       $clean = trim(strip_tags(htmlspecialchars($data)));
       return $clean;


    }
}