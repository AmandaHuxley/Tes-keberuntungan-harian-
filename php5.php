<?php
$hasil = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $angka = isset($_POST["angka"]) ? intval($_POST["angka"]) : null;

    if ($angka >= 1 && $angka <= 10) {
        if ($angka === 7) {
            $hasil = "Wah! Angka 7 — kamu lagi super beruntung hari ini! Lakuin hal penting sekarang!";
        } elseif (in_array($angka, [3, 5, 9])) {
            $hasil = "Keberuntunganmu lumayan tinggi! Tetap semangat ya.";
        } elseif (in_array($angka, [1, 2])) {
            $hasil = "Awal yang agak lambat, tapi bisa berubah kok sepanjang hari.";
        } elseif (in_array($angka, [8, 10])) {
            $hasil = "Kamu lagi produktif, tapi hati-hati jangan sampai burn out!";
        } else {
            $hasil = "Hari kamu biasa aja, tapi bisa jadi luar biasa kalau kamu positif thinking!";
        }
    } else {
        $hasil = "Silahikan masukkan angka antara 1 sampai 10 ya!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Simulator Keberuntungan Harian 🔮</title>
  <style>
    :root {
      --bg1: #f6f0ff;
      --accent: #566df1ff;
      --card: #ffffff;
      --text: #0d0055ff;
    }
    * { box-sizing: border-box; }
    body {
      margin: 0;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #12224eff 0%, #a3c0ffff 100%);
      color: var(--text);
      padding: 20px;
    }
    .card {
      width: 100%;
      max-width: 420px;
      background: var(--card);
      padding: 24px;
      border-radius: 14px;
      box-shadow: 0 12px 30px rgba(15, 35, 218, 0.58);
      text-align: center;
      animation: fadeIn 0.6s ease;
    }
    h1 { margin: 0 0 6px; font-size: 22px; }
    .subtitle { margin: 0 0 18px; color: #555; font-size: 15px; }
    .form-row {
      display: flex;
      gap: 10px;
      justify-content: center;
      margin-bottom: 15px;
    }
    input[type="number"] {
      width: 110px;
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ddd;
      text-align: center;
      font-size: 16px;
      outline: none;
    }
    button {
      background: var(--accent);
      color: #fff;
      border: none;
      padding: 10px 14px;
      border-radius: 8px;
      cursor: pointer;
      font-weight: 600;
      transition: 0.2s;
    }
    button:hover { background: #9092ffff; }
    .hasil {
      margin-top: 18px;
      min-height: 50px;
      font-weight: 600;
      color: #333;
    }
    .hint {
      display: block;
      margin-top: 12px;
      color: #888;
      font-size: 13px;
    }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @media (max-width: 420px) {
      .card { padding: 18px; }
      input[type="number"] { width: 90px; }
    }
  </style>
</head>
<body>
  <main class="card">
    <h1>🔮 Cek Keberuntungan Harian</h1>
    <p class="subtitle">Masukkan angka favoritmu (1–10)</p>

    <form method="POST">
      <div class="form-row">
        <input type="number" name="angka" min="1" max="10" placeholder="1 — 10" required>
        <button type="submit">Cek Keberuntungan</button>
      </div>
    </form>

    <div class="hasil">
      <?php if (!empty($hasil)) echo htmlspecialchars($hasil); ?>
    </div>

    <small class="hint">Tip: coba angka berbeda untuk hasil berbeda ✨</small>
  </main>
</body>
</html>