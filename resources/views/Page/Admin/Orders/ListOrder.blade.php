@extends('Layout.Admin')

@section('content')
               <!-- Start Container Fluid -->
               <div class="container-xxl">

                    <!-- Start here.... -->
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
                                                            <th>No</th>                                           
                                                            <th>Order ID</th>
                                                            <th>Billing Name</th>
                                                            <th>Order Date</th>
                                                            <th>Total</th>
                                                            <th class="text-center">Status</th>
                                                            <th>Action</th>
                                                       </tr>
                                                  </thead>
                                                  <tbody>
                                                       @foreach ($orders as $order)                                                            
                                                       <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td><a href="javascript: void(0);" class="text-body">{{ $order->id }}</a> </td>
                                                            <td>{{ $order->user->name }}</td>
                                                            <td> {{ $order->created_at->format('d M, Y') }}</td>
                                                            <td> ${{ $order->total }}</td>
                                                            <td class="text-center">
                                                                 @php
                                                                      $statusColors = [
                                                                           'diproses' => 'bg-warning-subtle text-warning',
                                                                           'dikirim' => 'bg-info-subtle text-info',
                                                                           'selesai' => 'bg-success-subtle text-success',
                                                                           'batal' => 'bg-danger-subtle text-danger',
                                                                      ];
                                                                      $badgeClass = $statusColors[$order->status] ?? 'bg-secondary-subtle text-secondary';
                                                                 @endphp
                                                                 <span class="badge {{ $badgeClass }} py-1 px-2">{{ ucfirst($order->status) }}</span>
                                                            </td> 
                                                            <td>
                                                                 <div class="d-flex gap-2">
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
                                        <!-- end table-responsive -->
                                   </div>
                                   <div class="card-footer border-top">
                                        <nav aria-label="Page navigation example">
                                             <ul class="pagination justify-content-end mb-0">
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Previous</a></li>
                                                  <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                                  <li class="page-item"><a class="page-link" href="javascript:void(0);">Next</a></li>
                                             </ul>
                                        </nav>
                                   </div>
                              </div>
                         </div>

                    </div>

               </div>
               <!-- End Container Fluid -->

@endsection