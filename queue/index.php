<?php
require_once '../app/db.php';
require_once '../app/functions.php';

if (count($_POST) > 0) {
    $valid_request = true;

    /* Validate request */

    // Contains valid 'type': 'Citizen' or 'Anonymous'
    $valid_request = $valid_request && isset($_POST['type']) && in_array($_POST['type'], ['Citizen', 'Anonymous']);

    // Contains valid 'service': 'Council Tax', 'Benefits', 'Rent'
    $valid_request = $valid_request && isset($_POST['type']) && in_array($_POST['service'], ['Council Tax', 'Benefits', 'Rent']);

    // If queued item is a 'citizen'
    if ($valid_request && $_POST['type'] === 'Citizen') {
        $valid_request = !empty($_POST['firstName']) && !empty($_POST['lastName']);
    }

    if (!$valid_request) {
        return display_json([ 'Status' => 'Error', 'Data' => 'Sorry, invalid data.' ]);
    }

    // Add to queue

    $result = store($pdo,
        $_POST['type'] ?? null,
        $_POST['firstName'] ?? null,
        $_POST['lastName'] ?? null,
        $_POST['organization'] ?? null,
        $_POST['service'] ?? null
    );

    if ($result === true) {
        return display_json([ 'Status' => 'Success', 'Data' => 'Successly submitted to queue.' ]);
    }

    return display_json([ 'Status' => 'Error', 'Data' => 'Problem with saving to database.' ]);
}

// Else (treat as GET request)
$valid_request = !isset($_GET['type']) || in_array($_GET['type'], ['Citizen', 'Anonymous']) || count($_GET['type']) === 0;

if ($valid_request) {
    return display_json([
        'Status' => 'Success',
        'Data' => get($pdo, $_GET['type'] ?? false)
    ]);
}