<?php
// setrawcookie("userid", "123", time() + 300, "/", 'localhost', false);
setcookie("username", "priteshYadav", time() + 300, "/", "localhost", false, true);
// setcookie("username", "", time() - 3600);

echo "<pre>";
print_r($_COOKIE);
?>
<script>
    document.cookie = "trackid=123123; expires=Thu, 18 Dec 2024 12:00:00 UTC; domain=localhost; path=/; ";
    let x = document.cookie;
    console.log(x);
</script>