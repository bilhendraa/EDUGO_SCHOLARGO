<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Detail Beasiswa – ScholarGO Admin">
    <title>{{ $scholarship->name }} – Detail Beasiswa ScholarGO</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap" rel="stylesheet">
    <style>
        /* ── Reset & Base ── */
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --brand:          #1a7a4a;
            --brand-dark:     #155f39;
            --brand-light:    #e8f5ee;
            --brand-ring:     rgba(26,122,74,.18);
            --bg-page:        #f0f2f5;
            --bg-card:        #ffffff;
            --border:         #e5e7eb;
            --text-primary:   #111827;
            --text-secondary: #6b7280;
            --text-muted:     #9ca3af;
            --success-bg:     #f0fdf4;
            --success-border: #22c55e;
            --success-text:   #15803d;
            --radius:         12px;
            --radius-sm:      8px;
            --radius-xs:      6px;
            --shadow-card:    0 1px 3px rgba(0,0,0,.08), 0 4px 16px rgba(0,0,0,.05);
            --shadow-btn:     0 2px 8px rgba(26,122,74,.35);
            --transition:     .18s ease;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-primary);
            min-height: 100vh;
            padding: 2rem 1rem 5rem;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        /* ── Breadcrumb ── */
        .breadcrumb {
            margin-bottom: 0.75rem;
            font-size: 0.78rem;
            color: var(--text-secondary);
        }
        .breadcrumb a { color: var(--text-secondary); text-decoration: none; }
        .breadcrumb a:hover { color: var(--brand); }
        .breadcrumb span { margin: 0 0.3rem; }

        /* ── Back Navigation ── */
        .nav-back {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: var(--text-secondary);
            text-decoration: none;
            margin-bottom: 1.25rem;
            transition: color var(--transition);
        }
        .nav-back:hover {
            color: var(--brand);
        }

        /* ── Card ── */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            border: 1px solid var(--border);
            overflow: hidden;
        }
        .card-body {
            padding: 2rem;
        }

        /* ── Poster Section ── */
        .poster-container {
            width: 100%;
            max-height: 420px;
            background: #f8fafc;
            border-radius: var(--radius-sm);
            border: 1px solid var(--border);
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.75rem;
        }
        .poster-img {
            max-height: 420px;
            width: 100%;
            object-fit: contain;
            display: block;
        }
        .no-poster-box {
            padding: 3rem 1.5rem;
            text-align: center;
            color: var(--text-muted);
            font-size: 0.88rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
        }

        /* ── Header ── */
        .detail-header {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 1.25rem;
            margin-bottom: 0.5rem;
        }
        .scholarship-title {
            font-size: 1.65rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            line-height: 1.3;
        }
        .organizer-subtitle {
            font-size: 0.95rem;
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        /* ── Badges ── */
        .badge {
            display: inline-block;
            padding: 0.28rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.78rem;
            font-weight: 600;
            flex-shrink: 0;
        }
        .badge-published {
            background: var(--success-bg);
            color: var(--success-text);
            border: 1px solid var(--success-border);
        }
        .badge-draft {
            background: #f3f4f6;
            color: #4b5563;
            border: 1px solid #e5e7eb;
        }

        /* ── Divider ── */
        .divider {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.5rem 0;
        }

        /* ── Info Grid ── */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.25rem 1.75rem;
            margin-bottom: 1.75rem;
        }
        .info-item dt {
            font-size: 0.76rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            margin-bottom: 0.35rem;
        }
        .info-item dd {
            font-size: 0.95rem;
            font-weight: 500;
            color: var(--text-primary);
        }

        /* ── Section Title ── */
        .section-title {
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-secondary);
            margin-bottom: 0.65rem;
        }

        /* ── Description ── */
        .description-text {
            font-size: 0.92rem;
            line-height: 1.65;
            color: #374151;
            white-space: pre-line;
            margin-bottom: 1.75rem;
        }

        /* ── Source Link Button ── */
        .source-link-box {
            margin-top: 1.5rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--border);
        }
        .btn-source {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            color: var(--brand);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: color var(--transition);
        }
        .btn-source:hover {
            color: var(--brand-dark);
            text-decoration: underline;
        }

        /* ── Action Footer (Prepared for PBI-12) ── */
        .detail-actions {
            margin-top: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            padding-top: 1.5rem;
            border-top: 1px solid var(--border);
        }
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            padding: 0.6rem 1.25rem;
            border-radius: var(--radius-xs);
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            cursor: pointer;
            transition: all var(--transition);
            border: none;
        }
        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-secondary);
        }
        .btn-ghost:hover {
            border-color: #9ca3af;
            color: var(--text-primary);
        }
        .pbi12-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .btn-outline-disabled {
            background: #f9fafb;
            border: 1px dashed #d1d5db;
            color: #9ca3af;
            cursor: not-allowed;
            font-size: 0.8rem;
        }

        @media (max-width: 640px) {
            .info-grid { grid-template-columns: 1fr; }
            .detail-header { flex-direction: column; align-items: flex-start; }
            .card-body { padding: 1.25rem; }
            .detail-actions { flex-direction: column; align-items: stretch; }
        }
    </style>
