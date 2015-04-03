<?php

class SyncClassRoster extends CI_Controller {

    public function __construct() {
		parent::__construct();
    }

    public function index() {

        if (!(isset($_POST["moduleId"]))) {
            exit($this->_buildIncompleteFormResponse());
        }

        if (!$this->session->isLoggedIn || !($this->session->userType === USER_TYPE_LECTURER)) {
            exit($this->_buildAccessDeniedResponse());
        }

        echo $this->_buildResponse($_POST["moduleId"]);
    }



    private function _buildResponse($moduleId) {
        // try to insert to db
        // get response object from db telling me
        // whether it can insert or not

        $insertResult = $this->_syncToDb($moduleId);

        return json_encode($insertResult);
    }

    private function _syncToDb() {
        $roster = IvleApi::getClassRoster($this->session->userToken, $_POST["moduleId"]);
        $roster = $roster->Results;

        // need to check if the students in db are not in roster.
        // students in enrol and not in roster == remove from enrol
        $enrollment = $this->Dbquery->getStudentByModule($moduleId);
        if (count($roster) > count($enrollment)) {
            $limit = count($roster) + 1;
        } else {
            $limit = count($enrollment) + 1;
        }

        // SEARCH THROUGH the two arrays and add or remove respectively
        for ($r = 0, $e = 0; $i < $limit; $i++, $j++) {
            if ($r >= count($roster)) {
                //remove all the rest from enrol and exit
                $this->_removeAllFrom($enrollment, $e, $moduleId); // inclusive

            } else if ($e >= count($enrollment)) {
                // add all the rest from roster and exi
                $this->_addAllFrom($roster, $r, $moduleId);

            } else if ($this->_isEqual($roster[$r]->Name, $enrollment[$e]->name)) {
                // do nothing and increment both pointers

            } else if ($this->_isGreater($roster[$r]->Name, $enrollment[$e]->name)) {
                // remove from db and increment only e
                $r = $r - 1;
                $student = $enrollment[$e];
                $this->_removeEnrollment($student, $moduleId);

            } else if ($this->_isLesser($roster[$r]->Name, $enrollment[$e]->name)) {
                // add to db and increment only r
                $e = $e - 1;
                $student = $roster[$r];
                $this->_addStudent($student, $moduleId);
            }
        }

        return [
            "success" => TRUE,
            "classSize" => count($roster)
        ];
    }

    private function _removeAllFrom($enrol, $start, $moduleId) {
        for ($i = $start; $i < count($enrol); $i++) {
            $student = $enrol[$i];
            $this->_removeEnrollment($student, $moduleId);
        }
    }

    private function _addAllFrom($roster, $start, $moduleId) {
        for ($i = $start; $i < count($roster); $i++) {
            $student = $roster[$i];
            $this->_addStudent($student, $moduleId);
        }
    }

    private function _removeEnrollment($student, $moduleId) {
        $studentId = $student->userId;
        $this->Dbinsert->removeFromEnrollment($studentId, $moduleId);
    }

    private function _addStudent($student, $moduleId) {
        $studentName = $student->Name;
        $studentId = $student->UserID;
        $this->Dbinsert->insertStudentBaseInfo($studentId, $studentName, $moduleId);
    }





    // fail responses

    private function _buildIncompleteFormResponse() {
        $fail = [
            "success" => FALSE,
            "error" => "INCOMPLETE_FORM"
        ];

        return json_encode($fail);
    }

    private function _buildAccessDeniedResponse() {
        $fail = [
            "success" => FALSE,
            "error" => "ACCESS_DENIED"
        ];

        return json_encode($fail);
    }




    // helpers



    private function _isEqual($name, $other) {
        $name = strtolower($name);
        $other = strtolower($other);
        return $name === $other;
    }

    private function _isGreater($name, $other) {
        $name = strtolower($name);
        $other = strtolower($other);
        return $name > $other;
    }

    private function _isLesser($name, $other) {
        $name = strtolower($name);
        $other = strtolower($other);
        return $name < $other;
    }

}
