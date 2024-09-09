<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class LetterController extends Controller
{
    public function letterIn()
    {
        $data = [
            'title' => 'Surat Masuk',
            'menu' => 'Surat',
            'sub_menu' => 'Masuk',
            'letters' => Letter::where('tipe_surat', 'masuk')->get()
        ];

        return view('back.pages.letter.in', $data);
    }

    public function letterInCreate()
    {
        $data = [
            'title' => 'Tambah Surat Masuk',
            'menu' => 'Surat',
            'sub_menu' => 'Masuk',
        ];

        return view('back.pages.letter.create', $data);
    }

    public function letterInStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'Nullable',
            'pengirim' => 'required',
            'penerima' => 'required',
            'tanggal_surat' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'keterangan' => 'Nullable',
        ], [
            'required' => ':attribute harus diisi',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file pdf, doc, docx'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $letter = new Letter();
        $letter->nomor_surat = $request->nomor_surat;
        $letter->perihal = $request->perihal;
        $letter->lampiran = $request->lampiran;
        $letter->pengirim = $request->pengirim;
        $letter->penerima = $request->penerima;
        $letter->tanggal_surat = $request->tanggal_surat;
        $letter->tipe_surat = 'masuk';
        $letter->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/letter', $file_name);
            $letter->file = 'letter/' . $file_name;
        }

        $letter->save();

        Alert::success('Success', 'Surat Masuk berhasil ditambahkan');
        return redirect()->route('admin.letter.in');

    }

    public function letterInEdit($id)
    {
        $data = [
            'title' => 'Edit Surat Masuk',
            'menu' => 'Surat',
            'sub_menu' => 'Masuk',
            'letter' => Letter::find($id)
        ];

        return view('back.pages.letter.edit', $data);
    }

    public function letterInUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'Nullable',
            'pengirim' => 'required',
            'penerima' => 'required',
            'tanggal_surat' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'keterangan' => 'Nullable',
        ], [
            'required' => ':attribute harus diisi',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file pdf, doc, docx'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $letter = Letter::find($id);
        $letter->nomor_surat = $request->nomor_surat;
        $letter->perihal = $request->perihal;
        $letter->lampiran = $request->lampiran;
        $letter->pengirim = $request->pengirim;
        $letter->penerima = $request->penerima;
        $letter->tanggal_surat = $request->tanggal_surat;
        $letter->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/letter', $file_name);
            $letter->file = 'letter/' . $file_name;
        }

        $letter->save();

        Alert::success('Success', 'Surat Masuk berhasil diubah');
        return redirect()->route('admin.letter.in');
    }

    public function letterInDelete($id)
    {
        $letter = Letter::find($id);
        $letter->delete();
        if ($letter->file) {
            Storage::delete('public/' . $letter->file);
        }

        Alert::success('Success', 'Surat Masuk berhasil dihapus');
        return redirect()->route('admin.letter.in');
    }

    public function letterOut()
    {
        $data = [
            'title' => 'Surat Keluar',
            'menu' => 'Surat',
            'sub_menu' => 'Keluar',
            'letters' => Letter::where('tipe_surat', 'keluar')->get()
        ];

        return view('back.pages.letter.out', $data);
    }

    public function letterOutCreate()
    {
        $data = [
            'title' => 'Tambah Surat Keluar',
            'menu' => 'Surat',
            'sub_menu' => 'Keluar',
        ];

        return view('back.pages.letter.create', $data);
    }

    public function letterOutStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'Nullable',
            'pengirim' => 'required',
            'penerima' => 'required',
            'tanggal_surat' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'keterangan' => 'Nullable',
        ], [
            'required' => ':attribute harus diisi',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file pdf, doc, docx'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $letter = new Letter();
        $letter->nomor_surat = $request->nomor_surat;
        $letter->perihal = $request->perihal;
        $letter->lampiran = $request->lampiran;
        $letter->pengirim = $request->pengirim;
        $letter->penerima = $request->penerima;
        $letter->tanggal_surat = $request->tanggal_surat;
        $letter->tipe_surat = 'keluar';
        $letter->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/letter', $file_name);
            $letter->file = 'letter/' . $file_name;
        }

        $letter->save();

        Alert::success('Success', 'Surat Keluar berhasil ditambahkan');
        return redirect()->route('admin.letter.out');
    }

    public function letterOutEdit($id)
    {
        $data = [
            'title' => 'Edit Surat Keluar',
            'menu' => 'Surat',
            'sub_menu' => 'Keluar',
            'letter' => Letter::find($id)
        ];

        return view('back.pages.letter.edit', $data);
    }

    public function letterOutUpdate(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_surat' => 'required',
            'perihal' => 'required',
            'lampiran' => 'Nullable',
            'pengirim' => 'required',
            'penerima' => 'required',
            'tanggal_surat' => 'required',
            'file' => 'nullable|file|mimes:pdf,doc,docx',
            'keterangan' => 'Nullable',
        ], [
            'required' => ':attribute harus diisi',
            'file' => ':attribute harus berupa file',
            'mimes' => ':attribute harus berupa file pdf, doc, docx'
        ]);

        if ($validator->fails()) {
            Alert::error('Error', $validator->errors()->all());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $letter = Letter::find($id);
        $letter->nomor_surat = $request->nomor_surat;
        $letter->perihal = $request->perihal;
        $letter->lampiran = $request->lampiran;
        $letter->pengirim = $request->pengirim;
        $letter->penerima = $request->penerima;
        $letter->tanggal_surat = $request->tanggal_surat;
        $letter->keterangan = $request->keterangan;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/letter', $file_name);
            $letter->file = 'letter/' . $file_name;
        }

        $letter->save();

        Alert::success('Success', 'Surat Keluar berhasil diubah');
        return redirect()->route('admin.letter.out');
    }

    public function letterOutDelete($id)
    {
        $letter = Letter::find($id);
        $letter->delete();
        if ($letter->file) {
            Storage::delete('public/' . $letter->file);
        }

        Alert::success('Success', 'Surat Keluar berhasil dihapus');
        return redirect()->route('admin.letter.out');
    }
}
