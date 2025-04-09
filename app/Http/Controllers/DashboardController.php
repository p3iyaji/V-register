<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Visitor;

class DashboardController extends Controller
{

    public function index()
    {
        $totalVisitors = Visitor::count();
        $totalTodayVisitors = Visitor::where('created_at', '>=', today())->orWhere('expected_date', '>=', today())->count();
        $totalPreRegistered = Visitor::where('type', 'pre_registered')->count();
        $totalWalkIn = Visitor::where('type', 'walk-in')->count();
        $totalTodayPreRegistered = Visitor::where('type', 'pre_registered')->where('created_at', '>=', today())->count();
        $totalCheckedIn = Visitor::where('check_in', '!=', null)->where('check_in', '>=', today())->count();
        $totalCheckedOut = Visitor::where('check_out', '!=', null)->where('check_out', '>=', today())->count();

        return view('dashboard/index', compact('totalVisitors', 'totalTodayVisitors', 'totalPreRegistered', 'totalWalkIn', 'totalTodayPreRegistered', 'totalCheckedIn', 'totalCheckedOut'));
    }

    public function getVisitorStats()
    {
        // Initialize arrays with 12 months (0-11)
        $preRegistered = array_fill(0, 12, 0);
        $walkIn = array_fill(0, 12, 0);
    
        // Get pre-registered visitors by month
        $preRegisteredData = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->where('type', 'pre_registered')
            ->groupBy('month')
            ->get();
    
        // Get walk-in visitors by month
        $walkInData = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->where('type', 'walk-in')
            ->groupBy('month')
            ->get();
    
        // Fill the pre-registered array
        foreach ($preRegisteredData as $data) {
            $monthIndex = $data->month - 1; // Convert to 0-based index
            $preRegistered[$monthIndex] = $data->count;
        }
    
        // Fill the walk-in array
        foreach ($walkInData as $data) {
            $monthIndex = $data->month - 1; // Convert to 0-based index
            $walkIn[$monthIndex] = $data->count;
        }
    
        return response()->json([
            'preRegistered' => $preRegistered,
            'walkIn' => $walkIn,
        ]);
    }   

    
}
