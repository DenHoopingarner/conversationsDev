<?php
echo '<p> this is ' . $myarr[0] . "</p>";
echo '<p> you said ' . $myarr[1] . '</p>';

// echo '<p><a href="test2/hithere/">Go to two</a></p>';
// echo '<p><a href="../../test2/whatevs">Go to two</a></p>';
// $link = $_SERVER['DOCUMENT_ROOT'] . '/app/test2/' . $myarr[1];
// echo '<p><a href="' . $link . '">Go to two</a></p>';
// echo '<p><a href="/app/test2/hi">Go to two</a></p>';
// echo '<p><a href="/app/test2/' . $myarr[1] . '/">Go to two</a></p>';

echo '<p><a href="/app/test2/' . rand(0, 100) . '/' . $myarr[1] . '">Go to two</a></p>';
