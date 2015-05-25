<?php

class ViewData {


    // initialises the data that goes into the header
    public static function makeHeaderData($session, $baseUrl, $loader = NULL) {

        // get an instance of codeigniter object so that
        // we can load models
        $CI = get_instance();

        $headerData = [
            "isLoggedIn" => $session->isLoggedIn,
            "baseUrl" => $baseUrl,
            "iteration" => $CI->Dbquery->getLatestIteration(),
            "loader" => $loader,
            "freeze" => ViewData::isFrozen($CI)
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
    
    // puts the event data into the bodydata
    public static function insertEventData($bodyData, $iteration, $iterInfo) {

        if (isset($iterInfo['startTime'])) {
            $startTime = $iterInfo['startTime'];
            
            $eventDateObj = new DateTime();
            $eventDateObj->setTimestamp($startTime);
            $eventStartTimeObj = new DateTime();
            $eventStartTimeObj->setTimestamp($startTime);
            
            $bodyData["eventDate"] = $eventDateObj->format("jS F Y");
            $bodyData["eventStartTime"] = $eventStartTimeObj->format("gA");
        }

        if (isset($iterInfo['endTime'])) {
            $endTime = $iterInfo['endTime'];
            
            $eventEndTimeObj = new DateTime();
            $eventEndTimeObj->setTimestamp($endTime);

            $bodyData["eventEndTime"] = $eventEndTimeObj->format("gA");
        }

        return $bodyData;
    }

    private static function isFrozen ($CI) {

        $iteration = $CI->Dbquery->getLatestIteration();
        $iterationInfo = $CI->Dbquery->getIterationInfoByIterate($iteration);

        if (isset($iterationInfo['cutOff'])) {
            $cutOff = $iterationInfo['cutOff'];
        } else {
            $cutOff = 0;
        }
        
        $now = time();

        if ($cutOff < $now) {
            return TRUE;
        } else {
            return FALSE;
        }

    }

}
