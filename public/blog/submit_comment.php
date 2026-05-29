<?php
date_default_timezone_set('NZ');
$secretKey = "6Lcn79QsAAAAAF2GiOqA24Z4Jtb9LAyPP1KPW4bQ";
$captchaResponse = $_POST['g-recaptcha-response'] ?? '';

$verifyUrl = "https://www.google.com/recaptcha/api/siteverify";
$data = [
    'secret'   => $secretKey,
    'response' => $captchaResponse,
    'remoteip' => $_SERVER['REMOTE_ADDR'] ?? null,
];

$options = [
    'http' => [
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ],
];

$context  = stream_context_create($options);
$result   = file_get_contents($verifyUrl, false, $context);
$resultObj = json_decode($result, true);

if (!empty($resultObj['success'])) {

    $name    = htmlspecialchars(trim($_POST['name'] ?? ''), ENT_QUOTES, 'UTF-8');
    $comment = htmlspecialchars(trim($_POST['comment'] ?? ''), ENT_QUOTES, 'UTF-8');

    $entry = [
        "time"    => "When: " . date("d-M-Y H:i"),
        "name"    => "Name: " . $name,
        "comment" => "Comment: " . $comment
    ];

    $file = "comments.json";

    if (!file_exists($file)) {
        file_put_contents($file, json_encode([]));
    }

    $comments = json_decode(file_get_contents($file), true);
    $comments[] = $entry;

    file_put_contents($file, json_encode($comments, JSON_PRETTY_PRINT));

    header("Location: resilience.php/#14comments");
    exit;
}
