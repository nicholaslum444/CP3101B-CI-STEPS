<?php

require_once "apikey.php";

class IvleUserAuth {

    // load the file where the api key is stored
    //$this->load->helper("apikey");

    public static function getValidationResult($token) {
        // call ivle api to validate token
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Validate?APIKey="
            . apikey
            . "&Token="
            . $token;

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getUserProfile($token) {
        // call ivle api to validate token
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Profile_View?APIKey="
            . apikey
            . "&AuthToken="
            . $token;

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getUserType($token) {
        // call ivle api to get user type (if possible)
        // return one of {"student", "lecturer"}

        // dummy value of "student" for now
        return "student";
    }

    public static function __getUserTypeDEBUG__($token, $student = TRUE) {
        if ($student) {
            return "student";
        } else {
            return "staff";
        }
    }

    public static function getUserID($token) {
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/UserID_Get?APIKey="
            . apikey
            . "&Token="
            . $token;

        $apiResult = json_decode(file_get_contents($url));

        if (empty($apiResult)) {
            return false;
        } else {
            return $apiResult;
        }
    }

}

?>
