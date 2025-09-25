<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = OrderItem::all();
        return view('order_items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('order_items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'product_id'=> 'required|exists:products,id',
            'quantity'  => 'required|integer|min:1',
            'price'     => 'required|numeric|min:0',
        ]);

        OrderItem::create($request->all());
        return redirect()->route('order-items.index')->with('success', 'Order item berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('order_items.show', compact('orderItem'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('order_items.edit', compact('orderItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'product_id'=> 'required|exists:products,id',
            'quantity'  => 'required|integer|min:1',
            'price'     => 'required|numeric|min:0',
        ]);

        $orderItem->update($request->all());
        return redirect()->route('order-items.index')->with('success', 'Order item berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderItem $orderItem)
    {
        $orderItem->delete();
        return redirect()->route('order-items.index')->with('success', 'Order item berhasil dihapus');
    }
}
