<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Form tambah beasiswa baru untuk admin ScholarGO">
    <title>Tambah Beasiswa – ScholarGO Admin</title>
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
            --bg-input:       #ffffff;
            --bg-input-focus: #f7fdf9;
            --border:         #d1d5db;
            --border-focus:   #1a7a4a;
            --text-primary:   #111827;
            --text-secondary: #6b7280;
            --text-label:     #374151;
            --text-placeholder: #9ca3af;
            --success-bg:     #f0fdf4;
            --success-border: #22c55e;
            --success-text:   #15803d;
            --error-bg:       #fef2f2;
            --error-border:   #ef4444;
            --error-text:     #b91c1c;
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

        /* ── Breadcrumb ── */
        .breadcrumb {
            max-width: 1100px;
            margin: 0 auto 0.5rem;
            font-size: 0.78rem;
            color: var(--text-secondary);
        }
        .breadcrumb a { color: var(--text-secondary); text-decoration: none; }
        .breadcrumb a:hover { color: var(--brand); }
        .breadcrumb span { margin: 0 0.3rem; }

        /* ── Page title ── */
        .page-title {
            max-width: 1100px;
            margin: 0 auto 1.75rem;
            font-size: 1.65rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        /* ── Layout ── */
        .layout {
            max-width: 1100px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 280px;
            gap: 1.5rem;
            align-items: start;
        }

        /* ── Alerts ── */
        .alert {
            grid-column: 1 / -1;
            border-radius: var(--radius-sm);
            padding: 0.85rem 1.1rem;
            font-size: 0.875rem;
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            border: 1px solid;
            margin-bottom: 0;
        }
        .alert-success {
            background: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success-text);
        }
        .alert-error {
            background: var(--error-bg);
            border-color: var(--error-border);
            color: var(--error-text);
        }
        .alert ul { list-style: disc; padding-left: 1.2rem; margin-top: 4px; }
        .alert ul li + li { margin-top: 3px; }
        .alert-icon { flex-shrink: 0; margin-top: 1px; font-size: 1rem; }

        /* ── Card ── */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            border: 1px solid #e5e7eb;
            overflow: hidden;
        }
        .card-body { padding: 1.75rem 2rem 2rem; }

        /* ── Section heading ── */
        .section-label {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            color: var(--text-secondary);
            margin-bottom: 1rem;
            padding-bottom: 0.4rem;
            border-bottom: 1px solid #e5e7eb;
        }

        /* ── Form grid ── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.1rem 1.25rem;
        }
        .form-group { display: flex; flex-direction: column; gap: 5px; }
        .form-group.full { grid-column: 1 / -1; }
        .form-group.w-third { grid-column: span 1; }

        /* ── Label ── */
        label {
            font-size: 0.8rem;
            font-weight: 500;
            color: var(--text-label);
        }
        .required-star { color: #ef4444; margin-left: 2px; }

        /* ── Inputs ── */
        input[type="text"],
        input[type="number"],
        input[type="url"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            background: var(--bg-input);
            border: 1px solid var(--border);
            border-radius: var(--radius-xs);
            color: var(--text-primary);
            padding: 0.575rem 0.8rem;
            font-size: 0.88rem;
            font-family: inherit;
            transition: border-color var(--transition), box-shadow var(--transition), background var(--transition);
            outline: none;
            -webkit-appearance: none;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="url"]:focus,
        input[type="date"]:focus,
        textarea:focus,
        select:focus {
            border-color: var(--border-focus);
            box-shadow: 0 0 0 3px var(--brand-ring);
            background: var(--bg-input-focus);
        }
        input::placeholder,
        textarea::placeholder { color: var(--text-placeholder); }

        textarea { resize: vertical; min-height: 110px; }

        /* ── Select ── */
        select {
            cursor: pointer;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%236b7280' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.7rem center;
            padding-right: 2.2rem;
        }
        select option { background: #fff; color: var(--text-primary); }

        /* ── Date input calendar icon color ── */
        input[type="date"]::-webkit-calendar-picker-indicator {
            opacity: 0.5;
            cursor: pointer;
        }

        /* ── Error state ── */
        .is-invalid {
            border-color: var(--error-border) !important;
            box-shadow: 0 0 0 3px rgba(239,68,68,.12) !important;
        }
        .field-error { font-size: 0.74rem; color: #dc2626; margin-top: 2px; }

        /* ── Helper text ── */
        .helper { font-size: 0.73rem; color: var(--text-secondary); margin-top: 2px; }

        /* ── Divider ── */
        .form-divider {
            grid-column: 1 / -1;
            border: none;
            border-top: 1px solid #e5e7eb;
            margin: 0.35rem 0;
        }

        /* ── File upload ── */
        .file-wrapper {
            position: relative;
            border: 1.5px dashed var(--border);
            border-radius: var(--radius-xs);
            padding: 1.1rem 1rem;
            text-align: center;
            transition: border-color var(--transition), background var(--transition);
            cursor: pointer;
            background: #fafafa;
        }
        .file-wrapper:hover { border-color: var(--brand); background: var(--brand-light); }
        .file-wrapper input[type="file"] {
            position: absolute; inset: 0; width: 100%; height: 100%;
            opacity: 0; cursor: pointer; border: none; background: none;
        }
        .file-label-inner {
            pointer-events: none;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            justify-content: center;
        }
        .file-label-inner svg { flex-shrink: 0; color: var(--brand); }
        .file-label-text-main { font-size: 0.83rem; color: var(--text-secondary); }
        .file-label-text-main strong { color: var(--brand); font-weight: 600; }
        .poster-preview-card {
            display: none;
            margin-top: 0.75rem;
            padding: 0.75rem 1rem;
            background: #f9fafb;
            border: 1px solid var(--border);
            border-radius: var(--radius-xs);
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }
        .poster-preview-left {
            display: flex;
            align-items: center;
            gap: 0.85rem;
            overflow: hidden;
        }
        .poster-preview-img {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border-radius: var(--radius-xs);
            border: 1px solid var(--border);
            background: #fff;
            flex-shrink: 0;
        }
        .poster-preview-info {
            display: flex;
            flex-direction: column;
            gap: 2px;
            overflow: hidden;
        }
        .poster-filename {
            font-size: 0.82rem;
            font-weight: 600;
            color: var(--text-primary);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .poster-filesize {
            font-size: 0.73rem;
            color: var(--text-secondary);
        }
        .btn-remove-poster {
            background: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
            border-radius: var(--radius-xs);
            padding: 0.35rem 0.65rem;
            font-size: 0.75rem;
            font-weight: 600;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            transition: all var(--transition);
            flex-shrink: 0;
        }
        .btn-remove-poster:hover {
            background: #fca5a5;
            color: #991b1b;
        }
        .poster-error-alert {
            display: none;
            margin-top: 0.65rem;
            padding: 0.65rem 0.95rem;
            background: var(--error-bg);
            border: 1px solid var(--error-border);
            border-radius: var(--radius-xs);
            color: var(--error-text);
            font-size: 0.8rem;
            align-items: center;
            gap: 0.55rem;
            animation: fadeIn .2s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-3px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ── Status select (simplified) ── */
        .status-select-wrapper { position: relative; }
        .status-select-wrapper select { padding-left: 0.8rem; }

        /* ── Submit ── */
        .form-actions {
            margin-top: 1.75rem;
            display: flex;
            gap: 0.65rem;
        }
        .btn {
            display: inline-flex; align-items: center; gap: 0.45rem;
            padding: 0.6rem 1.35rem;
            border-radius: var(--radius-xs);
            font-size: 0.875rem; font-weight: 500; font-family: inherit;
            cursor: pointer; border: none;
            transition: all var(--transition);
            text-decoration: none;
        }
        .btn-primary {
            background: var(--brand);
            color: #fff;
            box-shadow: var(--shadow-btn);
        }
        .btn-primary:hover {
            background: var(--brand-dark);
            box-shadow: 0 4px 12px rgba(26,122,74,.45);
            transform: translateY(-1px);
        }
        .btn-primary:active { transform: translateY(0); }
        .btn-ghost {
            background: transparent;
            border: 1px solid var(--border);
            color: var(--text-secondary);
        }
        .btn-ghost:hover { border-color: #9ca3af; color: var(--text-primary); }

        /* ── Sidebar card ── */
        .sidebar-card { }
        .sidebar-card-header {
            padding: 1rem 1.25rem 0.75rem;
            border-bottom: 1px solid #e5e7eb;
        }
        .sidebar-card-header h3 {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-primary);
        }
        .sidebar-card-body {
            padding: 1rem 1.25rem;
        }
        .empty-state {
            font-size: 0.82rem;
            color: var(--text-secondary);
        }

        /* ── Responsive ── */
        @media (max-width: 900px) {
            .layout { grid-template-columns: 1fr; }
            .alert { grid-column: auto; }
        }
        @media (max-width: 600px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-group.full { grid-column: auto; }
            .card-body { padding: 1.25rem; }
        }
    </style>
</head>
<body>

    {{-- ── Breadcrumb ── --}}
    <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="#">Admin</a>
        <span>/</span>
        <a href="{{ route('admin.scholarships.index') }}">Beasiswa</a>
        <span>/</span>
        <span>Tambah Beasiswa</span>
    </nav>

    {{-- ── Page title ── --}}
    <h1 class="page-title">Tambah Beasiswa</h1>

    {{-- ── Layout ── --}}
    <div class="layout">

        {{-- ── Alerts ── --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <span class="alert-icon">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <span class="alert-icon">✕</span>
                <div>
                    <strong>Terdapat kesalahan pada form:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- ── Main form card ── --}}
        <main class="card" role="main">
            <div class="card-body">
                <form id="scholarship-form"
                      method="POST"
                      action="{{ route('admin.scholarships.store') }}"
                      enctype="multipart/form-data"
                      novalidate>
                    @csrf

                    {{-- ═══════════════════════════════════════════
                         Seksi 1 · Informasi Umum
                    ═══════════════════════════════════════════ --}}
                    <div class="section-label">Informasi Umum</div>
                    <div class="form-grid">

                        {{-- Nama Beasiswa --}}
                        <div class="form-group full">
                            <label for="name">Nama Beasiswa<span class="required-star">*</span></label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name') }}"
                                   placeholder="cth. Beasiswa Unggulan Kemendikbud 2025"
                                   autocomplete="off"
                                   class="{{ $errors->has('name') ? 'is-invalid' : '' }}">
                            @error('name') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Penyelenggara --}}
                        <div class="form-group full">
                            <label for="organizer_name">Penyelenggara<span class="required-star">*</span></label>
                            <input type="text"
                                   id="organizer_name"
                                   name="organizer_name"
                                   value="{{ old('organizer_name') }}"
                                   placeholder="cth. Kementerian Pendidikan dan Kebudayaan"
                                   autocomplete="off"
                                   class="{{ $errors->has('organizer_name') ? 'is-invalid' : '' }}">
                            @error('organizer_name') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="form-group full">
                            <label for="description">Deskripsi<span class="required-star">*</span></label>
                            <textarea id="description"
                                      name="description"
                                      placeholder="Jelaskan informasi umum beasiswa, tujuan, manfaat, persyaratan, dll."
                                      class="{{ $errors->has('description') ? 'is-invalid' : '' }}">{{ old('description') }}</textarea>
                            @error('description') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                    </div>{{-- /.form-grid informasi umum --}}

                    {{-- ═══════════════════════════════════════════
                         Seksi 2 · Detail Beasiswa
                    ═══════════════════════════════════════════ --}}
                    <div class="section-label" style="margin-top:1.5rem;">Detail Beasiswa</div>
                    <div class="form-grid">

                        {{-- Jenjang --}}
                        <div class="form-group">
                            <label for="level">Jenjang<span class="required-star">*</span></label>
                            <select id="level" name="level"
                                    class="{{ $errors->has('level') ? 'is-invalid' : '' }}">
                                <option value="" disabled @selected(!old('level'))>-- Pilih jenjang --</option>
                                @foreach (['D3', 'D4', 'S1', 'S2', 'S3'] as $lvl)
                                    <option value="{{ $lvl }}" @selected(old('level') === $lvl)>{{ $lvl }}</option>
                                @endforeach
                            </select>
                            @error('level') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kategori --}}
                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select id="category" name="category"
                                    class="{{ $errors->has('category') ? 'is-invalid' : '' }}">
                                <option value="" @selected(!old('category'))>-- Pilih kategori --</option>
                                @foreach ([
                                    'Full Scholarship'    => 'Full Scholarship',
                                    'Partial Scholarship' => 'Partial Scholarship',
                                    'Beasiswa Riset'      => 'Beasiswa Riset',
                                    'Beasiswa Prestasi'   => 'Beasiswa Prestasi',
                                    'Beasiswa Afirmasi'   => 'Beasiswa Afirmasi',
                                    'Beasiswa Vokasi'     => 'Beasiswa Vokasi',
                                ] as $val => $label)
                                    <option value="{{ $val }}" @selected(old('category') === $val)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('category') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Nominal --}}
                        <div class="form-group">
                            <label for="amount">Nominal (Rp)</label>
                            <input type="number"
                                   id="amount"
                                   name="amount"
                                   value="{{ old('amount') }}"
                                   min="0"
                                   placeholder="cth. 20000000"
                                   class="{{ $errors->has('amount') ? 'is-invalid' : '' }}">
                            <span class="helper">Opsional. Kosongkan jika tidak diketahui.</span>
                            @error('amount') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Kuota --}}
                        <div class="form-group">
                            <label for="quota">Kuota</label>
                            <input type="number"
                                   id="quota"
                                   name="quota"
                                   value="{{ old('quota') }}"
                                   min="1"
                                   placeholder="cth. 100"
                                   class="{{ $errors->has('quota') ? 'is-invalid' : '' }}">
                            <span class="helper">Opsional. Kosongkan jika tidak terbatas.</span>
                            @error('quota') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Tanggal Mulai --}}
                        <div class="form-group">
                            <label for="start_date">Tanggal Mulai Pendaftaran</label>
                            <input type="date"
                                   id="start_date"
                                   name="start_date"
                                   value="{{ old('start_date') }}"
                                   class="{{ $errors->has('start_date') ? 'is-invalid' : '' }}">
                            @error('start_date') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Deadline --}}
                        <div class="form-group">
                            <label for="end_date">Deadline Pendaftaran</label>
                            <input type="date"
                                   id="end_date"
                                   name="end_date"
                                   value="{{ old('end_date') }}"
                                   class="{{ $errors->has('end_date') ? 'is-invalid' : '' }}">
                            @error('end_date') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                    </div>{{-- /.form-grid detail --}}

                    {{-- ═══════════════════════════════════════════
                         Seksi 3 · Media & Publikasi
                    ═══════════════════════════════════════════ --}}
                    <div class="section-label" style="margin-top:1.5rem;">Media & Publikasi</div>
                    <div class="form-grid">

                        {{-- Link Sumber --}}
                        <div class="form-group full">
                            <label for="source_url">Link Sumber</label>
                            <input type="url"
                                   id="source_url"
                                   name="source_url"
                                   value="{{ old('source_url') }}"
                                   placeholder="https://"
                                   class="{{ $errors->has('source_url') ? 'is-invalid' : '' }}">
                            <span class="helper">Opsional. URL halaman resmi beasiswa.</span>
                            @error('source_url') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                        {{-- Upload Poster --}}
                        <div class="form-group full">
                            <label>Poster (JPG/PNG/WEBP, maks. 2 MB)</label>
                            <div class="file-wrapper" id="poster-drop">
                                <input type="file"
                                       id="poster"
                                       name="poster"
                                       accept="image/jpeg,image/png,image/jpg,image/webp"
                                       aria-label="Unggah poster beasiswa">
                                <div class="file-label-inner" id="file-label-inner">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                                        <circle cx="8.5" cy="8.5" r="1.5"/>
                                        <polyline points="21 15 16 10 5 21"/>
                                    </svg>
                                    <span class="file-label-text-main">
                                        <strong>Pilih File</strong> &nbsp;atau tarik file poster ke sini
                                    </span>
                                </div>
                            </div>

                            {{-- Preview Card saat file dipilih --}}
                            <div class="poster-preview-card" id="poster-preview-card">
                                <div class="poster-preview-left">
                                    <img id="poster-preview" class="poster-preview-img" src="" alt="Preview poster">
                                    <div class="poster-preview-info">
                                        <span class="poster-filename" id="poster-filename">-</span>
                                        <span class="poster-filesize" id="poster-filesize">-</span>
                                    </div>
                                </div>
                                <button type="button" class="btn-remove-poster" id="btn-remove-poster" title="Hapus poster yang dipilih">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                    Hapus
                                </button>
                            </div>
                            {{-- Alert jika ukuran file > 2MB --}}
                            <div id="poster-client-error" class="poster-error-alert" role="alert">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" style="flex-shrink:0;">
                                    <circle cx="12" cy="12" r="10"/>
                                    <line x1="12" y1="8" x2="12" y2="12"/>
                                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                                </svg>
                                <span id="poster-error-text"></span>
                            </div>
                            @error('poster') <span class="field-error" style="margin-top:4px; display:block;">{{ $message }}</span> @enderror
                        </div>

                        {{-- Status --}}
                        <div class="form-group full">
                            <label for="status">Status<span class="required-star">*</span></label>
                            <div class="status-select-wrapper">
                                <select id="status" name="status"
                                        class="{{ $errors->has('status') ? 'is-invalid' : '' }}">
                                    <option value="draft"      @selected(old('status', 'draft') === 'draft')>Draft</option>
                                    <option value="published"  @selected(old('status') === 'published')>Published</option>
                                </select>
                            </div>
                            @error('status') <span class="field-error">{{ $message }}</span> @enderror
                        </div>

                    </div>{{-- /.form-grid media --}}

                    {{-- ── Actions ── --}}
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="btn-submit">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2.5">
                                <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z"/>
                                <polyline points="17 21 17 13 7 13 7 21"/>
                                <polyline points="7 3 7 8 15 8"/>
                            </svg>
                            Simpan
                        </button>
                        <button type="reset" class="btn btn-ghost" id="btn-reset">Reset</button>
                        <a href="{{ route('admin.scholarships.index') }}" class="btn btn-ghost" id="btn-back">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                <polyline points="12 19 5 12 12 5"></polyline>
                            </svg>
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </main>

        {{-- ── Sidebar ── --}}
        <aside>
            <div class="card sidebar-card">
                <div class="sidebar-card-header">
                    <h3>Beasiswa Terbaru</h3>
                </div>
                <div class="sidebar-card-body">
                    @if(isset($recentScholarships) && $recentScholarships->count() > 0)
                        <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:0.75rem;">
                            @foreach($recentScholarships as $item)
                                <li style="font-size:0.8rem; border-bottom:1px solid #f3f4f6; padding-bottom:0.6rem;">
                                    <a href="{{ route('admin.scholarships.show', $item) }}" style="text-decoration:none; color:inherit;">
                                        <div style="font-weight:600; color:var(--text-primary); margin-bottom:2px;" onmouseover="this.style.color='var(--brand)'" onmouseout="this.style.color='var(--text-primary)'">{{ $item->name }}</div>
                                    </a>
                                    <div style="font-size:0.72rem; color:var(--text-secondary);">
                                        {{ $item->organizer_name }} &bull; <span style="color:var(--brand);">{{ $item->level }}</span>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="empty-state">Belum ada data.</p>
                    @endif
                </div>
            </div>
        </aside>

    </div>{{-- /.layout --}}

    <script>
        // ── Poster preview, client validation & clear ──
        const posterInput       = document.getElementById('poster');
        const posterDrop        = document.getElementById('poster-drop');
        const posterPreviewCard = document.getElementById('poster-preview-card');
        const posterPreview     = document.getElementById('poster-preview');
        const posterFilename    = document.getElementById('poster-filename');
        const posterFilesize    = document.getElementById('poster-filesize');
        const btnRemovePoster   = document.getElementById('btn-remove-poster');
        const posterClientError = document.getElementById('poster-client-error');
        const posterErrorText   = document.getElementById('poster-error-text');

        function formatBytes(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }

        function clearPoster(keepError = false) {
            posterInput.value = '';
            posterPreview.src = '';
            posterPreviewCard.style.display = 'none';
            posterDrop.style.display = 'block';
            if (!keepError) {
                posterClientError.style.display = 'none';
                posterErrorText.textContent = '';
                posterDrop.classList.remove('is-invalid');
            }
        }

        posterInput.addEventListener('change', function () {
            const file = this.files[0];

            // Reset pesan error sebelumnya setiap kali user memilih file baru
            posterClientError.style.display = 'none';
            posterErrorText.textContent = '';
            posterDrop.classList.remove('is-invalid');

            if (file) {
                // Batas maksimal 2 MB (2 * 1024 * 1024 bytes)
                const maxBytes = 2 * 1024 * 1024;
                if (file.size > maxBytes) {
                    posterErrorText.textContent = `Ukuran file "${file.name}" (${formatBytes(file.size)}) melebihi batas maksimal 2 MB. Silakan pilih file gambar yang lebih kecil.`;
                    posterClientError.style.display = 'flex';
                    posterDrop.classList.add('is-invalid');
                    clearPoster(true); // reset input tapi biarkan pesan error tetap muncul
                    return;
                }

                posterPreview.src = URL.createObjectURL(file);
                posterFilename.textContent = file.name;
                posterFilesize.textContent = formatBytes(file.size);
                posterPreviewCard.style.display = 'flex';
                posterDrop.style.display = 'none';
            }
        });

        btnRemovePoster.addEventListener('click', function (e) {
            e.preventDefault();
            clearPoster(false);
        });

        // ── Reset also clears preview & error ──
        document.getElementById('btn-reset').addEventListener('click', function () {
            clearPoster(false);
        });

        // ── Submit loading state ──
        document.getElementById('scholarship-form').addEventListener('submit', function () {
            const btn = document.getElementById('btn-submit');
            btn.disabled = true;
            btn.innerHTML = `
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2.5" style="animation:spin .8s linear infinite">
                    <path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0"/>
                </svg>
                Menyimpan…`;
        });

        // ── Date constraint: end_date >= start_date ──
        document.getElementById('start_date').addEventListener('change', function () {
            document.getElementById('end_date').min = this.value;
        });
    </script>

    <style>
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>

</body>
</html>
