<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order Detail</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">{{ __('View') }}</div>
                <div class="card-body">

                    <div class="row mb-3">
                        <label for="view_id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="view_order_id" class="col-md-4 col-form-label text-md-end">{{ __('Order ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_order_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="item_id" class="col-md-4 col-form-label text-md-end">{{ __('Item ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_item_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="qty_order" class="col-md-4 col-form-label text-md-end">{{ __('Qty Order') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_qty_order" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>