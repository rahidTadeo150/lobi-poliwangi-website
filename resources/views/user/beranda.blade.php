<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/rebuild/non_admin_page/index_beranda.css">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    @include('\UIcss\uiPackages')
    <title>Beranda | LOBI Poliwangi</title>
</head>
<body>
    @include('\user\component\navbarDefault')
    <div class="overlay-header-wrap">   
        @auth('web')
        <h2 class="font">Selamat Datang Kembali, {{ $data_profil->nama_mahasiswa }}</h2>
        <p class="subtittle">Tetap Optimis Pada Niatmu, Percaya Dirilah Dengan Dirimu Sendiri, Tidak lah mustahil yang diatasmu itu bisa kamu kejar dengan hasil kerja kerasmu sendiri, Keep Try Hard!</p>
        <a href="/beranda-lobi-poliwangi">
            <div class="tombol-login-beranda">
                Explore Pengalamanmu Sekarang!
            </div>
        </a>
        @else
        <h2 class="font">Bingung Cari Prestasi dan Beasiswa</h2>
        <p class="subtittle">Tenang Saja Langkah Anda Sudah Benar, Disini Kami Menyediakan Informasi Seputar Beasiswa dan Lomba, Silahkan Log In Sebagai Mahasiswa Poliwangi Untuk Feature Lebihnya</p>
        <a href="/login">
            <div class="tombol-login-beranda">
                Login Sebagai Mahasiswa
            </div>
        </a>
        @endauth
        <div class="newssection">
            <div class="newsboard">
                <p class="news">NEW'S</p>
                <p class="board">Board</p>
            </div>
        <div class="linenews"></div>
        <div class="box-timeline-wrap">
            <div class="timelineberita">
            <div class="beritaterkini">
                <div class="labelberita">Beasiswa</div>
                <div class="berita">Osaka Beasiswa by Instansi A</div>
            </div>
            <div class="beritaterkini">
                <div class="labelberita">Lomba</div>
                <div class="berita">Lomba English Club by Instansi B</div>
            </div>
            <div class="beritaterkini">
                <div class="labelberita">Kemahasiswaan</div>
                <div class="berita">Violetta Margaret | Juara 1 Digital Ideas</div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="boximg">
    <div class="imageslide">
    <img src="img-web/poli 1.jpg">
    <img src="img-web/poliwa2.jpg">
    <img src="img-web/poliwa3.jpg">
    </div>
    </div>
    <div class="section2">
        <div class="services">
        <div class="servicesinfo">
        <p class="ourservices">OUR SERVICES.</p>
        <p class="tittleservices">Apa Yang Kami Layankan?</p>
        <p class="subservices">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sint, veniam vitae. Et sint soluta, cum suscipit, corporis reprehenderit consequuntur sequi ex unde eum accusamus omnis blanditiis possimus perferendis, eius eligendi!</p>
        </div>
        <div class="box-selection-wrap">
        <a href="/list-beasiswa"><div class="box-selection">
            <img src="img-web/topi.png" class="foto-logo-beasiswa">
            <p class="font-menu-only-beasiswa">Beasiswa Luar dan Dalam Negeri</p>
        </div></a>
        <a href="/list-lomba"><div class="box-selection">
            <img src="img-web/pendidikan.png" class="foto-logo-lomba">
            <p class="font-menu">Event Lomba Berprestasi</p>
        </div></a>
        <a href="/list-prestasi"><div class="box-selection">
            <img src="img-web/mahasiswa.png" class="foto-logo-mahasiswa">
            <p class="font-menu">Kemahasiswaan Poliwangi</p>
        </div></a>
        </div>
    </div>
    </div>
    @include('\UIcss\footer')
    @if (session()->has('message_logout'))
        <script>alert('{{ session('message_logout') }}')</script>
    @endif
</body>
</html>