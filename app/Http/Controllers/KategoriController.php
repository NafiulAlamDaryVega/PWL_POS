<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class KategoriController extends Controller
{
    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kategori_kode' => 'bail|required|unique:m_kategori|max:255',
            'kategori_nama' => 'bail|required|unique:m_kategori',
        ]);

        return redirect('/kategori');
    }
}
