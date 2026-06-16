<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Cart;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(Request $request)
    {
        $query = Driver::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('car_model', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $drivers = $query->orderBy('rating', 'desc')->get();

        return view('drivers.index', compact('drivers'));
    }

    public function bookRide(Request $request, Driver $driver)
    {
        $request->validate([
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'required|string|max:255',
            'ride_date' => 'required|date|after_or_equal:today',
            'ride_time' => 'required',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً لطلب تاكسي.');
        }

        if ($driver->status !== 'available') {
            return back()->with('error', 'هذا السائق غير متاح حالياً. يرجى اختيار سائق آخر.');
        }

        // Calculate a mock price based on characters or random distance for realism (e.g. $10 - $25)
        $price = rand(10, 25);

        // Add to cart
        Cart::create([
            'user_id' => auth()->id(),
            'bookable_type' => Driver::class,
            'bookable_id' => $driver->id,
            'details' => [
                'pickup_location' => $request->pickup_location,
                'dropoff_location' => $request->dropoff_location,
                'ride_date' => $request->ride_date,
                'ride_time' => $request->ride_time,
                'price' => $price,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'تمت إضافة طلب التاكسي إلى السلة بنجاح.');
    }
}
