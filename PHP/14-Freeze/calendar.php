<?php

// Days when the room is booked
$booked = [2, 6, 19, 27, 28];

function getBooking($i, $booked)
{

    $result = "";

    if (in_array($i, $booked)) {
        $result .= 'booked';
    }

    if ($i % 7 === 6 || $i % 7 === 0) {
        $result .= ' weekend';
    }

    return $result;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>
<section class="calendar">
    <?php for ($i = 1; $i <= 31; $i++): ?>
        <div class="day <?= getBooking($i, $booked) ?>">
            <?= $i; ?></div>
    <?php endfor; ?>
</section>

<!-- Todo 
- Add functionality to use the booked class on booked dates
- Add functionality to use the weekends class. Tip: a HTML element can belong to several classes, using the space as a separator.
- Put the calendar in a function that returns a string of html
- What if the month have 28, 29 or 30 days?
-->