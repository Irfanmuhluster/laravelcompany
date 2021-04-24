<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ theme_asset_public('frontend::default', 'css/app.css') }}">
    <meta name="keywords"  content="Jasa Pembuatan Website, jasa pembuatan website murah, web murah dan berkualitas, Web Developer, Pengembangan Website, Webdevelopment, buat website, Toko Online, E-Commerce, Wordpress, Woocommerce, Laravel, Jasa Pembuatan Website Laravel, Paket Website Laravel, Laravel 8, pembuatan website instansi, Pembuatan Website Company Profile, Website Perusahaan, Landing Page,  bikin web, bikin website, jasa pembuatan website di Klaten, Klaten" />

    <meta name="description" content="Jasa Pembuatan Website Idcodewebs Klaten - @yield('description') ">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://idcodewebs.com">
    <meta property="og:locale" content="id_ID">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website Idcodewebs">
    <meta property="og:description" content="Jasa Pembuatan Website Idcodewebs - Jasa Pembuatan Website
    Onlinekan Bisnis atau Perusahaan Anda, Buat Perusahaan Anda Lebih Professional, Raih Jangkauan Pelanggan Lebih Luas. K">
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
        {{-- @dd(Route::has('public.product')) --}}
        <nav id="navbar-header" class="navbar container {{ Route::is('public.home') ?  'navbar-fixed' : 'navbar-sticky' }}">
            <div class="navbar-logo">
                <div class="logo">Idcodewebs</div>
            </div>
            <div class="navbar-btn"  id="nav-btn">
                <div class="navbar-links">
                    <ul class="navbar-nav">
                        <li class="nav-link">
                            <a href="https://idcodewebs.com">Home</a>
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
    <div class="kontak">
        <div>
        </div>
            <div>
                <div class="heading"><h1>Hubungi Kami</h1></div>
                <div class="description">Siap Buat Website ? Hubungi Kami Sekarang</div>
                <div class="description2"><a href="https://api.whatsapp.com/send?phone=6287734611551&amp;text=Hello Idcodewebs, saya mau buat website...">  <img class="margin-right-1" src="{{ theme_asset_public('frontend::default', 'img/whatsapp.svg') }}" width="24" alt="idcodewebs-contact-us" style="vertical-align: sub">087734611551</a></div>
                <div class="description2"></div>
            </div>
        </div>
        <div class="peta">
          
        </div>
    </div>
    <footer>
        <div>
            <h4>Idcodewebs</h4>
            <p>
                Jasa Pembuatan Website di Klaten. Pembuatan Website Paket Wordpress, Toko Online dan Paket Laravel untuk Instansi.
            </p>            
        </div>
        <div>
            
            <h4>Kontak</h4>
            <div class="space-y-2">
                <ul class="contact">
                    <li><p><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" width="16" height="16" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                  </svg> Rt. 02 Rw.04 Drono, Drono, Ngawen, Klaten</p></li>
                   
                </ul>
            </div>
        </div>
        <div class="peta">
            <h4>Menu</h4>
            <div class="menu-bawah space-y-2">
                @foreach ($listpages as $page)
                    <a href="{{ url($page->slug) }}">{{ $page->title }}</a>
                    
                @endforeach
            </div>
        </div>
    </footer>
    <div class="copyright">
        <p>Copyright 2020  idcodewebs.com - All Rights Reserved</p>
    </div>
    
<script  type="text/javascript" src="{{ theme_asset_public('frontend::default', 'js/app.js') }}"></script>
@stack('script-navbar')  
</body>
</html>