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
        $order = Order::findOrFail($id);
        return view('Page.Admin.Orders.EditOrder', compact('order'));
    }

    /**                                                                                                                                                                                                 
     * Update the specified resource in storage.
     */
<<<<<<< HEAD
    public function update(Request $request, Order $order)
    {                                   
=======
    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

>>>>>>> 867b1c6fdd200fac78c3acd47dda3caf4a6628c2
        $request->validate([
            'status'      => 'required|in:diproses,dikirim,selesai,batal',
            'total'       => 'nullable|numeric|min:0',
            'adress_text' => 'nullable|string',
        ]);

        $data = $request->only(['status', 'total', 'adress_text']);

        $order->update($data);
        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
<<<<<<< HEAD
        $order->delete();                                                                                                                                                                                                                                                       
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus');
=======
        $order->delete();
        return redirect()->route('admin.orders.index')->with('success', 'Order berhasil dihapus');
>>>>>>> 867b1c6fdd200fac78c3acd47dda3caf4a6628c2
    }

    public function listOrder()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        $totalOrders = $orders->count();
        $completedOrders = $orders->where('status', 'selesai')->count();
        $pendingOrders = $orders->where('status', 'diproses')->count();
        $cancelledOrders = $orders->where('status', 'batal')->count();
        return view('Page.Admin.Orders.ListOrder', compact('orders', 'totalOrders', 'completedOrders', 'pendingOrders', 'cancelledOrders'));
    }

    public function detailOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('Page.Admin.Orders.DetailOrder', compact('order'));
    }

}
