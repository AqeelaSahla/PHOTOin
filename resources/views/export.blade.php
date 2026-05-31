<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Export | PHOTOin!</title>
  <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/export.css') }}">
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
    <div class="result-wrapper">
        <div class="result-card">
            <div class="result-loading">
                <div class="loading-spinner"></div>
                <span>Memproses foto...</span>
            </div>

            <canvas id="resultCanvas" class="result-canvas"></canvas>
        </div>

        <div class="result-actions">
            <button class="btn btn-back" onclick="history.back()">
                ← &nbsp;Back
            </button>

            <button class="btn btn-download" id="btnDownload" onclick="downloadResults()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"
                    width="20" height="20">
                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                <polyline points="7 10 12 15 17 10"/>
                <line x1="12" y1="15" x2="12" y2="3"/>
                </svg>
                &nbsp;Download
            </button>

            <button class="btn btn-done" onclick="goHome()">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2.8" stroke-linecap="round" stroke-linejoin="round"
                    width="20" height="20">
                <polyline points="20 6 9 17 4 12"/>
                </svg>
                &nbsp;Done
            </button>
        </div>
    </div>

    <script src="{{ asset('js/export.js') }}"></script>
  </main>

  <footer>
    <span>© 2026 PHOTOin! – nanti aja</span>
    <span>Universitas Brawijaya</span>
  </footer>

</body>
</html>