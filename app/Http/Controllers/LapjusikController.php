<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use ZipArchive;

class LapjusikController extends Controller
{
    public function lapjusik()
    {
        $data = Laporan::paginate(6);

        return view('lapjusik', compact('data'));
    }

    public function download($id)
    {
        $laporan = Laporan::find($id);
        if (!$laporan) {
            return abort(404, 'Data not found');
        }

        $files = [
            'storage/' . $laporan->img_awal,
            'storage/' . $laporan->img_saat_ini,
            'storage/' . $laporan->img_bukti,
        ];

        $zip = new ZipArchive;
        $zipFileName = 'images_' . $id . '.zip';
        $zipFilePath = storage_path($zipFileName);

        if ($zip->open($zipFilePath, ZipArchive::CREATE) === TRUE) {
            foreach ($files as $file) {
                if (file_exists($file)) {
                    $zip->addFile($file, basename($file));
                }
            }
            $zip->close();
        } else {
            return abort(500, 'Failed to create ZIP file');
        }


        return response()->download($zipFilePath)->deleteFileAfterSend(true);
    }
}
