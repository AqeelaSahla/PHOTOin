<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
  <nav class="navbar">
    <a href="/" class="navbar_logo">
      <img src="{{ asset('ImageAssets/Logo.png') }}" alt="PHOTOin!" />
    </a>

    <ul class="navbar_links">
      <li><a href="/frame" data-text="Studio">Studio</a></li>
      <li><a href="/panduan" data-text="Panduan">Panduan</a></li>
      <li><a href="/about" data-text="Tentang">Tentang</a></li>
    </ul>
  </nav>

  <main>
    <!-- isi sesuai konten halaman ya -->
    <section class="hero">
    <div class="hero_left">
      <div class="hero_brand">
        <img src="{{ asset('ImageAssets/Logo.png') }}" alt="PHOTOin!" class="hero_brand_logo" />
        <p class="hero_brand_tagline">photobooth digital gratis</p>
      </div>

      <p class="hero_desc">
        Nikmati pengalaman photobooth<br />
        kapan saja dan di mana saja! <strong>Gratis!</strong>
      </p>

      <div class="hero_actions">
        <a href="/frame" class="btn btn--red">Mulai Foto ➤</a>
        <a href="/panduan" class="btn btn--teal">Lihat Panduan</a>
      </div>

      <div class="hero_badges">
        <span class="badge">Gratis</span>
        <span class="badge">No Install</span>
        <span class="badge">Custom Frame</span>
      </div>
    </div>

    <div class="hero_right">
      <div class="hero_preview">
        <img src="{{ asset('ImageAssets/preview1.png') }}" alt="Contoh strip foto 1" class="preview_img" />
        <img src="{{ asset('ImageAssets/preview2.png') }}" alt="Contoh strip foto 2" class="preview_img" />
      </div>
    </div>
    </section>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>

</body>
</html>