<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('\UIcss\uiPackages')
    <title>{{ $titlePage }} | LOBI Poliwangi</title>
</head>
<body>
    @include('\UIcss\navbar-default')
    <div class="body-list-beasiswa">
        <div class="overlay-header">
            <div class="tittle-page">
            <h1 class="fname-page">{{ $headTittle }}</h1>
            <h1 class="lname-page">Center.</h1>
        </div>
        </div>
        @yield('header-and-info-box')
        <div class="headerIndexList">
            <form action="" method="get" class="form-pencarian-beasiswa">
                @csrf
                <div class="pencarianwrap">
                    <input type="search" name="pencarian" placeholder="Masukan Keyword" class="kolom-penarian-list">
                    <button type="submit" name="tblcari" class="tombol-cari">Cari</button>
                </div>
            </form>
            <div class="filterWrap">
                <div class="tblFilter">
                    Cari Berasarkan 
                </div>
                <div class="filterDropdown">
                    <form action="/index-{{ $containPage }}" method="get" class="formDropdown">
                        @csrf
                        <input type="hidden" name="opsiDropdown" value="" class="opsiDropdown">
                        <button type="submit" class="dropdownOpsi">Terbaru</button><br>
                        <button type="submit"class="dropdownOpsi">Terlama</button>
                        <button type="submit"class="dropdownOpsi">Status Aktif</button>
                        <button type="submit"class="dropdownOpsi">Status Nonaktif</button>
                        <button type="submit"class="dropdownOpsi">Lokal</button>
                        <button type="submit"class="dropdownOpsi">International</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="warpbox">
            @yield('index-list-component')
        </div>
    </div>
    @include('\UIcss\footer')
    <script src='\js\nonAdmin\indexData\filterDropdown.js'></script>
</body>
</html>