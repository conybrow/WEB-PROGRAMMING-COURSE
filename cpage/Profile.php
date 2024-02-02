<?php
session_start();
include('header.php');
?>
    <link rel="stylesheet" href="Profile.css">
    <div class="batasan2">
        <div class="konten">
            <form method="POST" id="profile" name='profile' action="../controller/ProfileCon.php">
                <div class="Headr">
                    <p>Tlogin</p>
                </div>
                <div class="mid">
                    <p>Tisi</p>
                </div>
                <div class="botm">
                    <input type ='submit' name='logout' id='logout' value='logout'>
                </div>
            <form>
        </div>
    </div>
    <?php
    include('footer.php');
    ?>