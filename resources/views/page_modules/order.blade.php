<section>
    <div class="overflow-hidden" style="background: white; border-radius: 10px; padding: 20px;">
        @if(session()->has('order_created'))
          <div style="border-radius: 10px" class="alert alert-primary" role="alert">
              {{ session()->get('order_created') }}
          </div>
        @endif

        @if(session()->has('order_updated'))
            <div style="border-radius: 10px" class="alert alert-warning" role="alert">
                {{ session()->get('order_updated') }}
            </div>
        @endif

        @if(session()->has('order_deleted'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('order_deleted') }}
            </div>
        @endif

        <div style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Order</h1>

            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 1px solid green; border-radius: 10px; color: green; padding: 5px 10px; background: transparent; ">
                Create New Order
            </button>
        </div>
    
        <div class="text-nowrap" style="overflow-y: hidden; margin-top: 20px;">
            <table class="table table-striped" id="myDataTable">
                <thead>
                  <tr style="color: #2d6a4f;">
                    <th scope="col">ID</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Order Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Print Qty</th>
                    <th scope="col">Table Name</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)    
                        <tr>
                          <th scope="row" class="align-middle">{{ $order->id }}</th>
                          <td class="align-middle">{{ $order->name }}</td>
                          <td class="align-middle">{{ $order->order_date }}</td>

                          @if ($order->status == "Approved" )
                            <td class="align-middle"><span style="color: whitesmoke; background: #52b788; padding: 2px 7px; border-radius: 20px;">{{ $order->status }}</span></td>
                          @elseif ($order->status == "Refunded")
                            <td class="align-middle"><span style="color: whitesmoke; background: #ffc600; padding: 2px 7px; border-radius: 20px;">{{ $order->status }}</span></td>
                          @else
                            <td class="align-middle"><span style="color: whitesmoke; background: #adb5bd; padding: 2px 7px; border-radius: 20px;">{{ $order->status }}</span></td>
                          @endif
                          
                          <td class="align-middle">{{ $order->print_qty }}</td>
                          <td class="align-middle">{{ $order->table_name }}</td>
                          <td class="align-middle">
                            <div class="d-flex gap-2">
                              <button value="{{ $order->id }}" class="view_btn" onMouseOver="this.style.color='#40916c'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-eye" style="font-size: 20px;"></i></button>
                              <button value="{{ $order->id }}" class="edit_btn" onMouseOver="this.style.color='#219ebc'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="fas fa-pencil-alt" style="font-size: 20px;"></i></button>
                              <button value="{{ $order->id }}" class="delete_btn" onMouseOver="this.style.color='#f00'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-trash-alt" style="font-size: 20px;"></i></button>
                            </div>
                          </td>
                          {{-- Edit Modal --}}
                          @include('modals.order.edit_order')
                        </tr>
                        {{-- Delete Modal --}}
                        @include('modals.order.delete_order')
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div>
      {{-- View Modal --}}
      @include('modals.order.view_order')
    </div>
    <div>
      {{-- Create Order Modal --}}
      @include('modals.order.create_order')
    </div>
  </div>
</section>