<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Tables Import //
use App\Models\account_admin;
use App\Models\beasiswa;
use App\Models\instansi_beasiswa;
use App\Models\lomba;
use App\Models\instansi_lomba;
use App\Models\status;
use App\Models\tingkatan;
use App\Models\prestasi;
use App\Models\mahasiswa_prestasi;
use App\Models\prodi;
use App\Models\jurusan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seeder Account Admin //
        account_admin::create([
            'username' => 'Kageyama',
            'password' => 'ujicoba',
        ]);
        // Seeder Status //
        status::create([
            'status' => 'Aktif',
        ]);
        status::create([
            'status' => 'Nonaktif',
        ]);

        // Seeder Tingkatan //
        tingkatan::create([
            'tingkatan' => 'Lokal',
        ]);
        tingkatan::create([
            'tingkatan' => 'Internasional',
        ]);

        // Seeder Instansi Beasiswa //
        instansi_beasiswa::create([
            'nama_instansi_beasiswa' => 'PT. Anyamonetes',
            'no_telephone' => '089783547859',
            'email' => 'anyamonetesbuisness@gmail.com',
            'alamat' => 'jln. lectera, jakarta',
            'account_admin_id' => 1,
        ]);

        // Seeder Beasiswa //
        beasiswa::create([
            'nama_beasiswa' => 'Beasiswa Japan',
            'instansi_beasiswa_id' => 1,
            'link_pendaftaran' => 'http://www.registerGratisBeasiswa.com',
            'data_foto' => 'beasiswaDataImg\n0AK1Zd4lbliVNGjDlZNkJNI6ducSFeGs9f7H40Q.jpg',
            'persyaratan' => 'Minimal Ipk di atas 3.5',
            'tanggal_penutupan' => '2023-12-09',
            'tingkatan_id' => 1,
            'status_id' => 1,   
            'account_admin_id' => 1,
        ]);

        instansi_lomba::create([
            'nama_instansi_lomba' => 'PT. Animon',
             'no_telephone' => '0987664536475',
            'email' => 'Animonbuisness@gmail.com',
            'alamat' => 'jln. Leraka, Bandung',
            'account_admin_id' => 1,
        ]);

        lomba::create([
            'nama_lomba' => 'Beasiswa Japan',
            'instansi_lomba_id' => 1,
            'link_pendaftaran' => 'http://www.registerGratisLomba.com',
            'data_foto' => 'lombaDataImg\in4EeJf4B1264PkGSbmwzP9xWy8SAtkqYlPzBP8x.jpg',
            'persyaratan' => 'Minimal Ipk di atas 3.5',
            'tanggal_penutupan' => '2023-12-10',
            'tingkatan_id' => 1,
            'status_id' => 1,  
            'account_admin_id' => 1,
        ]);
        
        jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
        ]);

        prodi::create([
            'nama_prodi' => 'Teknik Rekayasa Perangkat Lunak',
            'jurusan_id' => 1,
        ]);
        prestasi::create([
            'nama_perlombaan_prestasi' => 'Lomba Memancig Nasional',
            'nama_prestasi' => 'Juara 2 International',
            'tanggal_perlombaan' => '2023-12-09',
            'foto_bukti_prestasi' => 'buktiPrestasi/wUThNQJkkA251SZC4g681ZOPTx8KxHfS2x6v53xc.jpg',
            'tingkatan_id' => 2,
        ]);

        // Seeder Prestasi //
        mahasiswa_prestasi::create([
            'nim' => '362258302143',
            'nama_mahasiswa' => 'Rahid Tadeo Anugrahaning Gusti',
            'foto_mahasiswa' => 'fotoMahasiswa/wUThNQJkkA251SZC4g681ZOPTx8KxHfS2x6v53xc.jpg',
            'prestasi_id' => 1,
            'prodi_id' => 1,
            'account_admin_id' => 1,
        ]);
    }
}
