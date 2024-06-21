<?php

namespace App\Http\Controllers;

use App\Charts\LapjusikChart;
use App\Models\Laporan;
use Illuminate\Http\Request;

class DenzibangController extends Controller
{
    public function index(LapjusikChart $lapjusikChart)
    {
        return view('denzibang.index', ['lapjusikChart' => $lapjusikChart->build()]);
    }

    public function lapjusik()
    {
        $data = Laporan::paginate(5);

        return view('denzibang.lapjusik', compact('data'));
    }

    public function edit(Request $request, $id)
    {
        $data = Laporan::find($id);

        return view('denzibang.lapjusik', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data['lapju_lalu'] = $request->lapju_lalu;
        $data['lapju_rencana'] = $request->lapju_rencana;
        $data['lapju_pelaksanaan'] = $request->lapju_pelaksanaan;

        Laporan::whereId($id)->update($data);

        return redirect()->route('denzibang.lapjusik');
    }

    public function gambar(Request $request, $id)
    {
        $data = [];

        if ($request->hasFile('img_awal')) {
            $imageAwal = $request->file('img_awal');
            $fileAwal = date('Y-m-d') . '-' . $imageAwal->getClientOriginalName();
            $pathAwal = $imageAwal->storeAs('images', $fileAwal, 'public');
            $data['img_awal'] = $pathAwal;
        }

        if ($request->hasFile('img_saat_ini')) {
            $imageSaatIni = $request->file('img_saat_ini');
            $fileSaatIni = date('Y-m-d') . '-' . $imageSaatIni->getClientOriginalName();
            $pathSaatIni = $imageSaatIni->storeAs('images', $fileSaatIni, 'public');
            $data['img_saat_ini'] = $pathSaatIni;
        }

        if ($request->hasFile('img_detail')) {
            $imageBukti = $request->file('img_detail');
            $fileBukti = date('Y-m-d') . '-' . $imageBukti->getClientOriginalName();
            $pathBukti = $imageBukti->storeAs('images', $fileBukti, 'public');
            $data['img_bukti'] = $pathBukti;
        }

        Laporan::whereId($id)->update($data);

        return redirect()->route('denzibang.lapjusik');
    }
}
