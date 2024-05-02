@extends('\UIcss\indexGuestComponent')
@section('header-and-info-box')
<img src="img-web/beasiswaheader.jpg" class="header-img">
<div class="info-box-wrap">
    <div class="info-box">
        <div class="infobeasiswa">
            <p class="topik-info">Kuota Beasiswa</p>
            <p class="sub-info">6</p>
        </div>
        <p class="line-pembatas">|</p>
        <div class="infobeasiswa">
            <p class="topik-info">Beasiswa Aktif Tersedia</p>
            <p class="sub-info">6</p>
        </div>
        <p class="line-pembatas">|</p>
        <div class="infobeasiswa">
            <p class="topik-info">History Partisipasi Instansi</p>
            <p class="sub-info">6</p>
        </div>
    </div>
</div>
@endsection

@section('index-list-component')
@foreach ($data as $data)
    <a href=""><div class="boxbeasiswa">
        <div class="box-information">
            <div class="font-box-information">
                <p class="font-nama-beasiswa">{{ $data->nama_beasiswa }}</p>
                <p class="font-instansi-beasiswa">{{ $data->instansiBeasiswa->nama_instansi_beasiswa }}</p>
                <div class=""></div>
                <br><br><p class= "font-deadline-tetap">Register Terakhir Pada</p>
                <p class= "font-deadline">{{ $data->tanggal_penutupan }}</p>
                <p class="interaktif-font">Klik Untuk Lebih Lanjut</p>
            </div>
        </div>
        <img src="{{  asset('/storage/' . $data->data_foto) }}" class="foto-poster-preview-beasiswa">
    </div></a>
    @endforeach
@endsection
