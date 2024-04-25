<?php

namespace App\Http\Controllers;

use App\Models\PenjualanModel;
use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\select;

class PenjualanController extends Controller
{
    // Menampilkan halaman awal penjualan
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list' => ['Home', 'Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar penjualan yang terdaftar dalam sistem'
        ];

        $activeMenu = 'penjualan'; // set menu yang sedang aktif

        $user = UserModel::all(); // ambil data user untuk filter user

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    // Ambil data penjualan dalam bentuk json untuk datatables
    public function list(Request $request)
    {
        $penjualans = PenjualanModel::select('penjualan_id', 'penjualan_kode', 'penjualan_tanggal', 'user_id', 'pembeli')
                        ->with('user');

        // Filter data penjualan berdasarkan user_id
        if ($request->user_id) {
            $penjualans->where('user_id', $request->user_id);
        }

        return DataTables::of($penjualans)
            ->addIndexColumn() // menambahkan kolom index / no urut (default nama kolom: DT_RowIndex)
            ->addColumn('aksi', function ($penjualan) { // menambahkan kolom aksi
            $btn = '<a href="'.url('/penjualan/' . $penjualan->penjualan_id).'" class="btn btn-info btn-sm">Detail</a> ';
            // $btn .= '<a href="'.url('/penjualan/' . $penjualan->penjualan_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
            $btn .= '<form class="d-inline-block" method="POST" action="'.url('/penjualan/'.$penjualan->penjualan_id).'">'
                . csrf_field() . method_field('DELETE') .
                '<button type="submit" class="btn btn-danger btn-sm"
                onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
            return $btn;
        })
        ->rawColumns(['aksi']) // memberitahu bahwa kolom aksi adalah html
        ->make(true);
    }

    // menampilkan halaman form tambah penjualan
    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Transaksi',
            'list' => ['Home', 'Stok', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah transaksi baru'
        ];

        $user = UserModel::all(); // ambil data user untuk ditampilkan di form
        $barang = BarangModel::with('stok')->get();
        $activeMenu = 'penjualan'; // set menu yang sedang aktif

        // mengenerate penjualan_kode
        $counter = (PenjualanModel::selectRaw("CAST(RIGHT(penjualan_kode, 3) AS UNSIGNED) AS counter")->orderBy('penjualan_id', 'desc')->value('counter')) + 1;
        $penjualan_kode = 'PJL' . sprintf("%03d", $counter);
        $total = 0;

        return view('penjualan.create', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'user' => $user,
            'barang' => $barang,
            'penjualan_kode' => $penjualan_kode,
            'activeMenu' => $activeMenu,
            'date'=> date("Y-m-d"),
            'total'=> $total
        ]);
    }

    // Menyimpan data penjualan baru
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'penjualan_kode' => 'required|string|unique:t_penjualan,penjualan_kode',
            'pembeli' => 'required|string|max:100',
            'barang_id.*' => 'required|integer',
            'jumlah.*' => 'required|integer',
            'harga.*' => 'required|integer',

        ]);

        $total = 0;

        foreach ($request->barang_id as $key => $barang_id) {
            // Cek stok yang tersedia
            $stok = StokModel::where('barang_id', $barang_id)->value('stok_jumlah');
            $nama_barang = BarangModel::where('barang_id', $barang_id)->value('barang_nama');
            $requestedQuantity = $request->jumlah[$key];

            if ($stok < $requestedQuantity) {

                // Jika jumlah yang diminta melebihi stok yang tersedia, kembalikan pesan kesalahan
                return redirect()->back()->withInput()->withErrors(['jumlah.' . $key => 'Jumlah Melebihi Stok yang Tersedia. Stok "' .$nama_barang.'" Saat Ini: ' . $stok]);
            }

            $total += $request->jumlah[$key] * $request->harga[$key];
        }

        $penjualan = PenjualanModel::create([
            'user_id' => $request->user_id,
            'penjualan_kode' => $request->penjualan_kode,
            'pembeli' => $request->pembeli,
            'penjualan_tanggal' => now(),
        ]);



        // tabel t_penjualan_detail
        $barang_ids = $request->barang_id;
        $jumlahs = $request->jumlah;
        $hargas = $request->harga;

        foreach ($barang_ids as $key => $barang_id) {
            PenjualanDetailModel::create([
                'penjualan_id' => $penjualan->penjualan_id,
                'barang_id' => $barang_id,
                'harga' => $hargas[$key],
                'jumlah' => $jumlahs[$key],
            ]);

            $stok = (StokModel::where('barang_id', $barang_id)->value('stok_jumlah')) - $jumlahs[$key];
            $date = date('Y-m-d');
            StokModel::where('barang_id', $barang_id)->update(['stok_jumlah' => $stok, 'stok_tanggal' => $date, 'user_id' => $request->user_id]);
        }

        return redirect('/penjualan')->with('success', 'Data stok berhasil disimpan');
    }

    // Menampilkan detail penjualan
    public function show(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        $penjualan_detail = PenjualanDetailModel::where('penjualan_id', $id)->get();

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list' => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail penjualan'
        ];

        $activeMenu = 'penjualan'; // set menu yang sedang aktif

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'penjualan_detail' => $penjualan_detail, 'activeMenu' => $activeMenu]);
    }

    // Menghapus data penjualan
    public function destroy(string $id)
    {
        $check = PenjualanModel::find($id);
        if (!$check) {      // untuk mengecek apakah data penjualan dengan id yang dimaksud ada atau tidak
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try{
            PenjualanModel::destroy($id);    // Hapus data penjualan

            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){

            // jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
