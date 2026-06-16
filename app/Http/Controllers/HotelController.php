<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Cart;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        $query = Hotel::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('price_range')) {
            if ($request->price_range == 'under_100') {
                $query->where('price_per_night', '<', 100);
            } elseif ($request->price_range == '100_150') {
                $query->whereBetween('price_per_night', [100, 150]);
            } elseif ($request->price_range == 'over_150') {
                $query->where('price_per_night', '>', 150);
            }
        }

        $hotels = $query->orderBy('rating', 'desc')->get();

        return view('hotels.index', compact('hotels'));
    }

    public function show(Hotel $hotel)
    {
        return view('hotels.show', compact('hotel'));
    }

    public function book(Request $request, Hotel $hotel)
    {
        $request->validate([
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'guests_count' => 'required|integer|min:1|max:10',
        ]);

        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'يجب تسجيل الدخول أولاً لإتمام الحجز.');
        }

        $checkIn = Carbon::parse($request->check_in);
        $checkOut = Carbon::parse($request->check_out);
        $days = $checkIn->diffInDays($checkOut);
        if ($days === 0) {
            $days = 1;
        }

        $totalPrice = $hotel->price_per_night * $days;

        // Add to cart
        Cart::create([
            'user_id' => auth()->id(),
            'bookable_type' => Hotel::class,
            'bookable_id' => $hotel->id,
            'details' => [
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'guests_count' => $request->guests_count,
                'days' => $days,
                'total_price' => $totalPrice,
            ],
        ]);

        return redirect()->route('cart.index')->with('success', 'تمت إضافة حجز الفندق إلى السلة بنجاح.');
    }
}
