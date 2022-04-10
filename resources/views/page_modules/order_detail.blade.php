<section>
    <div class="overflow-hidden" style="background: white; border-radius: 10px; padding: 20px;">
        @if(session()->has('order_detail_created'))
          <div style="border-radius: 10px" class="alert alert-primary" role="alert">
              {{ session()->get('order_detail_created') }}
          </div>
        @endif

        @if(session()->has('order_detail_updated'))
            <div style="border-radius: 10px" class="alert alert-warning" role="alert">
                {{ session()->get('order_detail_updated') }}
            </div>
        @endif

        @if(session()->has('order_detail_deleted'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('order_detail_deleted') }}
            </div>
        @endif

        @if(session()->has('order_detail_invalid'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('order_detail_invalid') }}
            </div>
        @endif

        <div style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Order Detail</h1>

            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 1px solid green; border-radius: 10px; color: green; padding: 5px 10px; background: transparent; ">
                Create New Order Detail
            </button>
        </div>
    
        <div class="text-nowrap" style="overflow-y: hidden; margin-top: 20px;">
            <table class="table table-striped" id="myDataTable">
                <thead>
                  <tr style="color: #2d6a4f;">
                    <th scope="col">ID</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Qty Order</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($order_details as $order_detail)    
                        <tr>
                          <td class="align-middle">{{ $order_detail->id }}</td>
                          <td class="align-middle">{{ $order_detail->order_id }}</td>
                          <td class="align-middle">{{ $order_detail->item_name }}</td>
                          <td class="align-middle">{{ $order_detail->qty_order }}</td>
                          <td class="align-middle">
                            <div class="d-flex gap-2">
                              <button value="{{ $order_detail->id }}" class="view_btn" onMouseOver="this.style.color='#40916c'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-eye" style="font-size: 20px;"></i></button>
                              <button value="{{ $order_detail->id }}" class="edit_btn" onMouseOver="this.style.color='#219ebc'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="fas fa-pencil-alt" style="font-size: 20px;"></i></button>
                              <button value="{{ $order_detail->id }}" class="delete_btn" onMouseOver="this.style.color='#f00'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-trash-alt" style="font-size: 20px;"></i></button>
                            </div>
                          </td>
                          {{-- Edit Modal --}}
                          @include('modals.order_detail.edit_order_detail')
                        </tr>
                        {{-- Delete Modal --}}
                        @include('modals.order_detail.delete_order_detail')
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div>
      {{-- View Modal --}}
      @include('modals.order_detail.view_order_detail')
    </div>
    <div>
      {{-- Create order_Detail Modal --}}
      @include('modals.order_detail.create_order_detail')
    </div>
  </div>
</section>