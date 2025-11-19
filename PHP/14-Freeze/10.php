<?php
function Start_End_Date_of_a_week($week, $year)
{
    $time = strtotime("1 January $year", time()); // Getting the timestamp for January 1st of the given year.
    $day = date('w', $time); // Getting the numeric representation of the day of the week for January 1st.
    $time += ((7 * $week) + 1 - $day) * 24 * 3600; // Calculating the timestamp for the starting day of the given week.
    $dates[0] = date('Y-n-j', $time); // Formatting the starting date of the week.
    $time += 6 * 24 * 3600; // Adding six days to get the timestamp for the end of the week.
    $dates[1] = date('Y-n-j', $time); // Formatting the end date of the week.
    return $dates; // Returning the array containing the starting and end dates of the week.
}

$result = Start_End_Date_of_a_week(44, 2025); // Calling the function to get the starting and end dates of the 12th week of 2014.
echo 'Starting date of the week: ' . $result[0] . "\n"; // Outputting the starting date of the week.
echo 'End date the week: ' . $result[1]; // Outputting the end date of the week.
