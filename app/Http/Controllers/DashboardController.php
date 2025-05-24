<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $role = auth()->user()->role;
        return match ($role) {
            'pendaftaran' => view('home'),
            'dokter' => view('home'),
            'perawat' => view('home'),
            'apoteker' => view('home'),
            default => abort(403)
        };
    }

}
