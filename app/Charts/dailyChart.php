<?php

namespace App\Charts;

use App\Models\Daily_cores;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class dailyChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $user_id = auth()->id();
        $user = User::find($user_id);

        $dataDaily = Daily_cores::get();

        $data = [
            $dataDaily->where('user_id', $user_id)->pluck('tanggal_input'),
        ];

        return $this->chart->barChart()
            ->setTitle('Statistics')
            ->setSubtitle('Daily Activity')
            ->addData('Quiz', [6, 9, 3, 4, 10, 8])
            ->addData('14 Days', $data)
            ->setXAxis(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
    }
}
