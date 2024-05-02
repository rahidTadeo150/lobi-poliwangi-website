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
        <div class="kotak-login">
            <form action="/oauth/redirect" method="get" class="form-pengisian">
            @csrf
            <div class="judul-login-wrap">
                <p class="judul-Login">Log In.</p>
                <div class="line-judul-login"></div>
            </div>
            <div class="pengisian-username-password">
                <div class="opsiLogin">
                    <p class="fontTittleOpsi">Masuk Dengan :</p><br>
                    <button class="tombol-login" type="submit"><p>SSO Poliwangi</p></button>
                </div>
                <img src="img-web/gembok.png" class="gambar-form-pengisian">
            </div>
        </form>
        </div>
    </div>
    @if (session()->has('login_failed_error'))
        <script>alert('Login Gagal, Silahkan Coba Lagi')</script>
    @endif
    @include('\UIcss\footer')
</body>
</html>