<?php

namespace App\Livewire\Admin;

use App\Models\Booking;
use App\Models\PackagePurchase;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AdminDashboardComponent extends Component
{
    #[Layout('layouts.admin')]
    public function render()
    {

        $users = User::where('utype', 'USR')->count();
        $providers = User::where('utype', 'VEN')->count();
        $services = Service::count();
        $subscripitions = PackagePurchase::count();
        $top_services = Service::where('featured', 'top')->inRandomOrder()->take(5)->get();
        $top_providers = User::where('utype', 'VEN')->inRandomOrder()->take(5)->get();
        $completedBookings = Booking::get();
        $monthlyData = $completedBookings->groupBy(function ($booking) {
            return $booking->created_at->format('F');
        })->map(function ($bookings) {
            return $bookings->sum('total');
        });
        $monthly = $completedBookings->groupBy(function ($booking1) {
            return $booking1->created_at->format('F');
        })->map(function ($bookings1) {
            return $bookings1->count();

        });
        $profit = $completedBookings->groupBy(function ($booking1) {
            return $booking1->created_at->format('F');
        })->map(function ($bookings1) {
            return $bookings1->where('bookingstatus', 'completed')->sum('total');

        });
        $bookingCounts = Booking::groupBy('bookingstatus')
            ->select('bookingstatus', DB::raw('count(*) as count'))
            ->get();

        foreach ($bookingCounts as $bookingCount) {
            $statusCounts[$bookingCount->bookingstatus] = $bookingCount->count;
        }
        $recent_bookings = Booking::orderBy('id','desc')->take(10)->get();
        //dd($recent_bookings);
        return view('livewire.admin.admin-dashboard-component', [
            'users' => $users, 'services' => $services, 'providers' => $providers,
            'subscriptions' => $subscripitions, 'top_services' => $top_services, 'top_providers' => $top_providers,
            'monthlyData' => $monthlyData, 'monthly' => $monthly, 'profit' => $profit,'statusCounts'=>$statusCounts,'recent_bookings'=>$recent_bookings]);
    }
}
