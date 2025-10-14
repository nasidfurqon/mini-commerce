<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('orders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total'   => 'required|numeric|min:0',
            'status'  => 'required|string',
        ]);

        Order::create($request->all());
        return redirect()->route('orders.index')->with('success', 'Order berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'total'   => 'required|numeric|min:0',
            'status'  => 'required|string',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
    }

    public function listOrder()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('Page.Admin.Orders.ListOrder', compact('orders'));
    }

    public function detailOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('Page.Admin.Orders.DetailOrder', compact('order'));
    }

}
