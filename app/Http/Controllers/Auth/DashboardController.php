<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $listings = $request->user()->role !== 'suspended' ?
            $request->user()->listings()->latest()->paginate(2) : null;
        return inertia(
            'Dashboard',
            [
                'listings' => $listings,
                'status' => session('status')
            ]
        );
    }
}
