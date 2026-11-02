<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Daftar beasiswa untuk admin ScholarGO">
    <title>Daftar Beasiswa – ScholarGO Admin</title>
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
            --border-hover:   #d1d5db;
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
            max-width: 1100px;
            margin: 0 auto;
        }

        /* ── Breadcrumb ── */
        .breadcrumb {
            margin-bottom: 0.5rem;
            font-size: 0.78rem;
            color: var(--text-secondary);
        }
        .breadcrumb a { color: var(--text-secondary); text-decoration: none; }
        .breadcrumb a:hover { color: var(--brand); }
        .breadcrumb span { margin: 0 0.3rem; }

        /* ── Header ── */
        .header-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .page-title {
            font-size: 1.65rem;
            font-weight: 700;
            color: var(--text-primary);
            letter-spacing: -0.02em;
        }

        /* ── Button ── */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.65rem 1.25rem;
            border-radius: var(--radius-sm);
            font-size: 0.88rem;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            cursor: pointer;
            border: none;
        }
        .btn-brand {
            background: var(--brand);
            color: #ffffff;
            box-shadow: var(--shadow-btn);
        }
        .btn-brand:hover {
            background: var(--brand-dark);
            transform: translateY(-1px);
        }

        /* ── Alert ── */
        .alert {
            border-radius: var(--radius-sm);
            padding: 0.85rem 1.1rem;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
            border: 1px solid;
            margin-bottom: 1.5rem;
        }
        .alert-success {
            background: var(--success-bg);
            border-color: var(--success-border);
            color: var(--success-text);
        }
        .alert-icon { font-weight: 700; }

        /* ── Card ── */
        .card {
            background: var(--bg-card);
            border-radius: var(--radius);
            box-shadow: var(--shadow-card);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        /* ── Table ── */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
            text-align: left;
        }
        thead {
            background: #f9fafb;
            border-bottom: 1px solid var(--border);
        }
        th {
            padding: 0.85rem 1.15rem;
            font-weight: 600;
            color: var(--text-secondary);
            font-size: 0.76rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        tbody tr {
            border-bottom: 1px solid #f3f4f6;
            transition: background var(--transition);
        }
        tbody tr:last-child {
            border-bottom: none;
        }
        tbody tr:hover {
            background: #fafbfb;
        }
        td {
            padding: 0.95rem 1.15rem;
            vertical-align: middle;
            color: var(--text-primary);
        }

        /* ── Poster image ── */
        .poster-thumb {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-xs);
            object-fit: cover;
            border: 1px solid var(--border);
            background: #f3f4f6;
        }
        .no-poster {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-xs);
            background: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.68rem;
            color: var(--text-muted);
            text-align: center;
            border: 1px dashed var(--border-hover);
        }

        /* ── Badges ── */
        .badge {
            display: inline-block;
            padding: 0.25rem 0.6rem;
            border-radius: 9999px;
            font-size: 0.72rem;
            font-weight: 600;
        }
        .badge-brand {
            background: var(--brand-light);
            color: var(--brand-dark);
        }
        .badge-status-aktif {
            background: #ecfdf5;
            color: #047857;
            border: 1px solid #a7f3d0;
        }
        .badge-status-tutup {
            background: #fef2f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }
        .badge-status-draft {
            background: #f3f4f6;
            color: #4b5563;
            border: 1px solid #e5e7eb;
        }

        /* ── Detail Button ── */
        .btn-detail {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 0.35rem 0.75rem;
            border-radius: var(--radius-xs);
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--brand);
            background: var(--brand-light);
            text-decoration: none;
            transition: all var(--transition);
        }
        .btn-detail:hover {
            background: var(--brand);
            color: #fff;
        }
        .hover-title:hover {
            color: var(--brand);
            text-decoration: underline;
        }

        /* ── Empty State ── */
        .empty-state {
            text-align: center;
            padding: 3.5rem 1.5rem;
            color: var(--text-secondary);
        }
        .empty-state p {
            margin-bottom: 1.25rem;
            font-size: 0.92rem;
        }

        /* ── Pagination ── */
        .pagination-container {
            padding: 1rem 1.25rem;
            border-top: 1px solid var(--border);
            background: #fafbfb;
        }
    </style>
