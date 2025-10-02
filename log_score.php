<?php
header('Content-Type: application/json');

$file = "data.json";

$data = json_decode(file_get_contents($file), true);

$input = json_decode(file_get_contents("php://input"), true);

$player = $input['player'] ?? null;
$score = $input['score'] ?? null;

if ($player && is_numeric($score))
{
    $data[] = [
        "player" => $player,
        "score" => (int)$score
    ];

    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    echo json_encode(["status" => "ok", "message" => "Score saved"]);
}
else
{
    echo json_encode(["status" => "error", "message" => "Invalid data"]);
}
