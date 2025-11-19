<?php

declare(strict_types=1);

function formatInterval(DateInterval $interval, int $invert): string
{
    $parts = [];
    if ($interval->y > 0) {
        $parts[] = $interval->y . ' year' . ($interval->y === 1 ? '' : 's');
    }
    if ($interval->m > 0) {
        $parts[] = $interval->m . ' month' . ($interval->m === 1 ? '' : 's');
    }
    if ($interval->d > 0) {
        $parts[] = $interval->d . ' day' . ($interval->d === 1 ? '' : 's');
    }

    print_r($parts);
    die();

    $text = implode(', ', $parts) ?: 'today';

    return $invert
        ? "was released $text ago."
        : "will be released in $text.";
}

function diffInYears(int $timestamp): string
{
    $now = new DateTimeImmutable();
    $releaseDate = new DateTimeImmutable('@' . $timestamp);
    $interval = $now->diff($releaseDate);

    return formatInterval($interval, $interval->invert);
}

$episodes = [
    ['title' => 'Bed Bugs and Beyond', 'released_at' => strtotime('15 Sep 2015')],
    ['title' => 'Comic Sans', 'released_at' => strtotime('6 Jun 2014')],
    ['title' => 'Double Trouble', 'released_at' => strtotime('27 Jul 2018')],
    ['title' => 'I Wasn\'t Ready', 'released_at' => strtotime('11 Jul 2013')],
    ['title' => 'Litchfield\'s Got Talent', 'released_at' => strtotime('9 Jun 2017')],
    ['title' => 'Little Mustachioed Shit', 'released_at' => strtotime('6 Jun 2014')],
    ['title' => 'The Animals', 'released_at' => strtotime('17 Jun 2016')],
    ['title' => 'Tied to the Tracks', 'released_at' => strtotime('9 Jun 2017')],
    ['title' => 'Tit Punch', 'released_at' => strtotime('11 Jul 2013')],
];

foreach ($episodes as $episode) {
    printf(
        '%s %s<br>',
        htmlspecialchars($episode['title'], ENT_QUOTES, 'UTF-8'),
        diffInYears($episode['released_at'])
    );
}
