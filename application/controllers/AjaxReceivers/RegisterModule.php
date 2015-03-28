<?php

// this call returns JSON objects.
header("Content-Type: application/json");

main();

function main() {
    if (!(isset($_POST["moduleCode"]) && isset($_POST["moduleName"]))) {
        exit(buildFailureResponse());
    }

    echo buildResponse($_POST["moduleCode"], $_POST["moduleName"]);
}

function buildResponse($moduleCode, $moduleName) {
    // try to insert to db
    // get response object from db telling me
    // whether it can insert or not

    $insertResult = insertIntoDb($moduleCode, $moduleName);

    return json_encode($insertResult);
}

function insertIntoDb($mc, $mn) {
    return [
        "success" => TRUE
    ];
}

function buildFailureResponse() {
    $fail = [
        "success" => FALSE,
        "error" => "INCOMPLETE_FORM"
    ];

    return json_encode($fail);
}
