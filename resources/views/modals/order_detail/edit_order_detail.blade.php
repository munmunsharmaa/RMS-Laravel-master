<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_order_detail') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id">

                        <div class="row mb-3">
                            <label for="order_id" class="col-md-4 col-form-label text-md-end">{{ __('Order ID') }}</label>

                            <div class="col-md-6">
                                <select id="order_id" class="form-select @error('order_id') is-invalid @enderror" aria-label="Default select example" name="order_id" value="{{ old('order_id') }}" required autocomplete="order_id" autofocus>
                                    <option selected disabled>Select Order ID</option>
                                    @foreach ($orders as $order)
                                        <option value="{{ $order->id }}">{{ $order->id }}</option>
                                    @endforeach
                                </select>

                                @error('order_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="item_id" class="col-md-4 col-form-label text-md-end">{{ __('Item ID') }}</label>

                            <div class="col-md-6">
                                <select id="item_id" class="form-select @error('item_id') is-invalid @enderror" aria-label="Default select example" name="item_id" value="{{ old('item_id') }}" required autocomplete="item_id" autofocus>
                                    <option selected disabled>Select Item ID</option>
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->item_name }}</option>
                                    @endforeach
                                </select>

                                @error('item_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="qty_order" class="col-md-4 col-form-label text-md-end">{{ __('Qty Order') }}</label>

                            <div class="col-md-6">
                                
                                <input id="qty_order" type="number" class="form-control @error('qty_order') is-invalid @enderror" name="qty_order" value="{{ old('qty_order') }}" required autocomplete="qty_order" autofocus>

                                @error('qty_order')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                              </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>