<?php


$period = new DatePeriod(
    new DateTimeImmutable('2022-01-01'),
    new DateInterval('P1M'),
    new DateTimeImmutable('2026-01-01')
);

$years = [];

foreach ($period as $date) {
    if ($date->format('m') !== '02') continue;
    $years[$date->format('Y')][$date->format('F')] = $date->format('t');
}



echo '<pre>';
print_r($years);
