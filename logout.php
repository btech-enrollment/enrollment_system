<?php

    session_start();
    session_unset();
    session_destroy();

    // sleep(3);

    // header('location: login.php?successfully+logout');
    $URL="login.php";
    echo "<script>location.href='$URL'</script>";
    exit;

?>