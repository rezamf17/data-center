<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="<?php echo base_url('dist/img/wika-seeklogo.com.png'); ?>" type="image/gif">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('plugins/fontawesome-free/css/all.min.css'); ?>">
  <link href="<?php echo base_url('tailwind/output.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('tailwind/vanilla.css'); ?>" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>WIKA - Data Center</title>
</head>

<body>
  <div class="bg-[url('../img/kantor_wika.png')] bg-no-repeat bg-cover bg-center h-screen flex items-center">
    <div class="flex items-center justify-center md:justify-between font-poppins flex-col md:flex-row w-full h-full bg-gradient-to-b md:bg-gradient-to-r from-black/70 to-black/0">
      <div class="md:w-2/3 lg:px-5 md:ml-10 lg:ml-20 text-white text-center md:text-left mt-3 md:mt-0">
        <p class="font-bold text-4xl md:text-6xl drop-shadow-lg">Wika Data Center</p>
        <div class="flex items-center md:text-xl mt-2 justify-center md:justify-start">
          <p class="">CONDUCT BY <span>BIMWIKA TEAM</span></p>
          <div class="flex items-center gap-x-2 ml-2 pl-2 border-l-2">
            <a target="_blank" href="https://instagram.com/ptwijayakarya?igshid=NzZhOTFlYzFmZQ=="><i class="fab fa-instagram"></i> </a>
            <a target="_blank" href="https://youtu.be/NAzsSWrkdww?si=-AZd0jTGKC0B0Tqg"><i class="fab fa-youtube"></i> </a>
            <a target="_blank" href="https://www.wika.co.id/en"><i class="fas fa-globe"></i> </a>
          </div>
        </div>
      </div>
      <div class="md:-mt-9 md:mr-10 w-80 mt-5">
        <form action="<?php echo base_url(); ?>loginProcess" method="POST">
          <?= csrf_field() ?>
          <div class="max-w-sm overflow-hidden shadow-lg rounded-lg bg-gray-100 p-6 flex flex-col gap-4 justify-center">
            <?php if (session()->getFlashData('error')) : ?>
              <p>error</p>
            <?php endif; ?>
            <div class="flex flex-col gap-4 justify-center">
              <?php if (session()->getFlashdata('msg')) : ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                  <strong class="font-bold"><?= session()->getFlashdata('msg') ?></strong>
                </div>
              <?php endif; ?>
              <div class="font-bold text-md text-center">Login Wika Data Center</div>
              <input type="number" placeholder="NIP/ID PJ dan Member" autofocus name="nip" class="[appearance:textfield] [&::-webkit-outer-spin-button]:appearance-none [&::-webkit-inner-spin-button]:appearance-none block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-pink-500 invalid:text-pink-600
                focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
              <input type="password" placeholder="Password" name="password" class="block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-pink-500 invalid:text-pink-600
                focus:invalid:border-pink-500 focus:invalid:ring-pink-500">
            </div>
            <div class="flex justify-center flex-col items-center gap-2">
              <button type="submit" class="bg-blue-500 w-3/4 hover:bg-blue-700 text-white py-2 px-4 rounded block">
                Login
              </button>
              <span class="text-gray-400 text-sm">Belum memiliki akun? hubungi <a href="mailto:reynaldilesmanap@gmail.com" class="text-blue-600 hover:underline">Admin</a></span>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="bg-[url('../img/TAMANSARI_SKYHIVE1.jpg')] bg-no-repeat bg-cover bg-center h-screen">
    <div class="lg:w-6/12 px-6 py-4 h-screen md:bg-gradient-to-r bg-gradient-to-b from-black to-black/0">
      <div class="flex flex-col gap-y-6 py-20 px-10">
        <h1 class="text-white font-bold text-3xl md:text-6xl">Taman Sari SkyHive</h1>
        <p class="text-white">
          Tamansari Skyhive Apartment Jakarta merupakan hunian eksklusif persembahan terbaru WIKA Realty bekerja sama dengan Medialand Group yang berada di tengah Jakarta’s Newest Hub – Cawang, Jakarta Timur. Apartemen ini dibangun di atas lahan seluas 5.331 m2 dan memiliki 571 unit yang terdiri dari 3 tipe unit, yaitu tipe studio (25-30 m2), tipe 1 bedroom (38-44 m2), dan tipe 2 bedroom (65-81 m2) dengan harga mulai kisaran Rp 30juta per meter persegi.
        </p>
      </div>
    </div>
  </div>
  <div class="bg-black text-white py-10 md:py-20 ld:py-40">
    <p class="text-3xl md:text-5xl mb-5 text-center font-bold">WIKA Great Leader Class</p>
    <div class="flex flex-col md:flex-row">
      <div class="w-70 text-center flex flex-col justify-center items-center">
        <img class="object-cover" src="<?php echo base_url('img/Hadjar-Seti-Adji-large-removebg-preview.png'); ?>">
        <p class="text-xl">Hadjar Seti Adji</p>
        <p class="text-xs">Director of Human Capital and Development</p>
      </div>
      <div class="w-70 text-center flex flex-col justify-center items-center">
        <img class="object-cover" src="<?php echo base_url('img/Adityo-Kusumo-large-removebg-preview.png'); ?>">
        <p class="text-xl">Adityo Kusumo</p>
        <p class="text-xs">Director of Finance and Risk Management</p>
      </div>
      <div class="w-70 text-center flex flex-col justify-center items-center">
        <img class="object-cover" src="<?php echo base_url('img/agung-budi-Waskito-large-removebg-preview.png'); ?>">
        <p class="text-xl">Agung Budi Waskito</p>
        <p>President Director</p>
      </div>
      <div class="w-70 text-center flex flex-col justify-center items-center">
        <img class="object-cover" src="<?php echo base_url('img/Hananto-aji-large-removebg-preview.png'); ?>">
        <p class="text-xl">Hananto Aji</p>
        <p class="text-xs">Director of Operation I</p>
      </div>
      <div class="w-70 text-center flex flex-col justify-center items-center">
        <img class="object-cover" src="<?php echo base_url('img/APR_3557-1-large-removebg-preview.png'); ?>">
        <p class="text-xl">Ayu Widya Kiswari</p>
        <p class="text-xs">Director of Quality, Health, Safety and Environment</p>
      </div>
    </div>
  </div>
</body>

</html>