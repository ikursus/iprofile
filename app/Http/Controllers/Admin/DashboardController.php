<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Program;
use App\Models\UserProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index()
    {
        // Get statistics for dashboard
        $totalUsers = User::count();
        $activeUsers = User::where('status', 'aktif')->count();
        $totalPrograms = Program::count();
        $totalUserPrograms = UserProgram::count();
        
        // Get recent users (last 5)
        $recentUsers = User::latest()->take(5)->get();
        
        // Get recent programs (last 5)
        $recentPrograms = Program::latest()->take(5)->get();
        
        // Get user status distribution
        $userStatusStats = User::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();
        
        // Get monthly user registration stats (last 6 months)
        $monthlyStats = User::select(
            DB::raw('YEAR(created_at) as year'),
            DB::raw('MONTH(created_at) as month'),
            DB::raw('COUNT(*) as total')
        )
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('year', 'month')
        ->orderBy('year', 'desc')
        ->orderBy('month', 'desc')
        ->get();
        
        return view('admin.dashboard', compact(
            'totalUsers',
            'activeUsers', 
            'totalPrograms',
            'totalUserPrograms',
            'recentUsers',
            'recentPrograms',
            'userStatusStats',
            'monthlyStats'
        ));
    }
    
    /**
     * Get dashboard data for AJAX requests
     */
    public function getData(Request $request)
    {
        $data = [
            'totalUsers' => User::count(),
            'activeUsers' => User::where('status', 'aktif')->count(),
            'totalPrograms' => Program::count(),
            'totalUserPrograms' => UserProgram::count(),
        ];
        
        return response()->json($data);
    }
}