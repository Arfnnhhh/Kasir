<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalUsers = User::count();

        $startOfMonth = Carbon::now()->startOfMonth();
        $endOfMonth = Carbon::now()->endOfMonth();

        $dailyRevenue = Sale::whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->selectRaw("DATE(created_at) as date, SUM(total_amount) as total")
            ->groupByRaw("DATE(created_at)")
            ->orderByRaw("DATE(created_at)")
            ->pluck('total', 'date');

        return view('home', compact(
            'totalProducts',
            'totalUsers',
            'dailyRevenue'
        ));
    }

}
