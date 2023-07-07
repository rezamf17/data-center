<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('tailwind/output.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('tailwind/vanilla.css'); ?>" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
    <title>WIKA - Data Center</title>
</head>
<body>
<div class="background-login" style="height : 120vh;">
    <div class="mr-10 float-right">
        <form action="<?php echo base_url(); ?>loginProcess" method="POST">
        <?=csrf_field()?>
          <div class="max-w-sm rounded overflow-hidden shadow-lg rounded-lg bg-white mt-20 px-8 py-4">
            <?php if(session()->getFlashData('error')) :?>
              <p>error</p>
            <?php endif; ?>
          <div class="px-6 py-4">
            <?php if(session()->getFlashdata('msg')):?>

                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                      <strong class="font-bold"><?= session()->getFlashdata('msg') ?></strong>
                    </div>
                <?php endif;?>
              <div class="font-bold text-md mb-2">Login to Your Account</div>
              <input type="number" placeholder="NIP" name="nip" class="mt-1 mb-5 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
              focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              invalid:border-pink-500 invalid:text-pink-600
              focus:invalid:border-pink-500 focus:invalid:ring-pink-500 rounded-lg">
              <input type="password" placeholder="Password" name="password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
              focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
              disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
              invalid:border-pink-500 invalid:text-pink-600
              focus:invalid:border-pink-500 focus:invalid:ring-pink-500 rounded-lg">
          </div>
              <button type="submit" class="ml-20 mb-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block">
                  Signin
              </button>
          </div>
        </form>
    </div>
</div>
<div class="background-tamansari-skyhive h-screen">
    <!-- <div class="max-w-sm overflow-hidden mt-20 px-8 py-4 text-white opacity-10 bg-black">
      <div class="content-none"> 
        <h2>Tamansari SkyHive</h2>
        <h4>Jakarta, Indonesia</h4>
      </div>
    </div> -->
<div class="w-5/12">
  <div class="px-6 py-4 h-screen bg-black" style="background: linear-gradient(to left, rgba(169,208,113,0),rgba(0,0,0,9)); ">
  <div class="py-20 px-10">
      <h1 class="text-white font-bold text-xl">Taman Sari SkyHive</h1>
      <p class="text-white">
      Tamansari Skyhive Apartment Jakarta merupakan hunian eksklusif persembahan terbaru WIKA Realty bekerja sama dengan Medialand Group yang berada di tengah Jakarta’s Newest Hub – Cawang, Jakarta Timur. Apartemen ini dibangun di atas lahan seluas 5.331 m2 dan memiliki 571 unit yang terdiri dari 3 tipe unit, yaitu tipe studio (25-30 m2), tipe 1 bedroom (38-44 m2), dan tipe 2 bedroom (65-81 m2) dengan harga mulai kisaran Rp 30juta per meter persegi. 
      </p>
  </div>
  </div>
</div>
</div>
<div class="h-screen bg-black">
  <div class="text-white object-none object-bottom" style="
    position: absolute;
    bottom: -150%;
    width:100%;
    height:100px;
">
  <p class="text-7xl mb-5 text-center">WIKA Great Leader Class</p>
  <div class="flex">
    <div class="flex-initial w-70 text-center">
      <img class="object-cover" src="<?php echo base_url('img/Hadjar-Seti-Adji-large-removebg-preview.png'); ?>">
      <p>Hadjar Seti Adji</p>
      <p>Director of Human Capital and Development</p>
    </div>
    <div class="flex-initial w-70 text-center">
      <img class="object-cover" src="<?php echo base_url('img/Adityo-Kusumo-large-removebg-preview.png'); ?>">
      <p>Adityo Kusumo</p>
      <p>Director of Finance and Risk Management</p>
    </div>
    <div class="flex-initial w-70 text-center">
      <img class="object-cover" src="<?php echo base_url('img/agung-budi-Waskito-large-removebg-preview.png'); ?>">
      <p>Agung Budi Waskito</p>
      <p>President Director</p>
    </div>
    <div class="flex-initial w-70 text-center">
      <img class="object-cover" src="<?php echo base_url('img/Hananto-aji-large-removebg-preview.png'); ?>">
      <p>Hananto Aji</p>
      <p>Director of Operation I</p>
    </div>
    <div class="flex-initial w-70 text-center">
      <img class="object-cover" src="<?php echo base_url('img/APR_3557-1-large-removebg-preview.png'); ?>">
      <p>Ayu Widya Kiswari</p>
      <p>Director of Quality, Health, Safety and Environment</p>
    </div>
  </div>
  </div>
</div>
</body>
</html>