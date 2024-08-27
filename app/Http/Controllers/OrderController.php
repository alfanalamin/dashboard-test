<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Illuminate\Support\Facades\Http;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil semua order beserta relasinya
        $orders = Order::with(['product', 'status'])->get();

        // Loop melalui setiap order untuk mengambil nama lokasi dari API

        return view('pages.orders.index-orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $status = Status::all();

        // Fetch provinces from Raja Ongkir API
        $provinceResponse = Http::withHeaders([
            'key' => 'eb64aecc83adbd913541d850ad00d76b',
        ])->get('https://api.rajaongkir.com/starter/province');

        if ($provinceResponse->successful() && isset($provinceResponse['rajaongkir']['results'])) {
            $provinces = $provinceResponse['rajaongkir']['results'];
        } else {
            $provinces = [];
        }

        return view('pages.orders.create-orders', compact('products', 'status', 'provinces'));
    }

    public function getCities(Request $request)
    {
        $provinceId = $request->province_id;

        // Fetch cities based on province ID from Raja Ongkir API
        $cityResponse = Http::withHeaders([
            'key' => 'eb64aecc83adbd913541d850ad00d76b',
        ])->get('https://pro.rajaongkir.com/api/city', [
            'province' => $provinceId
        ]);

        if ($cityResponse->successful() && isset($cityResponse['rajaongkir']['results'])) {
            return response()->json($cityResponse['rajaongkir']['results']);
        } else {
            return response()->json([]);
        }
    }

    public function getSubdistricts(Request $request)
    {
        $cityId = $request->city_id;

        // Fetch subdistricts based on city ID from Raja Ongkir API
        $subdistrictResponse = Http::withHeaders([
            'key' => 'eb64aecc83adbd913541d850ad00d76b',
        ])->get('https://pro.rajaongkir.com/api/subdistrict', [
            'city' => $cityId
        ]);

        if ($subdistrictResponse->successful() && isset($subdistrictResponse['rajaongkir']['results'])) {
            return response()->json($subdistrictResponse['rajaongkir']['results']);
        } else {
            return response()->json([]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'product_id' => 'required|exists:product,id',
            'status_id' => 'required|exists:status,id',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'guard' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Save order without fetching names
        Order::create($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['product', 'status'])->findOrFail($id);

        return view('pages.orders.show-orders', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = Product::all();
        $status = Status::all();

        // Fetch provinces from Raja Ongkir API
        $provinceResponse = Http::withHeaders([
            'key' => 'eb64aecc83adbd913541d850ad00d76b',
        ])->get('https://api.rajaongkir.com/starter/province');

        if ($provinceResponse->successful() && isset($provinceResponse['rajaongkir']['results'])) {
            $provinces = $provinceResponse['rajaongkir']['results'];
        } else {
            $provinces = [];
        }

        return view('pages.orders.edit-orders', compact('order', 'products', 'status', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'product_id' => 'required|exists:product,id',
            'status_id' => 'required|exists:status,id',
            'province' => 'required|string|max:255',
            'regency' => 'required|string|max:255',
            'guard' => 'required|string|max:255',
            'subdistrict' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Order deleted successfully.');
    }

    // Helper functions to get names based on ID from API
    private function getProvinceName($provinceId)
    {
        $response = Http::withHeaders([
            'key' => 'eb64aecc83adbd913541d850ad00d76b',
        ])->get('https://api.rajaongkir.com/starter/province', [
            'id' => $provinceId,
        ]);

        if ($response->successful() && isset($response['rajaongkir']['results'])) {
            return $response['rajaongkir']['results']['province'];
        }

        return null;
    }
}
