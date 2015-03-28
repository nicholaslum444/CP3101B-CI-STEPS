<?php

define("Student", 3);
define("Lecturer", 2);
define("Unknown", -1);

class ViewData {

    public static function makeHeaderData($session, $baseUrl) {
        // initialise the data that goes into the header
        $headerData = [
            "isLoggedIn" => $session->isLoggedIn,
            "baseUrl" => $baseUrl
        ];

        // add additional data if user is logged in
        if($session->isLoggedIn) {
            $headerData["isLoggedIn"] = TRUE;
            $headerData["userType"] = $session->userType;

            if ($session->userType === "Admin") {
                $headerData["name"] = $session->name;
            } else if ($session->userType === Student
                || $session->userType === Lecturer) {
                $headerData["userProfile"] = $session->userProfile;
                $headerData["name"] = $session->userProfile->Results[0]->Name;
            } else {
                $headerData["name"] = "name failed";
            }
        }

        return $headerData;
    }

}
