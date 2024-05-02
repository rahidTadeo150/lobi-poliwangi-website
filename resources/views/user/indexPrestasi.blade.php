<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('\UIcss\uiPackages')
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="\css\rebuild\non_admin_page\index-list-prestasi.css">
    <title>Document</title>
</head>
<body>
    @include('\UIcss\navbar-default')
    <div class="section1">
        <div class="overlay">
            <div class="titlefont">
            <p class="title">Prestasi Mahasiswa</p>
            <p class="subtitle">Politeknik Negeri</p>
            <p class="subtitle">Banyuwangi.</p>
            </div>
            <div class="pictsample">
                <div class="ornamen2"></div>
                <div class="ornamen3"></div>
            <img src="img-web/perpus.jpg" class="image1"><br>
            </div>
        </div>
        <img src="img-web/454.jpg" class="headerimage">
    </div>
    <div class="section2">
        <div class="wrapbox">
            @foreach ($data as $data)
            <div class="boxprestasi">
                <div class="flexfoto">
                    <img src="img-web/w2.jpg" class="gambarmahasiswa">
                    <div class="biodata">
                        <p class="judulbio">Biodata</p>
                        <p class="fontbio">Nama : {{ $data->nama_mahasiswa }}</p>
                        <p class="fontbio">NIM : {{ $data->nim }}</p>
                        <p class="fontbio">Jurusan :  {{ $data->jurusan->nama_jurusan }}</p>
                        <p class="fontbio">Prodi : {{ $data->jurusan->prodi->nama_prodi }}</p>
                        <p class="judulbio mt-2">Prestasi</p>
                        <p class="fontbio">{{ $data->prestasi->nama_perlombaan_prestasi }}</p>
                        <p class="fontbio">{{ $data->prestasi->nama_prestasi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>