<?php

$url = "https://script.google.com/macros/s/AKfycbxXhS2-i3AXVaXSrncLPNeC6naiiAAUEd7srZPZ2wfuR7X5JSEpQBNX7GatJOwJ0syFWg/exec";


$data = array(
    "name" => $_POST['name'],
    "designation" => $_POST['designation'],
    "organization" => $_POST['organization']
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) {
    echo "Error submitting to Google Sheet.";
} else {
    echo "Submitted successfully!";
}
?>
