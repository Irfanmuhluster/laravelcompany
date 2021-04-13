<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ theme_asset_public('frontend::default', 'css/app.css') }}">
    <meta name="description" content="Jasa Pembuatan Website Idcodewebs - @yield('description')">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://idcodewebs.com">
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website Idcodewebs">
    <meta property="og:description" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website
    Onlinekan Bisnis atau Perusahaan Anda, Buat Perusahaan Anda Lebih Professional, Raih Jangkauan Pelanggan Lebih Luas.">
    <meta property="og:url" content="https://idcodewebs.com">
    <meta property="og:site_name" content="Idcodewebs">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website
    Onlinekan Bisnis atau Perusahaan Anda, Buat Perusahaan Anda Lebih Professional, Raih Jangkauan Pelanggan Lebih Luas.">
    <meta name="twitter:title" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website
    Onlinekan Bisnis atau Perusahaan Anda, Buat Perusahaan Anda Lebih Professional, Raih Jangkauan Pelanggan Lebih Luas.">
    
    <title>Idcodewebs @yield('title')</title>
</head>
<body>
    <header class="container">
        {{-- @dd(Route::has('product')) --}}
        <nav id="navbar-header" class="navbar container {{ Route::has('public.product') ?  'navbar-sticky' : 'navbar-fixed' }}">
            <div class="navbar-logo">
                <div class="logo">Idcodewebs</div>
            </div>
            <div class="navbar-btn"  id="nav-btn">
                <div class="navbar-links">
                    <ul class="navbar-nav">
                        <li class="nav-link">
                            <a href="#">Home</a>
                        </li>
                        <li class="nav-link">
                            <a href="#paket">Paket</a>
                        </li>
                        <li class="nav-link">
                            <a href="#fitur">Fitur</a>
                        </li>
                        <li class="nav-link">
                            <a href="#desain">Desain</a>
                        </li>
                        <li class="nav-link">
                            <a href="https://blog.idcodewebs.com">Blog</a>
                        </li>
                        <li class="nav-link">
                            <a href="#kontak">Hubungi Kami</a>
                        </li>
                       
                    </ul>
                </div>
                
            </div>
            <div class="hambergur-menu-container">
                <div class="hambergur-menu">
                    <!-- hide show  -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd" />
                      </svg>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
    <footer id="kontak">
        <div>
        </div>
            <div>
                <div class="heading"><h1>Hubungi Kami</h1></div>
                <div class="description">Siap Buat Website ? Hubungi Kami Sekarang</div>
                <div class="description2"><a href="https://api.whatsapp.com/send?phone=6287734611551&amp;text=Hello Idcodewebs, saya mau buat website...">  <img class="margin-right-1" src="{{ theme_asset_public('frontend::default', 'img/whatsapp.svg') }}" width="24" alt="idcodewebs-contact-us" style="vertical-align: sub">087734611551</a></div>
                <div class="description2">Rt. 02 Rw.04 Drono, Drono, Ngawen, Klaten</div>
            </div>
        </div>
        <div class="peta">
          
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright 2020  idcodewebs.com - All Rights Reserved</p>
    </div>
    
<script  type="text/javascript" src="{{ theme_asset_public('frontend::default', 'js/app.js') }}"></script>
@stack('script-navbar')  
</body>
</html>