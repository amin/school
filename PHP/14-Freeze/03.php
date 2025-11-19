<?php

$quotes = [
    "Come play with us, Danny.",
    "He's the little boy that lives in his mouth.",
    "Here's Johnny!",
    "Here's to five miserable months on the wagon, and all the irreparable harm it has caused me.",
    "Some places are like people: some shine and some don't.",
    "Wendy, I'm home."
];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ol>
        <?php

        foreach ($quotes as $quote) {
            echo "<li>$quote</li>";
        }
        ?>
    </ol>
</body>

</html>