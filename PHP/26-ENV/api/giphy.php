<?php

require_once __DIR__ . '/../vendor/autoload.php';
header('Content-Type: application/json');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

define('GIPHY_KEY', $_ENV['GIPHY_KEY']);
define('GIPHY_API_URL', 'https://api.giphy.com/v1/gifs/search?');


if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    die(json_encode(["error" => "Method not allowed"]));
}

$query = trim($_POST['search'] ?? '');
$limit = trim($_POST['limit'] ?? '');

if (!$query) {
    http_response_code(400);
    die(json_encode(["error" => "Search field cannot be empty."]));
}

$params = http_build_query([
    'api_key' => GIPHY_KEY,
    'q' => $query,
    'limit' => $limit,
    'offset' => 0,
    'rating' => 'g',
    'lang' => 'en',
    'bundle' => 'low_bandwidth',
]);

$data = @file_get_contents(sprintf('%s%s', GIPHY_API_URL, $params));

if ($data === false) {
    http_response_code(502);
    die(json_encode(["error" => "Failed to fetch from Giphy"]));
}

echo $data;