</head>
<body>

    <div class="container">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="#">Admin</a>
            <span>/</span>
            <a href="{{ route('admin.scholarships.index') }}">Beasiswa</a>
            <span>/</span>
            <span>Detail Beasiswa</span>
        </nav>

        {{-- Kembali ke daftar --}}
        <a href="{{ route('admin.scholarships.index') }}" class="nav-back">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <line x1="19" y1="12" x2="5" y2="12"></line>
                <polyline points="12 19 5 12 12 5"></polyline>
            </svg>
            Kembali ke daftar beasiswa
        </a>

        <div class="card">
            <div class="card-body">

                {{-- Poster Visualisasi --}}
                @if ($scholarship->poster)
                    <div class="poster-container">
                        <img src="{{ asset('storage/' . $scholarship->poster) }}"
                             alt="Poster {{ $scholarship->name }}"
                             class="poster-img"
                             onerror="this.style.display='none'; document.getElementById('no-poster-fallback').style.display='flex';">
                        <div id="no-poster-fallback" class="no-poster-box" style="display:none;">
                            <svg width="36" height="36" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>File gambar tidak ditemukan di storage</span>
                        </div>
                    </div>
                @endif

                {{-- Header: Judul & Status --}}
                <div class="detail-header">
                    <div>
                        <h1 class="scholarship-title">{{ $scholarship->name }}</h1>
                    </div>
                    <span class="badge {{ $scholarship->status === 'published' ? 'badge-published' : 'badge-draft' }}">
                        {{ ucfirst($scholarship->status ?? 'Draft') }}
                    </span>
                </div>

                <p class="organizer-subtitle">{{ $scholarship->organizer_name }}</p>

                <hr class="divider">

                {{-- Informasi Utama --}}
                <dl class="info-grid">
                    <div class="info-item">
                        <dt>Jenjang Pendidikan</dt>
                        <dd>
                            <span style="font-weight: 600; color: var(--brand);">{{ $scholarship->level }}</span>
                        </dd>
                    </div>

                    <div class="info-item">
                        <dt>Kategori</dt>
                        <dd>{{ $scholarship->category ?? '-' }}</dd>
                    </div>

                    <div class="info-item">
                        <dt>Nominal Bantuan</dt>
                        <dd>
                            @if ($scholarship->amount)
                                <strong>Rp {{ number_format($scholarship->amount, 0, ',', '.') }}</strong>
                            @else
                                <span style="color: var(--text-secondary);">-</span>
                            @endif
                        </dd>
                    </div>

                    <div class="info-item">
                        <dt>Kuota Penerima</dt>
                        <dd>
                            @if ($scholarship->quota)
                                {{ number_format($scholarship->quota, 0, ',', '.') }} orang
                            @else
                                <span style="color: var(--text-secondary);">Tidak terbatas</span>
                            @endif
                        </dd>
                    </div>

                    <div class="info-item">
                        <dt>Tanggal Mulai</dt>
                        <dd>{{ $scholarship->start_date?->format('d M Y') ?? '-' }}</dd>
                    </div>

                    <div class="info-item">
                        <dt>Deadline Pendaftaran</dt>
                        <dd>
                            @if ($scholarship->end_date)
                                <strong>{{ $scholarship->end_date->format('d M Y') }}</strong>
                            @else
                                <span style="color: var(--text-secondary);">-</span>
                            @endif
                        </dd>
                    </div>
                </dl>

                {{-- Deskripsi --}}
                <div class="section-title">Deskripsi Beasiswa</div>
                <div class="description-text">{{ $scholarship->description }}</div>

                {{-- Link Sumber Resmi --}}
                @if ($scholarship->source_url)
                    <div class="source-link-box">
                        <a href="{{ $scholarship->source_url }}" target="_blank" rel="noopener noreferrer" class="btn-source">
                            <span>Buka Halaman Resmi Beasiswa</span>
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"></path>
                                <polyline points="15 3 21 3 21 9"></polyline>
                                <line x1="10" y1="14" x2="21" y2="3"></line>
                            </svg>
                        </a>
                    </div>
                @endif

                {{-- Footer Aksi --}}
                <div class="detail-actions">
                    <a href="{{ route('admin.scholarships.index') }}" class="btn btn-ghost">
                        &larr; Kembali
                    </a>

                    {{-- Ruang untuk PBI-12 (Ubah dan Hapus) --}}
                    <div class="pbi12-actions">
                        <span class="btn btn-outline-disabled" title="Tersedia di PBI-12">
                            ✏️ Edit Beasiswa (PBI-12)
                        </span>
                        <span class="btn btn-outline-disabled" title="Tersedia di PBI-12">
                            🗑️ Hapus Beasiswa (PBI-12)
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
