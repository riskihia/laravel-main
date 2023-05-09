<?php

use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/matakuliahs', [MatakuliahController::class, 'index']);


Route::get('/test-faker', function () {
    $daftar_matakuliah = [
        "Matematika","Fisika Dasar","Kimia Dasar","Pengantar Rekayasa & Desain",
  "Pengenalan Teknologi Informasi","Bahasa Inggris","Olah Raga",
  "Pengantar Rekayasa & Desain","Tata Tulis Karya Ilmiah",
  "Pengantar Analisis Rangkaian","Algoritma & Struktur Data",
  "Matematika Diskrit","Logika Informatika","Probabilitas & Statistika",
  "Aljabar Geometri","Organisasi & Arsitektur Komputer",
  "Pemrograman Berorientasi Objek","Strategi Algoritma",
  "Teori Bahasa Formal dan Otomata","Sistem Operasi","Basis Data",
  "Dasar Rekayasa Perangkat Lunak","Pengembangan Aplikasi Berbasis Web",
  "Pengembangan Aplikasi pada Platform Khusus","Jaringan Komputer",
  "Manajemen Proyek Perangkat Lunak","Manajemen Basis Data",
  "Interaksi Manusia & Komputer","Inteligensi Buatan","Agama dan Etika",
  "Sistem Paralel dan Terdistribusi","Sistem Informasi","Riset Operasi",
  "Grafika Komputer","Socio-Informatika dan Profesionalisme",
  "Wawasan Teknologi & Komunikasi Ilmiah","Algoritma & Struktur Data",
  "Bahasa Inggris","Pengantar Sistem Operasi","Arsitektur SI/TI Perusahaan",
  "Kepemimpinan & Ketrampilan Interpersonal","Statistika",
  "Desain & Manajemen Proses Bisnis","Desain & Manajemen Jaringan Komputer",
  "Dasar-Dasar Pengembangan Perangkat Lunak","Pengantar Basis Data",
  "Pemrograman Berorientasi Objek","Analisis & Desain Perangkat Lunak",
  "Interaksi Manusia & Komputer","Keamanan Aset Informasi",
  "Desain Basis Data","Pemrograman Berbasis Web","Sistem Cerdas",
  "Konstruksi & Pengujian Perangkat Lunak","Tata Tulis Ilmiah",
  "Manajemen Proyek TI","Simulasi Sistem","Tata Kelola TI",
  "Perencanaan Sumber Daya Perusahaan","Manajemen Layanan TI",
  "Dasar Pemrograman","Proyek Perangkat Lunak","Manajemen Resiko TI"
    ];

    $faker = \Faker\Factory::create('id_ID');

    echo $faker->unique()->bothify('??###')."<br>";
    echo $faker->randomElement($daftar_matakuliah)."<br>";
    echo $faker->numberBetween(1,4)."<br>";
    echo $faker->name()."<br>";
});
