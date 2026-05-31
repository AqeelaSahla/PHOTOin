<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tentang | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/about.css') }}" />
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

  <main class="tentang">
    <section class="tentang_about">
      <h2 class="tentang_label tentang_label--red">About this project</h2>
      <div class="tentang_box tentang_box--white">
        <p>
          <strong>PHOTOin!</strong> adalah aplikasi web photobooth digital yang dikembangkan
          sebagai proyek mata kuliah Pengembangan Aplikasi Web di Universitas Brawijaya.
          Dibuat untuk memberikan pengalaman photobooth yang gratis, personal, dan dapat
          dinikmati siapa saja.
        </p>
      </div>
    </section>

    <section class="tentang_team">
      <h2 class="tentang_label tentang_label--green">Meet the team</h2>
      <div class="tentang_team-grid">
        <article class="team-card">
          <div class="team-card_avatar">
            <img src="{{ asset('ImageAssets/user-icon.png') }}" alt="" />
          </div>
          <span class="team-card_name">Azza</span>
        </article>
        <article class="team-card">
          <div class="team-card_avatar">
            <img src="{{ asset('ImageAssets/user-icon.png') }}" alt="" />
          </div>
          <span class="team-card_name">Olby</span>
        </article>
        <article class="team-card">
          <div class="team-card_avatar">
            <img src="{{ asset('ImageAssets/user-icon.png') }}" alt="" />
          </div>
          <span class="team-card_name">Qeela</span>
        </article>
        <article class="team-card">
          <div class="team-card_avatar">
            <img src="{{ asset('ImageAssets/user-icon.png') }}" alt="" />
          </div>
          <span class="team-card_name">Hilal</span>
        </article>
      </div>
    </section>

    <a href="https://saweria.co/Jesstie" class="tentang_support">Support this project</a>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>

</body>
</html>