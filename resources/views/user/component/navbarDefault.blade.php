<div class="w-full h-20 bg-[rgba(244,253,255,1)] fixed z-50 px-5 flex flex-row justify-between items-center">
    <div class="h-fit flex flex-row items-center">
        <img src="{{ asset('img-web\logoPoliwangi.png') }}" class="w-12 h-12">
        <div class="ml-2 -mt-2 text-blue-900">
            <p class="text-2xl font-bold">Lobi Poliwangi</p>
            <p class="text-xs font-medium ">Bid. Akademik dan Kemahasiswaan</p>
        </div>
    </div>
    <div class="w-fit text-[rgba(5,32,74,1)]">
        <ul class="flex flex-row items-center">
            <a href="/index-beasiswa">
                <li class="text-base hover:text-rose-400 font-semibold mr-10">Beasiswa</li>
            </a>
            <a href="/index-lomba">
                <li class="text-base hover:text-rose-400 font-semibold mr-10">Lomba</li>
            </a>
            <a href="/index-prestasi">
                <li class="text-base hover:text-rose-400 font-semibold mr-10">Prestasi</li>
            </a>
            @auth('mahasiswa')
            <li class="relative">
                <div id="avatarProfil" class="w-10 h-10 bg-slate-400 rounded-full"></div>
                <div id="dropdownOpsi" class="hidden w-56 h-fit bg-slate-50 border border-gray-200 absolute right-0 mt-2 rounded-md shadow-lg p-4">
                    <button id="closeButton" class="text-sm float-right text-gray-700">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                    <a href="/my-profil">
                        <p class="ease-in duration-300 w-full h-fit px-4 hover:px-6 py-1 text-sm font-medium border-b border-b-transparent hover:border-b-gray-400 mt-2"><span class="text-sm mr-2"><i class="fa-regular fa-user"></i></span>Profil Saya</p>
                    </a>
                    <a href="/oauth/logout">
                        <p class="ease-in duration-300 w-full h-fit px-4 hover:px-6 py-1 text-sm font-medium border-b border-b-transparent hover:border-b-gray-400"><span class="text-sm mr-2"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>Log Out</p>
                    </a>
                </div>
            </li>
            @else
            <a href="/login-mahasiswa">
                <li class="text-base hover:text-rose-400 font-semibold mr-10">Masuk Sebagai Mahasiswa</li>
            </a>
            @endauth
        </ul>
    </div>
</div>
<script src="js\navbar\openAvatarProfil.js"></script>
