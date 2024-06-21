<?php

namespace App\Http\Controllers;

use App\Models\Kotama;
use Illuminate\Http\Request;

class KesatuanController extends Controller
{
    public function kesatuan()
    {
        $data = Kotama::paginate(7);

        return view('kesatuan', compact('data'));
    }

    public function store(Request $request)
    {
        $data['kotama'] = $request->kotama;
        $data['kesatuan'] = $request->kesatuan;

        Kotama::create($data);
        return redirect()->route('kesatuan.index');
    }

    public function edit(Request $request, $id)
    {
        $data = Kotama::find($id);

        return view('kesatuan.index', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data['kotama'] = $request->kotama;
        $data['kesatuan'] = $request->kesatuan;

        Kotama::whereId($id)->update($data);

        return redirect()->route('kesatuan.index');
    }

    public function delete(Request $request, $id)
    {
        $data = Kotama::find($id);

        if ($data) {
            $data->delete();
        }

        return redirect()->route('kesatuan.index');
    }
}
