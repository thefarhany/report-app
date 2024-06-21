<?php

namespace App\Charts;

use App\Models\Laporan;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\LineChart;
use Carbon\Carbon;

class LapjusikChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $lapjusik = Laporan::selectRaw('MONTH(updated_at) as month, AVG(lapju_pelaksanaan) as avg_pelaksanaan')
            ->groupByRaw('MONTH(updated_at)')
            ->orderByRaw('MONTH(updated_at)')
            ->get();

        $data = [];
        $label = [];

        for ($i = 1; $i <= 12; $i++) {
            $dataPoint = $lapjusik->firstWhere('month', $i);
            $data[] = $dataPoint ? round($dataPoint->avg_pelaksanaan, 2) : 0;
            $label[] = Carbon::create()->month($i)->format('F');
        }

        return (new LarapexChart)->lineChart()
            ->setTitle('Data Lapjusik')
            ->setSubtitle(date('Y'))
            ->addData('Lapju', $data)
            ->setXAxis($label);
    }
}
