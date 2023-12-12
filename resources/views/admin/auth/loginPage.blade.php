<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Login Admin | Lobi Poliwangi</title>
</head>
<body>
  <!-- navbarTransparent -->
  <div class="fixed z-10 inset-x-0 top-0 h-16 bg-transparent pl-6 pr-6">
    <div class="flex flex-row justify-between mt-3">
      <div class="flex flex-row">
          <span><img src="\data\img\aulaAzwarAnnas.jpg" class="w-12 h-12 mr-6"></span>
          <span class="text-3xl text-white font-bold">Lobi Poliwangi</span>
      </div>
      <div class="w-2/5 mt-2">
          <ul class="flex flex-row justify-between">
            <li class="text-xl text-white font-normal">Beasiswa</li>
            <li class="text-xl text-white font-normal">Lomba</li>
            <li class="text-xl text-white font-normal">Prestasi</li>
            <li class="text-xl text-white font-normal">Masuk sebagai Mahasswa</li>
          </ul>
      </div>
    </div>
  </div>
  <!-- boxLogin -->
  <div class="absolute z-20 inset-x-1/4 inset-y-1/4 bg-slate-50/5 border-2 rounded-lg backdrop-blur-sm">
    <p class="">Login Admin</p>
  </div>
  <!-- layoutImage -->
  <div class="bg-black opacity-40 absolute z-0 inset-x-0 inset-y-0"></div>
  <!-- imageBackgroundLayout -->
  <div class="w-full h-screen">
    <img class="w-full h-full" src="\data\img\aulaAzwarAnnas.jpg">
  </div>
</body>
</html>