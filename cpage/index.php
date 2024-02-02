<html lang="id">
<link rel="stylesheet" href="index.css">


</html>

<body>

    <div class="batasan2 ">
        <div class="konten ">
            <form method="POST" id="loginForm" action="../controller/loginCon.php">
                <div class="ilogin ">
                    <p id="loginp">LOGIN</p>
                    <label id="kiri1" for="uname">
                        <p>Username</p>
                    </label>
                    <label id="kiri2" for="pass">
                        <p>Password</p>
                    </label>
                    <input type="text" id="kanan1" name="Username" placeholder="username">
                    <input type="password" id="kanan2" name="Password" placeholder="password">
                    <input type="submit" id="loginn" name="login" value="login">
                    <div id="atur2">
                        <div id="atur">
                            <p id="registerT"> tidak punya akun? </p>
                            <input id="dis2" type="submit" name="login" value="Daftar">
                            <!-- <p>Daftar</p> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>
<script type="text/javascript" src="index.js "></script>