</head>
<body>

    <div class="container">
        {{-- Breadcrumb --}}
        <nav class="breadcrumb" aria-label="Breadcrumb">
            <a href="#">Admin</a>
            <span>/</span>
            <span>Beasiswa</span>
            <span>/</span>
            <span>Daftar Beasiswa</span>
        </nav>

        {{-- Header Section --}}
        <div class="header-section">
            <h1 class="page-title">Daftar Beasiswa</h1>
            <a href="{{ route('admin.scholarships.create') }}" class="btn btn-brand">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Beasiswa
            </a>
        </div>

        {{-- Flash Success Message --}}
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                <span class="alert-icon">✓</span>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Main Table Card --}}
        <div class="card">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th style="width: 70px;">Poster</th>
                            <th>Nama Beasiswa</th>
                            <th>Penyelenggara</th>
                            <th>Kategori / Jenjang</th>
                            <th>Periode</th>
                            <th>Status</th>
                            <th style="width: 90px; text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($scholarships as $index => $scholarship)
                            <tr>
                                <td>
                                    {{ method_exists($scholarships, 'firstItem') ? $scholarships->firstItem() + $index : $index + 1 }}
                                </td>
                                <td>
                                    @if ($scholarship->poster)
                                        <img src="{{ asset('storage/' . $scholarship->poster) }}" alt="Poster" class="poster-thumb">
                                    @else
                                        <div class="no-poster">No Pic</div>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.scholarships.show', $scholarship) }}" style="text-decoration: none; color: inherit;" class="hover-title">
                                        <strong>{{ $scholarship->name }}</strong>
                                    </a>
                                </td>
                                <td>
                                    <span style="color: var(--text-secondary);">{{ $scholarship->organizer_name ?? '-' }}</span>
                                </td>
                                <td>
                                    <span class="badge badge-brand">{{ $scholarship->category ?? 'Umum' }}</span>
                                    @if ($scholarship->level)
                                        <span class="badge" style="background:#eef2ff; color:#4338ca;">{{ $scholarship->level }}</span>
                                    @endif
                                </td>
                                <td style="font-size: 0.8rem; color: var(--text-secondary);">
                                    @if ($scholarship->start_date && $scholarship->end_date)
                                        {{ \Carbon\Carbon::parse($scholarship->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($scholarship->end_date)->format('d M Y') }}
                                    @elseif ($scholarship->end_date)
                                        s/d {{ \Carbon\Carbon::parse($scholarship->end_date)->format('d M Y') }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @php
                                        $statusClass = match(strtolower($scholarship->status ?? '')) {
                                            'aktif', 'active', 'published' => 'badge-status-aktif',
                                            'tutup', 'closed', 'berakhir' => 'badge-status-tutup',
                                            default => 'badge-status-draft',
                                        };
                                    @endphp
                                    <span class="badge {{ $statusClass }}">
                                        {{ ucfirst($scholarship->status ?? 'Draft') }}
                                    </span>
                                </td>
                                <td style="text-align: center;">
                                    <a href="{{ route('admin.scholarships.show', $scholarship) }}" class="btn-detail">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">
                                    <div class="empty-state">
                                        <p>Belum ada data beasiswa yang ditambahkan.</p>
                                        <a href="{{ route('admin.scholarships.create') }}" class="btn btn-brand">
                                            + Tambah Beasiswa Sekarang
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($scholarships, 'hasPages') && $scholarships->hasPages())
                <div class="pagination-container">
                    {{ $scholarships->links() }}
                </div>
            @endif
        </div>
    </div>

</body>
</html>
