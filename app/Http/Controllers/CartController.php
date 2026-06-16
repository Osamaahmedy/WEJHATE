<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\HotelBooking;
use App\Models\Ride;
use App\Models\Hotel;
use App\Models\Driver;
use App\Mail\BookingConfirmedMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        return view('cart.index', compact('cartItems'));
    }

    public function destroy(Cart $cart)
    {
        if ($cart->user_id !== auth()->id()) {
            abort(403);
        }

        $cart->delete();

        return back()->with('success', 'تم حذف العنصر من السلة بنجاح.');
    }

    public function checkout()
    {
        $user = auth()->user();
        $cartItems = Cart::where('user_id', $user->id)->get();

        if ($cartItems->isEmpty()) {
            return back()->with('error', 'السلة فارغة حالياً.');
        }

        $bookingsForMail = [];

        foreach ($cartItems as $item) {
            if ($item->bookable_type === Hotel::class || $item->bookable_type === 'App\Models\Hotel') {
                $hotel = Hotel::find($item->bookable_id);
                if ($hotel) {
                    $details = $item->details;
                    
                    // Create booking
                    HotelBooking::create([
                        'user_id' => $user->id,
                        'hotel_id' => $hotel->id,
                        'check_in' => $details['check_in'],
                        'check_out' => $details['check_out'],
                        'guests_count' => $details['guests_count'],
                        'total_price' => $details['total_price'],
                        'status' => 'confirmed',
                    ]);

                    // Decrement hotel available rooms
                    if ($hotel->rooms_available > 0) {
                        $hotel->decrement('rooms_available');
                    }

                    $bookingsForMail[] = [
                        'type' => 'hotel',
                        'name' => $hotel->name,
                        'address' => $hotel->address,
                        'check_in' => $details['check_in'],
                        'check_out' => $details['check_out'],
                        'guests_count' => $details['guests_count'],
                        'total_price' => $details['total_price'],
                    ];
                }
            } elseif ($item->bookable_type === Driver::class || $item->bookable_type === 'App\Models\Driver') {
                $driver = Driver::find($item->bookable_id);
                if ($driver) {
                    $details = $item->details;

                    // Create ride
                    Ride::create([
                        'user_id' => $user->id,
                        'driver_id' => $driver->id,
                        'pickup_location' => $details['pickup_location'],
                        'dropoff_location' => $details['dropoff_location'],
                        'ride_date' => $details['ride_date'],
                        'ride_time' => $details['ride_time'],
                        'price' => $details['price'],
                        'status' => 'accepted',
                    ]);

                    // Update driver status to busy
                    $driver->update(['status' => 'busy']);

                    $bookingsForMail[] = [
                        'type' => 'ride',
                        'driver_name' => $driver->name,
                        'driver_phone' => $driver->phone,
                        'car_model' => $driver->car_model,
                        'license_plate' => $driver->license_plate,
                        'pickup' => $details['pickup_location'],
                        'dropoff' => $details['dropoff_location'],
                        'date' => $details['ride_date'],
                        'time' => $details['ride_time'],
                        'price' => $details['price'],
                    ];
                }
            }
        }

        // Send confirmation mail
        try {
            Mail::to($user->email)->send(new BookingConfirmedMail($user, $bookingsForMail));
        } catch (\Exception $e) {
            \Log::error('SMTP Mail error: ' . $e->getMessage());
        }

        // Clear Cart
        Cart::where('user_id', $user->id)->delete();

        return redirect()->route('profile.bookings')->with('success', 'تم تأكيد جميع الحجوزات بنجاح وإرسال تفاصيل التأكيد إلى بريدك الإلكتروني!');
    }
}
