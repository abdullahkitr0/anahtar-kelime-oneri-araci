
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anahtar Kelime Öneri Aracı</title>
    <link href="https://cdn.jsdelivr.net/npm/@tabler/core@latest/dist/css/tabler.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/2.3.4/purify.min.js"></script>
    <link rel="stylesheet" href="styles.css">
	<link rel="icon" href="favicon.png" type="image/x-icon">
</head>
<body class="antialiased d-flex flex-column">
    <div class="container-xl my-4">
    <div class="card">
    <div class="card-header d-flex">
        <h3 class="card-title">Anahtar Kelime Öneri Aracı</h3>
    </div>


            <div class="card-body">
                <!-- Arama motoru seçimi -->
                <div class="mb-3">
    <label class="form-label">Verilerin alınacağı yer:</label>
    <div class="btn-group w-100" role="group" aria-label="Arama Motoru Seçimi">
        <input type="radio" class="btn-check" name="search-engine" id="google" autocomplete="off" checked>
        <label for="google" class="btn btn-icon">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-brand-google"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 2a9.96 9.96 0 0 1 6.29 2.226a1 1 0 0 1 .04 1.52l-1.51 1.362a1 1 0 0 1 -1.265 .06a6 6 0 1 0 2.103 6.836l.001 -.004h-3.66a1 1 0 0 1 -.992 -.883l-.007 -.117v-2a1 1 0 0 1 1 -1h6.945a1 1 0 0 1 .994 .89c.04 .367 .061 .737 .061 1.11c0 5.523 -4.477 10 -10 10s-10 -4.477 -10 -10s4.477 -10 10 -10z" /></svg>
        </label>

        <input type="radio" class="btn-check" name="search-engine" id="youtube" autocomplete="off">
        <label for="youtube" class="btn btn-icon">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="currentColor"  class="icon icon-tabler icons-tabler-filled icon-tabler-brand-youtube"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M18 3a5 5 0 0 1 5 5v8a5 5 0 0 1 -5 5h-12a5 5 0 0 1 -5 -5v-8a5 5 0 0 1 5 -5zm-9 6v6a1 1 0 0 0 1.514 .857l5 -3a1 1 0 0 0 0 -1.714l-5 -3a1 1 0 0 0 -1.514 .857z" /></svg>
        </label>

        <input type="radio" class="btn-check" name="search-engine" id="bing" autocomplete="off">
        <label for="bing" class="btn btn-icon">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-bing"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 3l4 1.5v12l6 -2.5l-2 -1l-1 -4l7 2.5v4.5l-10 5l-4 -2z" /></svg>
        </label>

        <input type="radio" class="btn-check" name="search-engine" id="yahoo" autocomplete="off">
        <label for="yahoo" class="btn btn-icon">
        <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-yahoo"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 6l5 0" /><path d="M7 18l7 0" /><path d="M4.5 6l5.5 7v5" /><path d="M10 13l6 -5" /><path d="M12.5 8l5 0" /><path d="M20 11l0 4" /><path d="M20 18l0 .01" /></svg>
        </label>

        <input type="radio" class="btn-check" name="search-engine" id="duckduckgo" autocomplete="off">
<label for="duckduckgo" class="btn btn-icon">
<svg fill="#000000" width="24" height="24" viewBox="0 0 24 24" role="img" xmlns="http://www.w3.org/2000/svg"><title>DuckDuckGo icon</title><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm0 23C5.925 23 1 18.074 1 12S5.926 1 12 1s11 4.925 11 11-4.925 11-11 11zm10.219-11c0 4.805-3.317 8.833-7.786 9.925-.27-.521-.53-1.017-.749-1.438.645.249 1.93.718 2.208.615.376-.144.282-3.149-.14-3.245-.338-.075-1.632.837-2.141 1.209l.034.156c.078.397.144.993.03 1.247-.001.004-.002.01-.004.013a.218.218 0 0 1-.068.088c-.284.188-1.081.284-1.503.188a.516.516 0 0 1-.064-.02c-.694.396-2.01 1.109-2.25.971-.329-.188-.377-2.676-.329-3.288.035-.46 1.653.286 2.442.679.174-.163.602-.272.98-.31-.57-1.389-.99-2.977-.733-4.105 0 .002.002.002.002.002.356.248 2.73 1.05 3.91 1.027 1.18-.024 3.114-.743 2.903-1.323-.212-.58-2.135.51-4.142.324-1.486-.138-1.748-.804-1.42-1.29.414-.611 1.168.116 2.411-.256 1.245-.371 2.987-1.035 3.632-1.397 1.494-.833-.625-1.177-1.125-.947-.474.22-2.123.637-2.889.82.428-1.516-.603-4.149-1.757-5.3-.376-.376-.951-.612-1.603-.736-.25-.344-.654-.671-1.225-.977a5.772 5.772 0 0 0-3.595-.584l-.024.004-.034.004.004.002c-.148.028-.237.08-.357.098.148.016.705.276 1.057.418-.174.068-.412.108-.596.184a.828.828 0 0 0-.204.056c-.173.08-.303.375-.3.515.84-.086 2.082-.026 2.991.246-.644.09-1.235.258-1.661.482-.016.008-.03.018-.048.028-.054.02-.106.042-.152.066-1.367.72-1.971 2.405-1.611 4.424.323 1.824 1.665 8.088 2.29 11.064-3.973-1.4-6.822-5.186-6.822-9.639C1.781 6.356 6.356 1.781 12 1.781S22.219 6.356 22.219 12zM9.095 9.581a.758.758 0 1 0 0 1.516.758.758 0 0 0 0-1.516zm.338.702a.196.196 0 1 1 0-.392.196.196 0 0 1 0 .392zm4.724-1.043a.65.65 0 1 0 0 1.299.65.65 0 0 0 0-1.3zm.29.601a.168.168 0 1 1 0-.336.168.168 0 0 1 0 .336zM9.313 8.146s-.571-.26-1.125.09c-.554.348-.534.704-.534.704s-.294-.656.49-.978c.786-.32 1.17.184 1.17.184zm5.236-.052s-.41-.234-.73-.23c-.654.008-.831.296-.831.296s.11-.688.945-.55a.84.84 0 0 1 .616.484z"/></svg>
</label>

