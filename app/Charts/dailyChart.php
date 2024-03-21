<?php

namespace App\Charts;

use App\Models\Daily_cores;
use App\Models\User;
use App\Models\User_quiz_keterampilans;
use App\Models\User_quiz_pengetahuans;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

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

        $dataDaily = Daily_cores::where('user_id', $user_id)->pluck('tanggal_daily')->map(function ($item) {
            return (string)$item;
        })->toArray();

        $dataDailyDisplay = Daily_cores::where('user_id', $user_id)->pluck('tanggal_daily')->map(function ($item) {
            // Ubah item menjadi objek Carbon
            $carbonDate = Carbon::parse($item);
            // Format tanggal menjadi 'Hari-Tanggal'
            return $carbonDate->translatedFormat('d');
        })->toArray();

        // $data14days = Daily_cores::where('user_id', $user_id)->pluck('tanggal_input', $dataDaily)->toArray();

        $dataQuizKeterampilan = User_quiz_keterampilans::whereIn('tanggal_quiz_keterampilan', $dataDaily)
        ->pluck('nilai_quiz_keterampilan')
        ->toArray();

        $dataQuizPengetahuan = User_quiz_pengetahuans::whereIn('tanggal_quiz_pengetahuan', $dataDaily)
        ->pluck('nilai_quiz_pengetahuan')
        ->toArray();
        
        return $this->chart->barChart()
            // ->setWidth(700)
            ->setTitle('Statistics')
            ->setSubtitle('Daily Activity')
        ->addData(
            'Quiz Keterampilan',
            $dataQuizKeterampilan
        )
            ->addData(
                'Quiz Pengetahuan',
                $dataQuizPengetahuan
            )
            ->addData(
                '14 Days',
                [
                    6, 9, 30, 4, 10, 8
                ]
            )
            ->setXAxis($dataDailyDisplay);
    }
}