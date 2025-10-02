<?php
$file = "data.json";
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

usort($data, fn($a, $b) => $b['score'] <=> $a['score']);
//$data = array_slice($data, 0, 10);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>BOSSGAME LEADERBOARD</title>
<link rel="stylesheet" href="style.css">

<!--OLD SCHOOL ARCADE FONT-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1>LEADERBOARD</h1>
    <ol class="leaderboard">
    <?php foreach ($data as $index => $row): ?>
        <li class="player player-<?=$index+1?>">
            <?=htmlspecialchars($row['player'])?> — 
            <?=htmlspecialchars($row['score'])?>
        </li>
    <?php endforeach; ?>
    </ol>
</div>
</body>
</html>
