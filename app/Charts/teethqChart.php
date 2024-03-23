<?php

namespace App\Charts;

use App\Models\jawaban_sikaps;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class teethqChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $user_id = auth()->id();
        $user = User::find($user_id);

        $skor_sikap = jawaban_sikaps::where('user_id', $user->id)->sum('jawaban');
        $jumlah_jawaban_id = jawaban_sikaps::where('user_id', $user->id)->count('jawaban');
        $skor_sikap_total = ($jumlah_jawaban_id != 0) ? ($skor_sikap / $jumlah_jawaban_id * 100 / 4) : 0;

        $skor_tindakan = $user->total_jawaban_tindakans;
        $skor_pengetahuan = $user->total_jawaban_pengetahuan;

        $data = [
            $skor_sikap_total,
            $skor_pengetahuan,
            $skor_tindakan
        ];

        return $this->chart->pieChart()
            ->setWidth(400)
            ->setTitle('Statistics')
            ->setSubtitle('Teeth Q')
            ->addData($data)
            ->setLabels(['Sikap', 'Pengetahuan', 'Tindakan']);
    }
}