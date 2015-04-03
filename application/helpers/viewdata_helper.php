<?php

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

            if ($session->userType === USER_TYPE_ADMIN) {
                $headerData["userProfile"] = $session->adminProfile;
                $headerData["name"] = $session->adminProfile["name"];
            } else if ($session->userType === USER_TYPE_STUDENT
                || $session->userType === USER_TYPE_LECTURER) {
                $headerData["userProfile"] = $session->userProfile;
                $headerData["name"] = $session->userProfile->Results[0]->Name;
            } else {
                $headerData["name"] = "name failed";
            }
        }

        return $headerData;
    }

}
