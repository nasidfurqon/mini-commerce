@extends('Layout.Admin')

@section('content')
               
               <div class="container-xxl">

                    
                    <div class="row">
                         <div class="col-lg-3">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <div>
                                                  <h4 class="card-title mb-2 d-flex align-items-center gap-2">Total Order</h4>
                                                  <p class="text-muted fw-medium fs-22 mb-0">{{ $totalOrders }}</p>
                                             </div>
                                             <div>
                                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                                       <iconify-icon icon="solar:bill-list-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <div>
                                                  <h4 class="card-title mb-2 d-flex align-items-center gap-2">Completed Order</h4>
                                                  <p class="text-muted fw-medium fs-22 mb-0">{{ $completedOrders }}</p>
                                             </div>
                                             <div>
                                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                                       <iconify-icon icon="solar:bill-cross-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <div>
                                                  <h4 class="card-title mb-2 d-flex align-items-center gap-2">Pending Order</h4>
                                                  <p class="text-muted fw-medium fs-22 mb-0">{{ $pendingOrders }}</p>
                                             </div>
                                             <div>
                                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                                       <iconify-icon icon="solar:bill-check-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                         <div class="col-lg-3">
                              <div class="card">
                                   <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                             <div>
                                                  <h4 class="card-title mb-2 d-flex align-items-center gap-2">Cancelled Order</h4>
                                                  <p class="text-muted fw-medium fs-22 mb-0">{{ $cancelledOrders }}</p>
                                             </div>
                                             <div>
                                                  <div class="avatar-md bg-primary bg-opacity-10 rounded">
                                                       <iconify-icon icon="solar:bill-bold-duotone" class="fs-32 text-primary avatar-title"></iconify-icon>
                                                  </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>

                    </div>

                    <div class="row">
                         <div class="col-xl-12">
                              <div class="card">                                 
                                   <div class="card-body p-0">
                                        <div class="table-responsive">
                                             <table class="table align-middle mb-0 table-hover table-centered">
                                                  <thead class="bg-light-subtle">
                                                       <tr>
                                                            <th class="text-center">No</th>
                                                            <th>Order ID</th>
                                                            <th>Billing Name</th>
                                                            <th class="text-nowrap">Order Date</th>
                                                            <th class="text-end">Total</th>
                                                            <th class="text-center">Status</th>
                                                            <th class="text-center">Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($orders as $order)                                                            
                                                       <tr>
                                                            <td class="text-center">{{ $loop->iteration }}</td>
                                                            <td><a href="javascript:void(0);" class="text-body">{{ $order->id }}</a></td>
                                                            <td>{{ $order->user->name }}</td>
                                                            <td class="text-nowrap">{{ $order->created_at->format('d M, Y') }}</td>
                                                            <td class="text-end">Rp{{ number_format($order->total,2,',','.') }}</td>
                                                            <td class="text-center">
                                                                 @switch($order->status)
                                                                  @case('dikirim')
                                                                       <span class="badge bg-soft-warning text-warning">Dikirim</span>
                                                                  @break
                                                                  @case('diproses')
                                                                       <span class="badge bg-soft-info text-info">Diproses</span>
                                                                  @break
                                                                  @case('selesai')
                                                                       <span class="badge bg-soft-success text-success">Selesai</span>
                                                                  @break
                                                                  @case('batal')
                                                                       <span class="badge bg-soft-danger text-danger">Batal</span>
                                                                  @break
                                                                  @default
                                                                       <span class="badge bg-soft-secondary text-secondary">Unknown</span>
                                                                 @endswitch
                                                            </td>
                                                            <td class="text-center">
                                                                 <div class="d-inline-flex gap-2 align-items-center justify-content-center">
                                                                      <a href="{{ route('admin.orders.detail',['id'=>$order->id]) }}" class="btn btn-light btn-sm"><iconify-icon icon="solar:eye-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <a href="{{ route('admin.orders.edit',['id'=>$order->id]) }}" class="btn btn-soft-primary btn-sm"><iconify-icon icon="solar:pen-2-broken" class="align-middle fs-18"></iconify-icon></a>
                                                                      <button class="btn btn-soft-danger btn-sm" id="deleteOrder{{ $order->id }}" data-form-id="deleteOrderForm{{ $order->id }}" data-nama="Order #{{ $order->id }}" data-type="order"><iconify-icon icon="solar:trash-bin-minimalistic-2-broken" class="align-middle fs-18"></iconify-icon></button>
                                                                       <form action="{{ route('admin.orders.destroy', ['order' => $order->id]) }}" method="POST" id="deleteOrderForm{{ $order->id }}" hidden>@csrf @method('DELETE')</form>
                                                                 </div>
                                                            </td>
                                                       </tr>
                                                       @endforeach
                                                  </tbody>
                                             </table>
                                        </div>
                                        
                                   </div>
                                   <div class="card-footer border-top">
                                        @if ($orders->hasPages())
                                            <div class="d-flex justify-content-end">
                                                {{ $orders->links('pagination::bootstrap-5') }}
                                            </div>
                                        @endif
                                   </div>
                              </div>
                         </div>

                    </div>

               </div>
               

@endsection