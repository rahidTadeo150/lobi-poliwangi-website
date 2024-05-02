<div class="w-full h-16 bg-[#1A2B6B] fixed z-40 shadow-lg">
    <div class="flex flex-row justify-between px-4 h-full items-center">
        <div></div>
        <div class="h-fit w-fit px-3 py-1 flex flex-row items-center relative">
            <div class="text-lg text-gray-50 mr-3 p-2 border border-transparent cursor-pointer hover:border-gray-300 rounded-md">
                <i class="fa-regular fa-bell"></i>
            </div>
            <div id="avatarProfil" class="cursor-pointer w-12 h-12 bg-slate-300 rounded-full"></div>
            <div id="dropdownOpsi" class="hidden w-56 h-fit bg-slate-50 border translate-y-20 border-gray-200 absolute right-0 mt-2 rounded-md shadow-lg p-4">
                <button id="closeButton" class="text-sm float-right text-gray-700">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <a href="/my-profil">
                    <p class="ease-in duration-300 w-full h-fit px-4 hover:px-6 py-1 text-sm font-medium border-b border-b-transparent hover:border-b-gray-400 mt-2"><span class="text-sm mr-2"><i class="fa-regular fa-user"></i></span>Profil Saya</p>
                </a>
                <a href="/my-profile/logout-admin">
                    <p class="ease-in duration-300 w-full h-fit px-4 hover:px-6 py-1 text-sm font-medium border-b border-b-transparent hover:border-b-gray-400"><span class="text-sm mr-2"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>Log Out</p>
                </a>
            </div>
        </div>
    </div>
</div>
<script src="\js\navbar\openAvatarProfil.js"></script>

