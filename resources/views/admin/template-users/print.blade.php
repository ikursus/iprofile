<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maklumat User - {{ $user->name }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .header h1 {
            color: #007bff;
            margin: 0;
            font-size: 28px;
        }
        .header h2 {
            color: #6c757d;
            margin: 5px 0 0 0;
            font-size: 18px;
            font-weight: normal;
        }
        .user-info {
            background: #f8f9fa;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 30px;
        }
        .info-row {
            display: flex;
            margin-bottom: 15px;
            border-bottom: 1px solid #dee2e6;
            padding-bottom: 10px;
        }
        .info-row:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }
        .info-label {
            font-weight: bold;
            width: 200px;
            color: #495057;
        }
        .info-value {
            flex: 1;
            color: #212529;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }
        .status-aktif {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .status-tidak-aktif {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .status-digantung {
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeaa7;
        }
        .programs-section {
            margin-top: 30px;
        }
        .programs-title {
            color: #007bff;
            border-bottom: 1px solid #007bff;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .program-item {
            background: #ffffff;
            border: 1px solid #dee2e6;
            border-radius: 4px;
            padding: 15px;
            margin-bottom: 10px;
        }
        .program-name {
            font-weight: bold;
            color: #495057;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #6c757d;
            border-top: 1px solid #dee2e6;
            padding-top: 20px;
        }
        @media print {
            body {
                margin: 0;
                padding: 15px;
            }
            .header {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <h1>iProfile System</h1>
        <h2>Maklumat Pengguna</h2>
    </div>

    <!-- User Information -->
    <div class="user-info">
        <div class="info-row">
            <div class="info-label">Nama Penuh:</div>
            <div class="info-value">{{ $user->name }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">No. Kad Pengenalan:</div>
            <div class="info-value">{{ $user->no_kp ?? 'Tidak dinyatakan' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Alamat Email:</div>
            <div class="info-value">{{ $user->email }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">No. Telefon:</div>
            <div class="info-value">{{ $user->phone ?? 'Tidak dinyatakan' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Status:</div>
            <div class="info-value">
                @if($user->status == 'aktif')
                    <span class="status-badge status-aktif">Aktif</span>
                @elseif($user->status == 'tidak aktif')
                    <span class="status-badge status-tidak-aktif">Tidak Aktif</span>
                @elseif($user->status == 'digantung')
                    <span class="status-badge status-digantung">Digantung</span>
                @else
                    <span class="status-badge">{{ ucfirst($user->status ?? 'Tidak dinyatakan') }}</span>
                @endif
            </div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Tarikh Daftar:</div>
            <div class="info-value">{{ $user->created_at ? $user->created_at->format('d/m/Y H:i:s') : 'Tidak dinyatakan' }}</div>
        </div>
        
        <div class="info-row">
            <div class="info-label">Kemaskini Terakhir:</div>
            <div class="info-value">{{ $user->updated_at ? $user->updated_at->format('d/m/Y H:i:s') : 'Tidak dinyatakan' }}</div>
        </div>
    </div>

    <!-- Programs Section -->
    @if($user->programs && $user->programs->count() > 0)
    <div class="programs-section">
        <h3 class="programs-title">Program Yang Disertai</h3>
        @foreach($user->programs as $program)
        <div class="program-item">
            <div class="program-name">{{ $program->name ?? 'Program Tidak Dinamakan' }}</div>
            @if($program->description)
            <div style="color: #6c757d; font-size: 14px; margin-top: 5px;">
                {{ $program->description }}
            </div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="programs-section">
        <h3 class="programs-title">Program Yang Disertai</h3>
        <div style="text-align: center; color: #6c757d; padding: 20px;">
            Tiada program yang disertai
        </div>
    </div>
    @endif

    <!-- Footer -->
    <div class="footer">
        <p>Dokumen ini dijana secara automatik pada {{ now()->format('d/m/Y H:i:s') }}</p>
        <p>iProfile System - Sistem Pengurusan Profil Pengguna</p>
    </div>
</body>
</html>