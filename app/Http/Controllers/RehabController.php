<?php

namespace App\Http\Controllers;

use App\Charts\LapjusikChart;
use App\Exports\ExportLaporan;
use App\Models\Kotama;
use App\Models\Laporan;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RehabController extends Controller
{
    public function index(LapjusikChart $lapjusikChart)
    {
        $data = Laporan::all();

        return view('siwas', [compact('data'), 'lapjusikChart' => $lapjusikChart->build()]);
    }

    public function rehab()
    {
        $data = Laporan::paginate(5);
        $kotama = Kotama::get();

        return view('rehab', compact('data', 'kotama'));
    }

    public function store(Request $request)
    {
        $data['no_tgl_spmk'] = $request->no_tgl_spmk;
        $data['kotama'] = $request->kotama;
        $data['nama_kegiatan'] = $request->nama_kegiatan;
        $data['nilai_kontrak'] = $request->nilai_kontrak;
        $data['rekanan'] = $request->rekanan;
        $data['jumlah_kk'] = $request->jumlah_kk;
        $data['daya_serap'] = $request->daya_serap;
        $data['tgl_mulai'] = $request->tgl_mulai;
        $data['tgl_selesai'] = $request->tgl_selesai;

        Laporan::create($data);

        return redirect()->route('rehab.index');
    }

    public function edit(Request $request, $id)
    {
        $data = Laporan::find($id);

        return view('rehab.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data['nama_kegiatan'] = $request->nama_kegiatan;
        $data['nilai_kontrak'] = $request->nilai_kontrak;
        $data['jumlah_kk'] = $request->jumlah_kk;
        $data['daya_serap'] = $request->daya_serap;
        $data['lapju_pelaksanaan'] = $request->lapju_pelaksanaan;

        Laporan::whereId($id)->update($data);

        return redirect()->route('rehab.index');
    }

    public function delete(Request $request, $id)
    {
        $data = Laporan::find($id);

        if ($data) {
            $data->delete();
        }
        return redirect()->route('rehab.index');
    }

    public function cetak(Request $request)
    {
        $query = Laporan::query();

        if ($request->has('start_date') && $request->has('end_date')) {
            $startDate = $request->start_date;
            $endDate = $request->end_date;
            $query->whereBetween('updated_at', [$startDate, $endDate]);
        }

        $data = $query->get();

        return view('cetak', compact('data'));
    }

    public function print(Request $request)
    {
        $startDate = $request->query('start_date');
        $endDate = $request->query('end_date');

        return Excel::download(new ExportLaporan($startDate, $endDate), 'report.xlsx');
    }

    public function show(Request $request, $id)
    {
        $data = Laporan::find($id);

        return view('rehab.index', compact('data'));
    }

    public function export(Request $request, $id)
    {
        return Laporan::query()->where('id', $id)->downloadExcel('report.xlsx');
    }
}
