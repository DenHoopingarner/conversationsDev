<?php
echo '<p> this is ' . $myarr[0] . "</p>";
echo '<p> you said ' . $myarr[1] . '</p>';

// echo '<p><a href="test2/hithere/">Go to two</a></p>';
// echo '<p><a href="../../test1/whatevs">Go to one</a></p>';
echo '<p><a href="/app/test1/' . $myarr[2] . '/">Go to one</a></p>';
