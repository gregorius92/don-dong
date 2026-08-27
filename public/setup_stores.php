<?php

// Nonaktifkan display errors mentah dan gunakan format ramah
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Cache;
use App\Models\Store;
use Database\Seeders\StoreSeeder;

// Cleanup legacy files if present
if (file_exists(__DIR__ . '/setup_toko.php')) {
    @unlink(__DIR__ . '/setup_toko.php');
}
if (file_exists(__DIR__ . '/delete_helper.php')) {
    @unlink(__DIR__ . '/delete_helper.php');
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup Stores DonDong — Idempotent Safe Setup</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 min-h-screen flex items-center justify-center p-4">
    <div class="max-w-xl w-full bg-slate-800 border border-slate-700 rounded-2xl p-6 sm:p-8 shadow-2xl space-y-5">
        <div class="flex items-center gap-3">
            <div class="w-12 h-12 rounded-xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center text-2xl font-bold">
                🏪
            </div>
            <div>
                <h1 class="text-xl font-bold text-white">Setup Stores DonDong!</h1>
                <p class="text-xs text-slate-400">Idempotent (Aman dipanggil berulang kali tanpa duplikasi)</p>
            </div>
        </div>

        <div class="space-y-3 text-sm">
            <?php
            try {
                // 1. Buat Tabel jika belum ada
                $tableExisted = Schema::hasTable('stores');
                if (!$tableExisted) {
                    Schema::create('stores', function (Blueprint $table) {
                        $table->id();
                        $table->string('name');
                        $table->string('city')->index();
                        $table->text('address');
                        $table->string('phone')->nullable();
                        $table->string('opening_hours')->nullable();
                        $table->text('maps_url')->nullable();
                        $table->text('maps_embed')->nullable();
                        $table->decimal('latitude', 10, 7)->nullable();
                        $table->decimal('longitude', 10, 7)->nullable();
                        $table->boolean('is_active')->default(true)->index();
                        $table->timestamps();
                    });
                    echo '<div class="p-3 bg-emerald-950/60 border border-emerald-500/40 rounded-xl text-emerald-300">✅ Tabel <strong>stores</strong> berhasil dibuat baru.</div>';
                } else {
                    echo '<div class="p-3 bg-slate-700/60 border border-slate-600 rounded-xl text-slate-300">ℹ️ Tabel <strong>stores</strong> sudah ada (tidak dibuat ulang).</div>';
                }

                // 2. Jalankan Seeder dengan updateOrCreate (Anti-Duplicate)
                $seeder = new StoreSeeder();
                $seeder->run();

                // Bersihkan cache aplikasi agar data langsung tampil
                Cache::flush();

                $totalStores = Store::count();
                $activeStores = Store::where('is_active', true)->count();
                $cities = Store::select('city')->distinct()->pluck('city')->toArray();

                echo '<div class="p-3 bg-emerald-950/60 border border-emerald-500/40 rounded-xl text-emerald-300">✅ Data toko berhasil disinkronkan tanpa duplikasi (Total: <strong>' . $totalStores . ' toko</strong> di ' . count($cities) . ' kota).</div>';
                
                echo '<div class="pt-2">';
                echo '<div class="text-xs font-bold uppercase text-slate-400 mb-2">Daftar Kota Terdaftar:</div>';
                echo '<div class="flex flex-wrap gap-1.5">';
                foreach ($cities as $c) {
                    echo '<span class="px-2.5 py-1 bg-slate-700 text-emerald-400 rounded-lg text-xs font-medium">' . htmlspecialchars($c) . '</span>';
                }
                echo '</div>';
                echo '</div>';

            } catch (\Throwable $e) {
                echo '<div class="p-4 bg-red-950/60 border border-red-500/40 rounded-xl text-red-300">❌ Error: ' . htmlspecialchars($e->getMessage()) . '</div>';
            }
            ?>
        </div>

        <div class="pt-4 border-t border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-3">
            <a href="/toko" class="w-full sm:w-auto text-center px-5 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs uppercase tracking-wider rounded-xl transition">
                Lihat Store Locator &rarr;
            </a>
            <a href="/admin/stores" class="w-full sm:w-auto text-center px-4 py-2 bg-slate-700 hover:bg-slate-600 text-slate-200 text-xs font-semibold rounded-xl transition">
                Buka Admin Toko
            </a>
        </div>
    </div>
</body>
</html>
