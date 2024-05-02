@extends('\UIcss\indexGuestComponent')
@section('header-and-info-box')
<img src="img-web/beasiswaheader.jpg" class="header-img">
    <div class="info-box-wrap">
        <div class="info-box">
            <div class="infobeasiswa">
                <p class="topik-info">Kuota Lomba</p>
                <p class="sub-info">1</p>
            </div>
            <p class="line-pembatas">|</p>
            <div class="infobeasiswa">
                <p class="topik-info">Lomba Aktif Tersedia</p>
                <p class="sub-info">12</p>
            </div>
            <p class="line-pembatas">|</p>
            <div class="infobeasiswa">
                <p class="topik-info">History Partisipasi Instansi</p>
                <p class="sub-info">5</p>
            </div>
        </div>
    </div>
@endsection

@section('index-list-component')
@foreach ($data as $data)
<a href=""><div class="boxbeasiswa">
    <div class="box-information">
        <div class="font-box-information">
            <p class="font-nama-beasiswa">{{ $data->nama_lomba }}</p>
            <p class="font-instansi-beasiswa">{{ $data->instansiLomba->nama_instansi_lomba }}</p>
            <div class=""></div>
            <br><br><p class= "font-deadline-tetap">Register Terakhir Pada</p>
            <p class= "font-deadline">{{ $data->tanggal_penutupan }}</p>
            <p class="interaktif-font">Click Untuk Lebih Lanjut</p>
        </div>
    </div>
    <img src="{{ asset('/storage/' . $data->foto_brosur_lomba) }}" class="foto-poster-preview-beasiswa">
</div></a>
@endforeach
@endsection
