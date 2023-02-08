<?php
// Gets the current date
echo date("m/d/Y", strtotime("now")), "\n"; // prints the current date
echo date("m/d/Y", strtotime("10 September 2000")), "\n"; // prints September 10, 2000 in the m/d/Y format
echo date("m/d/Y", strtotime("-1 day")), "\n"; // prints yesterday's date
echo date("m/d/Y", strtotime("+1 week")), "\n"; // prints the result of the current date + a week
echo date("m/d/Y", strtotime("+1 week -6 days 4 hours 2 seconds")), "\n"; // same as the last example but with extra days, hours, and seconds added to it
echo date("m/d/Y", strtotime("next Thursday")), "\n"; // prints next Thursday's date
echo date("m/d/Y", strtotime("last Monday")), "\n"; // prints last Monday's date
echo date("m/d/Y", strtotime("First day of next month")), "\n"; // prints date of first day of next month
echo date("m/d/Y", strtotime("Last day of next year")), "\n"; // prints date of last day of next month
echo date("m/d/Y", strtotime("First day of last month")), "\n"; // prints date of first day of last month
echo date("m/d/Y", strtotime("Last day of last month")), "\n"; // prints date of last day of last month