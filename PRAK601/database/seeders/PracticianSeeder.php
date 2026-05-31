<?php

namespace Database\Seeders;

use App\Models\Practicians;
use App\Models\Experiences;
use Illuminate\Database\Seeder;

class PracticianSeeder extends Seeder
{
    public function run(): void
    {
        $practician = Practicians::create([
            'id'            => 1,
            'name'          => 'Indra Suryadilaga',
            'nim'           => '2410817310014',
            'study_program' => 'Teknologi Informasi',
            'hobby'         => 'Olahraga',
            'skills'        => ['Laravel', 'React', 'Tailwind CSS', 'FastAPI', 'Godot'],
            'avatar'        => 'indra-suryadilaga.jpeg',
            'email'         => 'indrasryd@gmail.com',
            'github_url'    => 'https://github.com/IndraSuryadilaga',
            'bio'           => 'Mahasiswa Teknologi Informasi yang berfokus pada full-stack web development dan solo game development.',
        ]);

        $experiences = [
            [
                'practician_id' => 1,
                'title'         => 'Pengurus Himpunan Mahasiswa Teknologi Informasi 2025',
                'role'          => 'Anggota Div 5',
                'image'         => 'HMTI-2025.png',
                'description'   => 'Aktif sebagai pengurus HMTI periode 2025. Terlibat langsung dalam merancang dan mengeksekusi berbagai program kerja yang seru-seru, mulai dari kepanitiaan Malam Keakraban (Makrab), workshop public speaking, hingga Discover IT ke SMA. Pengalaman berharga yang melatih teamwork, manajemen waktu, dan problem-solving di dunia nyata.',
                'start_date'    => '2025-01-01',
                'end_date'      => '2025-12-31',
            ],
            [
                'practician_id' => 1,
                'title'         => 'Pagelaran Olahraga Teknik Cabang Basket 2024 & 2025',
                'role'          => 'Pemain Basket',
                'image'         => 'Portek-Basket.png',
                'description'   => 'Terpilih mewakili program studi Teknologi Informasi dalam ajang kompetisi bergengsi PORTEK cabang bola basket selama dua tahun berturut-turut di Banjarbaru. Pengalaman kompetitif yang luar biasa untuk menyalurkan hobi, melatih ketangkasan fisik, serta membangun komunikasi, sportivitas, dan solidaritas tim yang solid di bawah tekanan pertandingan.',
                'start_date'    => '2024-10-20',
                'end_date'      => '2025-10-13',
            ],
            [
                'practician_id' => 1,
                'title'         => 'Aksi Damai & Solidaritas Mahasiswa Mengawal Akreditasi',
                'role'          => 'Peserta Aksi',
                'image'         => 'aksi-damai.png',
                'description'   => 'Turut serta dalam aksi demonstrasi damai untuk menyampaikan aspirasi secara langsung kepada Rektor. Aksi solidaritas ini merupakan bentuk pengawalan dan kepedulian mahasiswa atas turunnya akreditasi universitas akibat polemik mafia jurnal di kalangan sivitas akademika. Momen ini menumbuhkan keberanian bersuara, pemikiran kritis terhadap isu kelembagaan, serta memperkuat ikatan pergerakan mahasiswa.',
                'start_date'    => '2024-09-27',
                'end_date'      => '2024-09-27',
            ],
            [
                'practician_id' => 1,
                'title'         => 'Malam Inagurasi PKKMB',
                'role'          => 'Anggota Kelompok PKKMB',
                'image'         => 'malam-inagurasi.png',
                'description'   => 'Berpartisipasi dalam Malam Inagurasi yang merupakan perayaan puncak dari rangkaian kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru. Acara ini dimeriahkan dengan berbagai pertunjukan seni, mulai dari koreografi hingga nyanyian. Menjadi pengalaman yang sangat berkesan karena dapat menikmati keseruan dan memeriahkan acara bersama teman-teman satu kelompok PKKMB, sekaligus membangun kekompakan di awal masa perkuliahan.',
                'start_date'    => '2024-08-26',
                'end_date'      => '2024-08-26',
            ],
        ];

        foreach ($experiences as $experience) {
            $practician->experiences()->create($experience);
        }
    }
}
