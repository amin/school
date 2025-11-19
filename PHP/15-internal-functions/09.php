<?php

declare(strict_types=1);

$episodes = [
    ['title' => 'Bed Bugs and Beyond', 'released_at' => strtotime('11 Jun 2026')],
    ['title' => 'Comic Sans', 'released_at' => strtotime('6 Jun 2014')],
    ['title' => 'Double Trouble', 'released_at' => strtotime('27 Jul 2018')],
    ['title' => 'I Wasn\'t Ready', 'released_at' => strtotime('11 Jul 2013')],
    ['title' => 'Litchfield\'s Got Talent', 'released_at' => strtotime('9 Jun 2017')],
    ['title' => 'Little Mustachioed Shit', 'released_at' => strtotime('6 Jun 2014')],
    ['title' => 'The Animals', 'released_at' => strtotime('17 Jun 2016')],
    ['title' => 'Tied to the Tracks', 'released_at' => strtotime('9 Jun 2017')],
    ['title' => 'Tit Punch', 'released_at' => strtotime('11 Jul 2013')],
];

$filteredEpisodes = array_filter($episodes, fn($episode) => (int) date("Y", $episode['released_at']) === 2015);

print_r($filteredEpisodes);
