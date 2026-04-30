<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Magang – {{ $kartu->mahasiswa->nama ?? 'Mahasiswa' }}</title>

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    {{-- Scripts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                    },
                    colors: {
                        emerald: {
                            50: '#ecfdf5',
                            100: '#d1fae5',
                            200: '#a7f3d0',
                            300: '#6ee7b7',
                            400: '#34d399',
                            500: '#10b981',
                            600: '#059669',
                            700: '#047857',
                            800: '#065f46',
                            900: '#064e3b',
                            950: '#022c22',
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
            border-radius: 24px;
            overflow: hidden;
            position: relative;
            flex-shrink: 0;
            background: #ffffff;
            border: 1px solid rgba(0,0,0,0.05);
        }

        .card-bg {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 100% 0%, #ecfdf5 0%, #ffffff 100%);
            z-index: 0;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(40px);
            opacity: 0.4;
            z-index: 0;
        }
        .blob-1 { width: 250px; height: 250px; top: -80px; right: -80px; background: #34d399; }
        .blob-2 { width: 200px; height: 200px; bottom: -60px; left: -60px; background: #6ee7b7; }

        .noise {
            position: absolute;
            inset: 0;
            z-index: 1;
            opacity: 0.03;
            pointer-events: none;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
        }

        .badge-vertikal {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            writing-mode: vertical-lr;
            text-orientation: mixed;
            font-size: 0.9rem;
            font-weight: 900;
            letter-spacing: 4px;
            color: #064e3b;
            background: rgba(209, 250, 229, 0.6);
            backdrop-filter: blur(8px);
            padding: 20px 8px;
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,0.5);
            z-index: 20;
            text-transform: uppercase;
        }

        .foto-mahasiswa {
            width: 100%;
            height: 280px;
            object-fit: cover;
            object-position: top center;
            display: block;
            /* Remove grayscale for more professional look, or keep if requested */
            /* filter: grayscale(100%); */
            border-top: 1px solid rgba(255,255,255,0.2);
        }

        .nama-mahasiswa {
            display: block;
            height: 90px;
            overflow: hidden;
            word-break: break-word;
            font-size: 2.4rem;
            line-height: 1.0;
            font-weight: 900;
        }

        .nama-universitas {
            display: block;
            height: 80px;
            overflow: hidden;
            word-break: break-word;
            font-size: 1.8rem;
            line-height: 1.1;
            font-weight: 800;
        }

        .glass-panel {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.4);
        }

        @media print {
            .no-print { display: none !important; }
            body { background: white; }
            .kartu-container { box-shadow: none !important; border: 1px solid #eee; }
        }

        .grid-bg {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, #059669 0.5px, transparent 0.5px);
            background-size: 20px 20px;
            opacity: 0.05;
            z-index: 1;
        }
    </style>
</head>
<body class="h-full font-sans antialiased text-slate-900 selection:bg-emerald-100 selection:text-emerald-900">

    <div class="min-h-full flex flex-col">
        {{-- Header / Navbar --}}
        <header class="no-print bg-white/80 backdrop-blur-md border-b border-slate-200 sticky top-0 z-40">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <a href="{{ url()->previous() }}" class="p-2 text-slate-400 hover:text-emerald-600 rounded-xl hover:bg-emerald-50 transition-all">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                    </a>
                    <div>
                        <nav class="flex text-xs text-slate-400 gap-2 mb-0.5 font-medium uppercase tracking-wider">
                            <span>Dashboard</span>
                            <span class="text-slate-300">/</span>
                            <span>Kartu Magang</span>
                            <span class="text-slate-300">/</span>
                            <span class="text-emerald-600">Cetak</span>
                        </nav>
                        <h1 class="text-lg font-black text-slate-900 leading-tight">Identity Designer</h1>
                    </div>
                </div>

                <div class="flex items-center gap-3">
                    <button onclick="bukaModalUpload()" class="inline-flex items-center gap-2 px-5 py-2.5 border border-slate-200 shadow-sm text-sm font-bold rounded-xl text-slate-700 bg-white hover:bg-slate-50 hover:border-emerald-200 transition-all">
                        <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                        </svg>
                        Ganti Foto
                    </button>
                    <button id="btn-pdf" onclick="downloadPDF()" class="inline-flex items-center gap-2 px-6 py-2.5 border border-transparent shadow-lg shadow-emerald-200 text-sm font-bold rounded-xl text-white bg-emerald-600 hover:bg-emerald-700 transform hover:-translate-y-0.5 active:translate-y-0 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        Download PDF
                    </button>
                </div>
            </div>
        </header>

        {{-- Main Content Area --}}
        <main class="flex-1 overflow-y-auto bg-slate-50 py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                {{-- Preview Card Section --}}
                <div class="bg-white rounded-[2rem] shadow-xl shadow-slate-200/60 border border-slate-200 overflow-hidden mb-10">
                    <div class="p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                        <div>
                            <h2 class="text-xl font-black text-slate-900 tracking-tight">Identity Preview</h2>
                            <p class="text-sm text-slate-500 font-medium mt-1">Konfigurasi visual kartu identitas magang.</p>
                        </div>
                        <div class="flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-xs font-black uppercase tracking-widest border border-emerald-200 animate-pulse">
                            <span class="w-2 h-2 bg-emerald-500 rounded-full"></span>
                            Live Rendering
                        </div>
                    </div>
                    
                    <div class="p-16 flex flex-col items-center justify-center gap-16 bg-white relative">
                        <div class="absolute inset-0 opacity-40 pointer-events-none" style="background-image: radial-gradient(#e2e8f0 1px, transparent 1px); background-size: 30px 30px;"></div>
                        
                        <div id="kartu-wrapper" class="flex flex-wrap justify-center gap-14 relative z-10">
                            
                            {{-- SISI DEPAN --}}
                            <div class="kartu kartu-container shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] transition-all duration-500 hover:scale-[1.03] hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.2)]">
                                <div class="card-bg"></div>
                                <div class="blob blob-1"></div>
                                <div class="blob blob-2"></div>
                                <div class="grid-bg"></div>
                                <div class="noise"></div>
                                
                                <div class="relative z-10 h-full flex flex-col">
                                    {{-- Brand Top --}}
                                    <div class="px-6 py-5 flex items-center justify-between">
                                        <div class="flex items-center gap-1.5">
                                            <div class="w-6 h-6 bg-emerald-600 rounded-lg flex items-center justify-center text-white">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                            </div>
                                        </div>
                                        <div class="text-[10px] font-black text-emerald-800/70 uppercase tracking-[0.2em]">
                                            {{ strtoupper($kartu->universitas->namaUniversitas ?? 'INSTANSI') }}
                                        </div>
                                    </div>

                                    {{-- Photo Area --}}
                                    <div class="relative px-6">
                                        <div class="rounded-2xl overflow-hidden shadow-xl border-4 border-white relative z-10">
                                            <img id="foto-kartu" class="foto-mahasiswa" src="{{ asset('storage/' . $kartu->mahasiswa->foto) }}" alt="Foto Mahasiswa" crossorigin="anonymous">
                                        </div>
                                        <div class="badge-vertikal">MAGANG</div>
                                    </div>

                                    {{-- Name Area --}}
                                    <div class="flex-1 flex flex-col justify-end px-6 pb-6">
                                        <div class="nama-mahasiswa text-slate-900 tracking-tighter uppercase mb-1">
                                            {{ strtoupper($kartu->mahasiswa->nama ?? 'Nama Mahasiswa') }}
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <div class="h-[2px] w-8 bg-emerald-500 rounded-full"></div>
                                            <div class="text-[0.65rem] font-black text-emerald-700 tracking-[0.3em] uppercase">Verified Member</div>
                                        </div>
                                    </div>

                                    {{-- Bottom Bar --}}
                                    <div class="h-14 glass-panel flex items-center px-6 gap-3">
                                        <div class="w-8 h-8 rounded-full bg-emerald-600/10 flex items-center justify-center text-emerald-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                        </div>
                                        <span class="text-[0.7rem] font-black text-slate-800 tracking-wide uppercase truncate">{{ $kartu->universitas->namaUniversitas ?? 'Universitas' }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- SISI BELAKANG --}}
                            <div class="kartu kartu-container shadow-[0_30px_60px_-15px_rgba(0,0,0,0.15)] transition-all duration-500 hover:scale-[1.03] hover:shadow-[0_40px_80px_-20px_rgba(16,185,129,0.2)]">
                                <div class="card-bg"></div>
                                <div class="blob blob-1" style="background: #a7f3d0; top: 40%; left: -40%;"></div>
                                <div class="grid-bg" style="opacity: 0.03;"></div>
                                <div class="noise"></div>

                                <div class="relative z-10 h-full flex flex-col">
                                    {{-- Brand Top --}}
                                    <div class="p-4 pt-5 pb-0">
                                        <div class="nama-universitas text-slate-900 tracking-tighter uppercase">
                                            {{ strtoupper($kartu->universitas->namaUniversitas ?? 'INSTANSI') }}
                                        </div>
                                    </div>

                                    {{-- QR Area --}}
                                    <div class="flex-1 tp-0 flex flex-col items-center justify-center px-4">
                                        <div class="bg-white p-3 rounded-[1.5rem] shadow-[0_20px_40px_-10px_rgba(0,0,0,0.1)] border border-slate-100 transform -rotate-1">
                                            {!! QrCode::size(130)->margin(1)->generate(url('/kartu-magang/' . $kartu->id . '/verify')) !!}
                                        </div>
                                    </div>

                                    {{-- Data Area --}}
                                    <div class="glass-panel border-t border-white/60 p-7 space-y-3">
                                        <div class="flex justify-between items-center">
                                            <span class="text-[0.6rem] font-black text-emerald-800/50 tracking-widest uppercase">Full Name</span>
                                            <span class="text-[0.75rem] font-extrabold text-slate-900 text-right truncate max-w-[150px] uppercase">{{ $kartu->mahasiswa->nama ?? '-' }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[0.6rem] font-black text-emerald-800/50 tracking-widest uppercase">ID Number</span>
                                            <span class="text-[0.75rem] font-extrabold text-slate-900 text-right uppercase">{{ $kartu->mahasiswa->nim ?? '-' }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            <span class="text-[0.6rem] font-black text-emerald-800/50 tracking-widest uppercase">Division</span>
                                            <span class="text-[0.75rem] font-extrabold text-slate-900 text-right uppercase">{{ $kartu->mahasiswa->programStudi ?? '-' }}</span>
                                        </div>
                                        <div class="pt-1 flex justify-between items-center border-t border-emerald-900/5">
                                            <span class="text-[0.6rem] font-black text-emerald-800/50 tracking-widest uppercase">Validity</span>
                                            <span class="text-[0.7rem] font-black text-emerald-700 text-right uppercase">
                                                {{ \Carbon\Carbon::parse($kartu->tanggalMulai)->format('d/m/y') }} — {{ \Carbon\Carbon::parse($kartu->tanggalSelesai)->format('d/m/y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Help section --}}
                <div class="no-print p-8 bg-emerald-50 rounded-[2rem] border border-emerald-100 flex gap-6 items-start shadow-sm">
                    <div class="flex-shrink-0 w-12 h-12 bg-emerald-600 rounded-2xl flex items-center justify-center text-white shadow-lg shadow-emerald-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-black text-emerald-900 text-lg uppercase tracking-tight">Prosedur Penerbitan Kartu</h3>
                        <p class="text-emerald-700 font-medium leading-relaxed mt-2 italic text-sm">
                            Gunakan tombol "Ganti Foto" untuk menyesuaikan profil visual sebelum ekspor. Klik "Download PDF" untuk menghasilkan lembar cetak standar A4 dengan resolusi tinggi. Pastikan printer dikonfigurasi pada mode "Actual Size" untuk dimensi yang akurat.
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    {{-- Loading Overlay --}}
    <div id="loading-overlay" class="fixed inset-0 z-[100] hidden items-center justify-center bg-slate-950/80 backdrop-blur-md transition-all">
        <div class="bg-white p-10 rounded-[2.5rem] shadow-2xl flex flex-col items-center gap-6 text-center max-w-sm transform scale-100">
            <div class="relative">
                <div class="w-16 h-16 border-4 border-emerald-100 border-t-emerald-600 rounded-full animate-spin"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="w-8 h-8 bg-emerald-600 rounded-lg flex items-center justify-center text-white animate-pulse">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12" /></svg>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-xl font-black text-slate-900 tracking-tight">ENGINEERING PDF...</h3>
                <p class="text-sm text-slate-500 font-medium mt-2 leading-relaxed">Sedang memproses aset visual kartu magang dengan kualitas cetak optimal. Mohon tidak menutup jendela ini.</p>
            </div>
        </div>
    </div>

    {{-- Upload Modal --}}
    <div id="modal-upload" class="fixed inset-0 z-[100] hidden items-center justify-center p-4 bg-slate-950/70 backdrop-blur-sm transition-all" onclick="tutupModalJikaLuar(event)">
        <div class="bg-white rounded-[2.5rem] shadow-2xl w-full max-w-md overflow-hidden transform transition-all scale-95 opacity-0 duration-300 border border-slate-200" id="modal-box">
            <div class="p-8 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
                <div>
                    <h2 class="text-xl font-black text-slate-900 tracking-tight uppercase">Update Visual</h2>
                    <p class="text-xs text-slate-500 font-bold tracking-widest mt-0.5">FOTO PROFIL KARTU</p>
                </div>
                <button onclick="tutupModal()" class="w-10 h-10 flex items-center justify-center text-slate-400 hover:text-slate-900 hover:bg-slate-100 rounded-full transition-all">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
            
            <div class="p-10">
                <div class="flex flex-col items-center gap-8">
                    <div class="w-40 h-52 bg-slate-100 rounded-3xl overflow-hidden border-8 border-slate-50 shadow-2xl relative group">
                        <img id="modal-preview" src="" class="w-full h-full object-cover hidden" alt="Preview">
                        <div id="preview-placeholder" class="w-full h-full flex items-center justify-center text-slate-300">
                            <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        </div>
                    </div>

                    <div id="drop-zone" class="w-full border-2 border-dashed border-slate-200 rounded-3xl p-10 text-center transition-all hover:border-emerald-400 group cursor-pointer relative bg-slate-50/50 hover:bg-emerald-50/30">
                        <input type="file" id="input-foto" accept="image/*" class="absolute inset-0 opacity-0 cursor-pointer" onchange="onFotoSelected(event)">
                        <div class="w-12 h-12 bg-white rounded-2xl flex items-center justify-center text-slate-400 group-hover:text-emerald-600 shadow-sm mx-auto mb-4 transition-all group-hover:rotate-6">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                        </div>
                        <p class="text-sm font-black text-slate-700 uppercase tracking-tight">Seret Berkas Ke Sini</p>
                        <p class="text-[10px] text-slate-400 mt-2 font-bold tracking-[0.2em]">MAXIMUM 5MB • PNG/JPG/WEBP</p>
                    </div>
                </div>
            </div>

            <div class="p-8 bg-slate-50 border-t border-slate-100 flex gap-4">
                <button onclick="tutupModal()" class="flex-1 px-4 py-3 border border-slate-200 rounded-2xl text-sm font-black text-slate-600 bg-white hover:bg-slate-50 transition-all uppercase tracking-widest">Batal</button>
                <button id="btn-apply" onclick="terapkanFoto()" disabled class="flex-1 px-4 py-3 bg-emerald-600 rounded-2xl text-sm font-black text-white hover:bg-emerald-700 disabled:opacity-30 disabled:cursor-not-allowed shadow-lg shadow-emerald-200 transition-all uppercase tracking-widest">Update</button>
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
                            scale: 4, // Higher scale for print quality
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
                const gap = 12;
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
                pdf.save(`ID-CARD-${nama.replace(/\s+/g, '-').toUpperCase()}.pdf`);

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
                // Removed grayscale filter for better theme consistency
                // mainImg.style.filter = 'grayscale(100%)';
                tutupModal();
            }
        }

        {{-- DRAG & DROP --}}
        const dz = document.getElementById('drop-zone');
        dz.addEventListener('dragover', (e) => { e.preventDefault(); dz.classList.add('bg-emerald-50/50', 'border-emerald-400'); });
        dz.addEventListener('dragleave', () => dz.classList.remove('bg-emerald-50/50', 'border-emerald-400'));
        dz.addEventListener('drop', (e) => {
            e.preventDefault();
            dz.classList.remove('bg-emerald-50/50', 'border-emerald-400');
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
