<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('\UIcss\uiPackages')
    <title>Login | LOBI Poliwangi</title>
</head>
<body>
    @include('\UIcss\navbar-login')
    <div class="body-container">
        <div class="layout-background"></div>
        <img src="img-web/poliwa3.jpg" class="background">
        <div class="kotak-login admin">
        <form action="/login-admin" method="post" class="form-pengisian">
            @csrf
            <div class="judul-login-wrap">
                <p class="judul-Login">Log In.</p>
                <div class="line-judul-login"></div>
            </div>
            <div class="pengisian-username-password">
                <div class="kolom-wrap">
                <div class="satu-kolom-pengisian">
                    <p class="label-kolom">Username</p>
                    <input type="text" name="username" id="user" class="kolom-pengisian" placeholder="Masukan Username">
                </div>
                <div class="satu-kolom-pengisian">
                    <p class="label-kolom">Password</p>
                    <input type="password" name="password" id="password" class="kolom-pengisian" placeholder="Masukan Password">
                </div>
                </div>
                <img src="img-web/gembok.png" class="gambar-form-pengisian">
            </div>
            <button class="tombol-login" type="submit"><p>Log In</p></button>
        </form>
        </div>
    </div>
    @if (session()->has('authGagal'))
        <script>alert('Login Gagal, Silahkan Coba Lagi')</script>
    @endif
    @include('\UIcss\footer')
</body>
</html>