<?php

$episodes = [
    ['title' => 'Standing Up in the Milky Way', 'rating' => 9.2, 'year' => 2014, 'month' => 'March', 'day' => 9],
    ['title' => 'Some of the Things That Molecules Do', 'rating' => 9.1, 'year' => 2014, 'month' => 'March', 'day' => 16],
    ['title' => 'When Knowledge Conquered Fear', 'rating' => 9.1, 'year' => 2014, 'month' => 'March', 'day' => 23],
    ['title' => 'A Sky Full of Ghosts', 'rating' => 9.1, 'year' => 2014, 'month' => 'March', 'day' => 30],
    ['title' => 'Hiding in the Light', 'rating' => 9.1, 'year' => 2014, 'month' => 'April', 'day' => 6],
    ['title' => 'Deeper, Deeper, Deeper Still', 'rating' => 8.8, 'year' => 2014, 'month' => 'April', 'day' => 13],
    ['title' => 'The Clean Room', 'rating' => 8.9, 'year' => 2014, 'month' => 'April', 'day' => 20],
    ['title' => 'Sisters of the Sun', 'rating' => 9.0, 'year' => 2014, 'month' => 'April', 'day' => 27],
    ['title' => 'The Lost Worlds of Planet Earth', 'rating' => 9.1, 'year' => 2014, 'month' => 'May', 'day' => 4],
    ['title' => 'The Electric Boy', 'rating' => 9.1, 'year' => 2014, 'month' => 'May', 'day' => 11],
    ['title' => 'The Immortals', 'rating' => 9.2, 'year' => 2014, 'month' => 'May', 'day' => 18],
    ['title' => 'The World Set Free', 'rating' => 9.2, 'year' => 2014, 'month' => 'June', 'day' => 1],
    ['title' => 'Unafraid of the Dark', 'rating' => 9.5, 'year' => 2014, 'month' => 'June', 'day' => 8],
];


foreach ($episodes as $episode) {
    if ($episode['rating'] >= 9.2) {
        echo $episode['title'] . '</br>';
    }
}
