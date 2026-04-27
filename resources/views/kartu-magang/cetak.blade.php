<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Magang – {{ $kartu->mahasiswa->nama ?? 'Mahasiswa' }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        primary: {
                            50: '#f5f3ff',
                            100: '#ede9fe',
                            200: '#ddd6fe',
                            300: '#c4b5fd',
                            400: '#a78bfa',
                            500: '#8b5cf6',
                            600: '#7c3aed',
                            700: '#6d28d9',
                            800: '#5b21b6',
                            900: '#4c1d95',
                            950: '#2e1065',
                        },
                    },
                }
            }
        }
    </script>

    <style>
        /* Card specific styles that need precision */
        .kartu-container {
            width: 300px;
            height: 440px;
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
            background: linear-gradient(135deg, #c3b8f0 0%, #b8e0a0 40%, #d4f0b0 70%, #e0eaff 100%);
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(38px);
            opacity: 0.65;
        }
        .blob-1 { width: 200px; height: 200px; top: -60px; left: -60px; background: #c0b0ff; }
        .blob-2 { width: 180px; height: 180px; bottom: -40px; right: -40px; background: #a0e06c; }
        .blob-3 { width: 140px; height: 140px; top: 50%; left: 30%; background: #e8f5c0; }

        .badge-vertikal {
            position: absolute;
            right: 14px;
            bottom: 70px;
            writing-mode: vertical-lr;
            text-orientation: mixed;
            font-size: 1.1rem;
            font-weight: 900;
            letter-spacing: 6px;
            color: #222;
            background: rgba(255,255,255,0.65);
            padding: 14px 7px;
            border-radius: 22px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.10);
            z-index: 10;
        }

        .foto-mahasiswa {
            width: 200px;
            height: 255px;
            object-fit: cover;
            object-position: top center;
            display: block;
            filter: grayscale(100%);
        }

        .drop-zone.dragover {
            border-color: #8b5cf6;
            background-color: #f5f3ff;
        }

        .nama-mahasiswa {
            display: block;
            height: 90px;
            overflow: hidden;
            word-break: break-word;
            font-size: 2.4rem;
            line-height: 1.05;
        }

        .nama-universitas {
            display: block;
            height: 80px;
            overflow: hidden;
            word-break: break-word;
            font-size: 1.8rem;
            line-height: 1.05;
        }

        @media print {
            .no-print { display: none !important; }
        }
    </style>
</head>
<body class="h-full font-sans antialiased text-gray-900">

    <div class="min-h-full flex flex-col">
        {{-- Header / Navbar --}}
        <header class="no-print bg-white border-b border-gray-200 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url()->previous() }}" class="p-2 text-gray-400 hover:text-gray-500 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <div>
                        <nav class="flex text-sm text-gray-500 gap-2 mb-0.5">
                            <span>Dashboard</span>
                            <span>/</span>
                            <span>Kartu Magang</span>
                            <span>/</span>
                            <span class="text-gray-900 font-medium">Cetak</span>
                        </nav>
                        <h1 class="text-xl font-bold text-gray-900 leading-tight">Cetak Kartu Magang</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="bukaModalUpload()" class="inline-flex items-center gap-2 px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Ganti Foto
                    </button>
                    <button id="btn-pdf" onclick="downloadPDF()" class="inline-flex items-center gap-2 px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download PDF
                    </button>
                </div>
            </div>
        </header>

        {{-- Main Content Area --}}
        <main class="flex-1 overflow-y-auto bg-gray-50 py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- Preview Card Section --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden mb-8">
                    <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                        <h2 class="text-lg font-semibold text-gray-900">Preview Kartu</h2>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Ready to Print
                        </span>
                    </div>
                    
                    <div class="p-12 flex flex-col items-center justify-center gap-12 bg-gray-50/50">
                        <div id="kartu-wrapper" class="flex flex-wrap justify-center gap-10">
                            
                            {{-- SISI DEPAN --}}
                            <div class="kartu kartu-container shadow-2xl transition-transform hover:scale-[1.02]">
                                <div class="blob blob-1"></div>
                                <div class="blob blob-2"></div>
                                <div class="blob blob-3"></div>
                                
                                <div class="relative z-10 h-full flex flex-col">
                                    <div class="p-6 pt-8">
                                        <div class="nama-mahasiswa font-[900] text-gray-900 leading-[1.05] tracking-tighter uppercase">
                                            {{ strtoupper($kartu->mahasiswa->nama ?? 'Nama Mahasiswa') }}
                                        </div>
                                    </div>

                                    <div class="flex-1 relative flex items-end">
                                        <img id="foto-kartu" class="foto-mahasiswa" src="{{ asset('storage/' . $kartu->mahasiswa->foto) }}" alt="Foto Mahasiswa" crossorigin="anonymous">
                                        <div class="badge-vertikal">MAGANG</div>
                                    </div>

                                    <div class="h-12 bg-white/40 backdrop-blur-md flex items-center px-5 gap-3">
                                        <svg class="w-5 h-5 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>
                                        </svg>
                                        <span class="text-[0.75rem] font-bold text-gray-900 tracking-wider">{{ $kartu->universitas->namaUniversitas ?? 'Universitas' }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- SISI BELAKANG --}}
                            <div class="kartu kartu-container shadow-2xl transition-transform hover:scale-[1.02]">
                                <div class="blob blob-1"></div>
                                <div class="blob blob-2"></div>
                                <div class="blob blob-3"></div>

                                <div class="relative z-10 h-full flex flex-col">
                                    <div class="p-6 pt-4">
                                        <div class="nama-universitas font-[900] text-gray-900 leading-[1.05] tracking-tighter uppercase">
                                            {{ strtoupper($kartu->universitas->namaUniversitas ?? 'INSTANSI') }}
                                        </div>
                                    </div>

                                    <div class="flex-1 flex items-center justify-center p-4 pt-0">
                                        <div class="bg-white p-2 rounded-xl shadow-lg">
                                            {!! QrCode::size(140)->margin(1)->generate(url('/kartu-magang/' . $kartu->id . '/verify')) !!}
                                        </div>
                                    </div>

                                    <div class="bg-white/60 backdrop-blur-lg border-t border-white/40 p-6 space-y-2">
                                        <div class="flex justify-between items-baseline gap-4">
                                            <span class="text-[0.65rem] font-black text-gray-500 tracking-widest uppercase">Nama</span>
                                            <span class="text-[0.8rem] font-bold text-gray-900 text-right">{{ $kartu->mahasiswa->nama ?? '-' }}</span>
                                        </div>
                                        <div class="flex justify-between items-baseline gap-4">
                                            <span class="text-[0.65rem] font-black text-gray-500 tracking-widest uppercase">NIM</span>
                                            <span class="text-[0.8rem] font-bold text-gray-900 text-right">{{ $kartu->mahasiswa->nim ?? '-' }}</span>
                                        </div>
                                        <div class="flex justify-between items-baseline gap-4">
                                            <span class="text-[0.65rem] font-black text-gray-500 tracking-widest uppercase">Prodi</span>
                                            <span class="text-[0.8rem] font-bold text-gray-900 text-right">{{ $kartu->mahasiswa->programStudi ?? '-' }}</span>
                                        </div>
                                        <div class="flex justify-between items-baseline gap-4">
                                            <span class="text-[0.65rem] font-black text-gray-500 tracking-widest uppercase">Periode</span>
                                            <span class="text-[0.8rem] font-bold text-gray-900 text-right">
                                                {{ \Carbon\Carbon::parse($kartu->tanggalMulai)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($kartu->tanggalSelesai)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Help section --}}
                <div class="no-print p-6 bg-blue-50 rounded-2xl border border-blue-100 flex gap-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-blue-500 rounded-full flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-blue-900">Petunjuk Cetak</h3>
                        <p class="text-blue-700 text-sm mt-1">Anda dapat mengganti foto sementara sebelum mengunduh PDF. Klik tombol "Ganti Foto" di atas. File PDF akan diunduh dengan format A4 landscape yang berisi dua sisi kartu.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Loading Overlay --}}
    <div id="loading-overlay" class="fixed inset-0 z-[100] hidden items-center justify-center bg-gray-900/60 backdrop-blur-sm transition-all">
        <div class="bg-white p-8 rounded-2xl shadow-2xl flex flex-col items-center gap-4 text-center max-w-sm">
            <div class="w-12 h-12 border-4 border-primary-200 border-t-primary-600 rounded-full animate-spin"></div>
            <div>
                <h3 class="text-lg font-bold text-gray-900">Memproses PDF...</h3>
                <p class="text-sm text-gray-500 mt-1">Sedang merender kartu magang dengan kualitas tinggi. Mohon tunggu sebentar.</p>
            </div>
        </div>
    </div>

    {{-- Upload Modal --}}
    <div id="modal-upload" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-gray-900/60 backdrop-blur-sm transition-all" onclick="tutupModalJikaLuar(event)">
        <div class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-95 opacity-0 duration-200" id="modal-box">
            <div class="p-6 border-b border-gray-100 flex items-center justify-between">
                <h2 class="text-xl font-bold text-gray-900">🖼️ Ganti Foto</h2>
                <button onclick="tutupModal()" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <div class="p-8">
                <div class="flex flex-col items-center gap-6">
                    <div class="w-32 h-40 bg-gray-100 rounded-xl overflow-hidden border-4 border-gray-200 shadow-inner">
                        <img id="modal-preview" src="" class="w-full h-full object-cover grayscale hidden" alt="Preview">
                        <div id="preview-placeholder" class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    </div>

                    <div id="drop-zone" class="w-full border-2 border-dashed border-gray-300 rounded-xl p-8 text-center transition-all hover:border-primary-400 group cursor-pointer relative">
                        <input type="file" id="input-foto" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="onFotoSelected(event)">
                        <svg class="w-10 h-10 text-gray-400 group-hover:text-primary-500 mx-auto mb-3 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                        <p class="text-sm font-medium text-gray-700">Klik atau seret foto ke sini</p>
                        <p class="text-xs text-gray-500 mt-1">PNG, JPG, WebP (Max 5MB)</p>
                    </div>
                </div>
            </div>

            <div class="p-6 bg-gray-50 border-t border-gray-100 flex gap-3">
                <button onclick="tutupModal()" class="flex-1 px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">Batal</button>
                <button id="btn-apply" onclick="terapkanFoto()" disabled class="flex-1 px-4 py-2 bg-primary-600 rounded-lg text-sm font-medium text-white hover:bg-primary-700 disabled:opacity-50 disabled:cursor-not-allowed transition-colors">Terapkan Foto</button>
            </div>
        </div>
    </div>

    <script>
        {{-- PDF GENERATION LOGIC --}}
        async function downloadPDF() {
            const btn = document.getElementById('btn-pdf');
            const loader = document.getElementById('loading-overlay');
            
            btn.disabled = true;
            loader.classList.remove('hidden');
            loader.classList.add('flex');

            try {
                const { jsPDF } = window.jspdf;
                const kartuEls = Array.from(document.querySelectorAll('.kartu'));
                
                // Use fixed pixel dimensions (300x440 from CSS)
                const elW = 300;
                const elH = 440;
                const ratio = elH / elW;

                const canvases = await Promise.all(
                    kartuEls.map(el => 
                        html2canvas(el, {
                            scale: 3,
                            useCORS: true,
                            allowTaint: false,
                            backgroundColor: null,
                            logging: false,
                            width: elW,
                            height: elH
                        })
                    )
                );

                const pdf = new jsPDF({ orientation: 'landscape', unit: 'mm', format: 'a4' });
                const pageW = 297;
                const pageH = 210;
                const margin = 15;
                const gap = 10;
                const totalW = pageW - margin * 2 - gap;
                const cardW = totalW / 2;
                const cardH = cardW * ratio;
                const topY = (pageH - cardH) / 2;

                canvases.forEach((canvas, i) => {
                    const imgData = canvas.toDataURL('image/png');
                    const x = margin + i * (cardW + gap);
                    pdf.addImage(imgData, 'PNG', x, topY, cardW, cardH, undefined, 'FAST');
                });

                const nama = @json($kartu->mahasiswa->nama ?? 'mahasiswa');
                pdf.save(`kartu-magang-${nama.replace(/\s+/g, '-').toLowerCase()}.pdf`);

            } catch (err) {
                console.error(err);
                alert('Gagal membuat PDF: ' + err.message);
            } finally {
                btn.disabled = false;
                loader.classList.add('hidden');
                loader.classList.remove('flex');
            }
        }

        {{-- MODAL LOGIC --}}
        let selectedDataUrl = null;

        function bukaModalUpload() {
            selectedDataUrl = null;
            document.getElementById('modal-preview').classList.add('hidden');
            document.getElementById('preview-placeholder').classList.remove('hidden');
            document.getElementById('btn-apply').disabled = true;
            
            const overlay = document.getElementById('modal-upload');
            const box = document.getElementById('modal-box');
            
            overlay.classList.remove('hidden');
            overlay.classList.add('flex');
            setTimeout(() => {
                box.classList.remove('scale-95', 'opacity-0');
                box.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        function tutupModal() {
            const overlay = document.getElementById('modal-upload');
            const box = document.getElementById('modal-box');
            
            box.classList.add('scale-95', 'opacity-0');
            box.classList.remove('scale-100', 'opacity-100');
            setTimeout(() => {
                overlay.classList.add('hidden');
                overlay.classList.remove('flex');
            }, 200);
        }

        function tutupModalJikaLuar(event) {
            if (event.target.id === 'modal-upload') tutupModal();
        }

        function onFotoSelected(event) {
            const file = event.target.files[0];
            if (file) bacaFile(file);
        }

        function bacaFile(file) {
            if (!file.type.startsWith('image/')) { alert('Pilih file gambar!'); return; }
            if (file.size > 5 * 1024 * 1024) { alert('Maksimal 5MB!'); return; }
            
            const reader = new FileReader();
            reader.onload = (e) => {
                selectedDataUrl = e.target.result;
                const img = document.getElementById('modal-preview');
                img.src = selectedDataUrl;
                img.classList.remove('hidden');
                document.getElementById('preview-placeholder').classList.add('hidden');
                document.getElementById('btn-apply').disabled = false;
            };
            reader.readAsDataURL(file);
        }

        function terapkanFoto() {
            if (selectedDataUrl) {
                const mainImg = document.getElementById('foto-kartu');
                mainImg.src = selectedDataUrl;
                mainImg.style.filter = 'grayscale(100%)';
                tutupModal();
            }
        }

        {{-- DRAG & DROP --}}
        const dz = document.getElementById('drop-zone');
        dz.addEventListener('dragover', (e) => { e.preventDefault(); dz.classList.add('dragover'); });
        dz.addEventListener('dragleave', () => dz.classList.remove('dragover'));
        dz.addEventListener('drop', (e) => {
            e.preventDefault();
            dz.classList.remove('dragover');
            const file = e.dataTransfer.files[0];
            if (file) bacaFile(file);
        });

        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') tutupModal(); });

        {{-- AUTO RESIZE NAMA MAHASISWA & UNIVERSITAS --}}
        function autoFitNames() {
            // Auto-fit nama mahasiswa
            const mahasiswaElem = document.querySelector('.nama-mahasiswa');
            if (mahasiswaElem) {
                const maxHeightMahasiswa = 90; // ~2 lines at base size
                let fontSizeMahasiswa = 2.4 * 16; // 2.4rem to pixels
                const minFontSize = 14;
                
                mahasiswaElem.style.fontSize = fontSizeMahasiswa + 'px';
                while (mahasiswaElem.scrollHeight > maxHeightMahasiswa && fontSizeMahasiswa > minFontSize) {
                    fontSizeMahasiswa -= 2;
                    mahasiswaElem.style.fontSize = fontSizeMahasiswa + 'px';
                }
            }

            // Auto-fit nama universitas
            const universitasElem = document.querySelector('.nama-universitas');
            if (universitasElem) {
                const maxHeightUniversitas = 80; // ~2 lines at base size
                let fontSizeUniversitas = 1.6 * 16; // 1.6rem to pixels
                const minFontSize = 10;
                
                universitasElem.style.fontSize = fontSizeUniversitas + 'px';
                while (universitasElem.scrollHeight > maxHeightUniversitas && fontSizeUniversitas > minFontSize) {
                    fontSizeUniversitas -= 2;
                    universitasElem.style.fontSize = fontSizeUniversitas + 'px';
                }
            }
        }

        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', autoFitNames);
        } else {
            autoFitNames();
        }
    </script>
</body>
</html>
