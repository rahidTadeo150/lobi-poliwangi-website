<!-- Navbar Component -->
<div class="navbar-default-container">
    <div class="logo-font-warp">
        <div class="logo-warp">
            <img src="/img-web/logoPoliwangi.png" class="logo-poliwangi-navbar">
        </div>
        <div class="fontlogo">
        <p class="brand-font-default">Poliwangi</p>
        <p class="subtittle-font-default">Bid. Akademik dan Kemahasiswaan</p>
        </div>
    </div>
    <div class="selector-menu-default">
        <ul>
            <li><a href="/index-beasiswa">Beasiswa</a></li>
            <li><a href="/index-lomba">Lomba</a></li>
            <li><a href="/index-prestasi">Prestasi</a></li>
            @auth('mahasiswa')

            <li id="menu_akun">
                <div class="profil_akun_wrap">
                    <div class="profil_border">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <p class="username">362258302143</p>
                </div>
                <div class="opsi_akun">
                    <a href="/oauth/logout" onClick="return confirm('Apakah Anda Yakin Untuk Log Out?')">
                        <div class="sub_opsi">
                            <span><i class="fa-regular fa-user"></i></span>
                            <span>Profil Saya</span>
                        </div>
                        <div class="sub_opsi">
                            <span><i class="fa-solid fa-right-from-bracket"></i></span>
                            <span>Log Out</span>
                        </div>
                    </a>
                </div>
            </li>
            @else
            <li><a href="/login-mahasiswa">Masuk Sebagai Mahasiswa</a></li>
            @endauth
        </ul>
    </div>
</div>
<script>
    const akun_btn = document.querySelector('.profil_akun_wrap');
    const opsi_akun = document.querySelector('.opsi_akun');

    akun_btn.addEventListener('click', function () 
    {
        opsi_akun.classList.toggle('active');
    });
</script>   