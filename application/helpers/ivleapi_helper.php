<?php

class IvleApi {

    public static function getAllModules($token) {
        // gets all modules. including those he is in charge of
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Modules?APIKey="
            . API_KEY
            . "&AuthToken="
            . $token
            . "&Duration=0&IncludeAllInfo=false";

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getStaffedModules($token) {
        // get only modules that he is a staff of
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Modules_Staff?APIKey="
            . API_KEY
            . "&AuthToken="
            . $token
            . "&Duration=0&IncludeAllInfo=false";

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getStudentModules($token) {
        // get only modules that he is a student of
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Modules_Student?APIKey="
            . API_KEY
            . "&AuthToken="
            . $token
            . "&Duration=0&IncludeAllInfo=false";

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getModuleDetails($token, $courseId) {
        // get the detail of this module id
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Module?APIKey="
            . API_KEY
            . "&AuthToken="
            . $token
            . "&Duration=0&IncludeAllInfo=false&CourseID="
            . $courseId
            . "&TitleOnly=true";

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

    public static function getClassRoster($token, $courseId) {
        // get the students from a course id.
        // course id is not module code! it is special.
        // get course id separately from the getmodules call
        $url = "https://ivle.nus.edu.sg/api/Lapi.svc/Class_Roster?APIKey="
            . API_KEY
            . "&AuthToken="
            . $token
            . "&CourseID="
            . $courseId;

        $apiResult = json_decode(file_get_contents($url));

        return $apiResult;
    }

}