<input type="radio" class="btn-check" name="search-engine" id="wikipedia" autocomplete="off">
<label for="wikipedia" class="btn btn-icon">
<svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-brand-wikipedia"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 4.984h2" /><path d="M8 4.984h2.5" /><path d="M14.5 4.984h2.5" /><path d="M22 4.984h-2" /><path d="M4 4.984l5.455 14.516l6.545 -14.516" /><path d="M9 4.984l6 14.516l6 -14.516" /></svg>
</label>

    </div>
</div>


                <!-- Anahtar kelime giriş alanı -->
                <label for="inputKeywords" class="form-label mt-3">Anahtar Kelimeler:</label>
                <textarea id="inputKeywords" class="form-control" rows="1" placeholder="Anahtar kelimeyi buraya girin..." oninput="this.value = DOMPurify.sanitize(this.value);"></textarea>
                <!-- Çıktı alanı -->
                <label for="input" class="form-label mt-3">Anahtar Kelimeler:</label>
                <textarea id="input" class="form-control" rows="8" placeholder="Anahtar Kelimeler Bekleniyor." readonly oninput="this.value = DOMPurify.sanitize(this.value);"></textarea>
                <!-- Kelime sayısı ve butonlar -->
                <div class="mt-3">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <span>Bulunan kelime sayısı:</span>
                        </div>
                        <div class="col-auto">
                            <span id="numofkeywords" class="badge bg-red-lt fs-3">0</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center">
                    <button id="startjob" onclick="StartJob();" class="btn btn-primary btn-pill mx-2">BAŞLAT</button>
                    <button id="clear" class="btn btn-danger btn-pill mx-2">TEMİZLE</button> <!-- Temizle butonu -->
                    <button id="clearTable" class="btn btn-warning btn-pill mx-2">TABLOYU TEMİZLE</button> <!-- Tabloyu temizle butonu -->
                    <button id="save" class="btn btn-secondary btn-pill mx-2 btn-icon "><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-txt"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M16.5 15h3" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M4.5 15h3" /><path d="M6 15v6" /><path d="M18 15v6" /><path d="M10 15l4 6" /><path d="M10 21l4 -6" /></svg></button>
                    <button id="saveCSV" class="btn btn-success btn-pill mx-2 btn-icon"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-type-csv"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M5 12v-7a2 2 0 0 1 2 -2h7l5 5v4" /><path d="M7 16.5a1.5 1.5 0 0 0 -3 0v3a1.5 1.5 0 0 0 3 0" /><path d="M10 20.25c0 .414 .336 .75 .75 .75h1.25a1 1 0 0 0 1 -1v-1a1 1 0 0 0 -1 -1h-1a1 1 0 0 1 -1 -1v-1a1 1 0 0 1 1 -1h1.25a.75 .75 0 0 1 .75 .75" /><path d="M16 15l2 6l2 -6" /></svg></button>
                </div>
                <!-- Durum göstergesi -->
                <div class="status mt-3 text-center" id="status"><?php echo htmlspecialchars('Durum: Bekliyor', ENT_QUOTES, 'UTF-8'); ?></div>
                <!-- Anahtar kelime önerileri için tablo -->
                <div class="table-responsive mt-4">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sorgulanan Anahtar Kelime</th>
                                <th>Önerilen Anahtar Kelimeler</th>
                            </tr>
                        </thead>
                        <tbody id="suggestionsTable" oninput="this.innerHTML = DOMPurify.sanitize(this.innerHTML);">
                            <!-- Önerilen kelimeler burada görüntülenecek -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <footer class="footer footer-transparent d-print-none">
          <div class="container-xl">
            <div class="row text-center align-items-center flex-row-reverse">
              <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    <a href="https://abdullahki.com" target="_blank" class="link-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink icon-filled icon-inline" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" /></svg>
                      Abdullahki.com
                    </a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                  <li class="list-inline-item">
                    Copyright &copy; 2024
                    Tüm Hakları Saklıdır
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
</body>
</html>