<?php
    /*
     * Cookies: - save data in remote browser
     * - You can retrieve it when the user visit the site again
     */

    // save data to cookie
    setcookie('name', 'Phu Tam', time() + 24*3600);
    // after 1 day, cookie will be expired
    if (isset($_COOKIE['name'])) {
        echo $_COOKIE['name'];
    }
    // unset cookie
    setcookie('name', '', time() - 24*3600);
?>