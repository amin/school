<?php

declare(strict_types=1);

$files = array_filter(scandir('files'), fn($file) => pathinfo($file, PATHINFO_EXTENSION) === 'txt');
$currentFile = $_GET['file'] ?? '';


function getNote(string $file, array $validFiles): string
{
    $safeName = basename($file);

    if (!in_array($safeName, $validFiles, true)) {
        return '';
    }

    $directory = __DIR__ . '/files/';
    $filePath = $directory . $safeName;

    if (file_exists($filePath)) {
        return file_get_contents($filePath);
    }
    return '';
}

if ($currentFile === '') {
    $content = 'Please select the file you wish to view.';
} else {
    $note = getNote($currentFile, $files);

    if ($note !== '') {
        $content = $note;
    } else {
        $content = 'Invalid file name';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            height: 100vh;
            width: 100vw;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .notes {
            display: flex;
            width: 80%;
            margin: 0 auto;
        }

        .notes-list {
            margin-right: 2rem;
        }

        .note-content {
            width: 65%;
        }

        .notes-list,
        .note-content {
            padding: 1rem;
            border: 1px solid #ccc;
        }
    </style>
</head>

<body>

    <div class="notes">
        <div class="notes-list">
            <?php if (!empty($files)) : ?>
                <?php foreach ($files as $file) : ?>
                    <div class="note-list-item">
                        <a href="?file=<?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars($file, ENT_QUOTES, 'UTF-8') ?></a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <div class="note-content">
            <p><?= htmlspecialchars($content, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
    </div>

</body>

</html>