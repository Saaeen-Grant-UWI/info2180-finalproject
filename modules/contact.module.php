<?php

$errors = [];
$requestedContact = [];

if (!empty($_GET)) {
    if (!(count($_GET) > 1)) {
        if (!empty($_GET["contact"])) {
            $contactId = $_GET["contact"];
            $result = get_where("contacts", ["id", $contactId]);

            if (!empty($result)) {
                $requestedContact = $result[0];
            } else {
                $errors[0] = "Requested <span>contact</span> not found";
            }
        } else {
            $errors[0] = "Invalid <span>contact</span> request";
        }
    } else {
        $errors[0] = "Invalid amount of <span>contact</span> requests";
    }
} else {
    $errors[0] = "No <span>contact</span> request found";
}
?>
