<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url('tailwind/output.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('tailwind/vanilla.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
        <!-- TAILWIND CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/tailwind.min.css">
        <!-- TAILWIND CSS UTILIZE  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/utilities.min.css">
        <!-- TAILWIND CSS COMPONENTS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/components.min.css">
        <!-- TAILWIND CSS BASE -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.1.2/base.min.css">
    <title>WIKA - Data Center</title>
</head>
<body>
<div class=" background-login">
    <div class="mr-10 float-right">
            <div class="max-w-sm rounded overflow-hidden shadow-lg rounded-lg bg-white mt-20 px-8 py-4">
            <div class="px-6 py-4">
                <div class="font-bold text-md mb-2">Login to Your Account</div>
                <input type="number" placeholder="NIP" class="mt-1 mb-5 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-pink-500 invalid:text-pink-600
                focus:invalid:border-pink-500 focus:invalid:ring-pink-500 rounded-lg">
                <input type="password" placeholder="Password" class="mt-1 block w-full px-3 py-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400
                focus:outline-none focus:border-sky-500 focus:ring-1 focus:ring-sky-500
                disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none
                invalid:border-pink-500 invalid:text-pink-600
                focus:invalid:border-pink-500 focus:invalid:ring-pink-500 rounded-lg">
            </div>
                <button class="ml-20 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded block">
                    Signin
                </button>
                <button class="ml-20 text-sm py-2 px-4">
                    Signup
                </button>
            </div>
    </div>
</div>
</body>
</html>