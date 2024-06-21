<?php

namespace App\Http\Controllers;

use App\Charts\LapjusikChart;
use App\Exports\ExportLaporan;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MinadaController extends Controller
{
    public function index(LapjusikChart $lapjusikChart)
    {
        return view('minada.index', ['lapjusikChart' => $lapjusikChart->build()]);
    }

    public function export(Request $request)
    {
        $query = Laporan::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        return view('minada.export', compact('data'));
    }

    public function print(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        return Excel::download(new ExportLaporan($startDate, $endDate), 'report.xlsx');
    }
}
