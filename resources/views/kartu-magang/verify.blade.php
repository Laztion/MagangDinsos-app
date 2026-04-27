<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Kartu Magang</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap');
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #6c4db5 0%, #3a1f8a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }
        .card {
            background: rgba(255,255,255,0.12);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 24px;
            padding: 40px 36px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            color: #fff;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
        }
        .icon {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
        }
        .icon-valid { background: rgba(80, 220, 120, 0.25); }
        .icon-invalid { background: rgba(255, 80, 80, 0.25); }
        h1 { font-size: 1.5rem; font-weight: 800; margin-bottom: 8px; }
        p { font-size: 0.9rem; opacity: 0.8; margin-bottom: 24px; }
        .info-grid {
            background: rgba(255,255,255,0.1);
            border-radius: 14px;
            padding: 18px;
            text-align: left;
        }
        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            padding: 7px 0;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            gap: 10px;
        }
        .info-row:last-child { border-bottom: none; }
        .info-label { font-size: 0.72rem; font-weight: 700; opacity: 0.7; text-transform: uppercase; letter-spacing: 0.5px; flex-shrink: 0; }
        .info-value { font-size: 0.82rem; font-weight: 600; text-align: right; word-break: break-word; }
        .badge {
            display: inline-block;
            padding: 4px 14px;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .badge-aktif { background: rgba(80,220,120,0.25); color: #80ffaa; }
        .badge-nonaktif { background: rgba(255,80,80,0.25); color: #ff9999; }
    </style>
</head>
<body>
<div class="card">
    @if($kartu)
        <div class="icon icon-valid">✅</div>
        <h1>Kartu Valid</h1>
        <p>Kartu magang ini terverifikasi dan aktif.</p>
        <div class="info-grid">
            <div class="info-row">
                <span class="info-label">Nama</span>
                <span class="info-value">{{ $kartu->mahasiswa->nama }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">NIM</span>
                <span class="info-value">{{ $kartu->mahasiswa->nim }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Prodi</span>
                <span class="info-value">{{ $kartu->mahasiswa->programStudi }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Universitas</span>
                <span class="info-value">{{ $kartu->universitas->namaUniversitas }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Periode</span>
                <span class="info-value">
                    {{ \Carbon\Carbon::parse($kartu->tanggalMulai)->format('d/m/Y') }} –
                    {{ \Carbon\Carbon::parse($kartu->tanggalSelesai)->format('d/m/Y') }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Status</span>
                <span class="info-value">
                    <span class="badge {{ $kartu->statusKartu === 'aktif' ? 'badge-aktif' : 'badge-nonaktif' }}">
                        {{ ucfirst($kartu->statusKartu) }}
                    </span>
                </span>
            </div>
        </div>
    @else
        <div class="icon icon-invalid">❌</div>
        <h1>Kartu Tidak Valid</h1>
        <p>Kartu magang ini tidak ditemukan atau sudah tidak berlaku.</p>
    @endif
</div>
</body>
</html>
