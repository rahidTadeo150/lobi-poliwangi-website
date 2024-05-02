<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\beasiswa;
use App\Models\lomba;
use App\Models\mahasiswa_prestasi;

class dataKeseluruhan
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $tahunNow = date('Y');
        $totalBeasiswa = beasiswa::whereYear('created_at', $tahunNow)->count();
        $totalLomba = lomba::whereYear('created_at', $tahunNow)->count();
        $totalPrestasi = mahasiswa_prestasi::whereYear('created_at', $tahunNow)->count();
        return $this->chart->pieChart()
            ->setTitle('Data Keseluruhan Lobi Polwangi')
            ->setSubtitle('Tahun ' . $tahunNow . '.')
            ->addData([$totalBeasiswa, $totalLomba, $totalPrestasi])
            ->setHeight(400)
            ->setWidth(430)
            ->setFontFamily('Poppins')
            ->setLabels(['Beasiswa', 'Lomba', 'Prestasi Mahasiswa']);
    }
}
