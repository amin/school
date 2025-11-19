<?php

declare(strict_types=1);

function formatUnit(int $value, string $unit): ?string
{
    if ($value === 0) return null;
    return sprintf('%d %s%s', $value, $unit, $value === 1 ? '' : 's');
}

function diffInYears(int $timestamp): string
{

    $now = new DateTimeImmutable();
    $releaseDate = new DateTimeImmutable('@' . $timestamp);
    $interval = $now->diff($releaseDate);

    $parts = array_filter([
        formatUnit($interval->y, 'year'),
        formatUnit($interval->m, 'month'),
        formatUnit($interval->d, 'day'),
    ]);

    if (empty($parts)) {
        return $interval->invert ? "was released today." : "will be released today.";
    }

    $text = implode(', ', $parts);

    return match ($interval->invert) {
        0 => "will be released in $text.",
        1 => "was released $text ago."
    };
}


$episodes = [
    ['title' => 'Bed Bugs and Beyond', 'released_at' => strtotime('15 Dec 2025')],
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
