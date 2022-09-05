<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('admin.index', $data);
    }

    public function room() {
        return view('admin.room', [
            'title' => 'Room',
            'js' => asset('js/dashboard/room.js')
        ]);
    }

    public function quail() {
        return view('admin.quail', [
            'title' => 'Quail',
            'js' => asset('js/dashboard/quail.js')
        ]);
    }
}
