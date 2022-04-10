<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">{{ __('View') }}</div>
                    <div id="view_photo_div" style="text-align: center; border-bottom: 1px solid gray; padding: 10px 0;">
                        <img style="object-fit: cover; width: 500px; height: 500px; border-radius: 20px" id="view_photo">
                    </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Item ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="item_name" class="col-md-4 col-form-label text-md-end">{{ __('Item Name') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_item_name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_description" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="category_id" class="col-md-4 col-form-label text-md-end">{{ __('Category ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_category_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="unit_price" class="col-md-4 col-form-label text-md-end">{{ __('Unit Price') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_unit_price" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_status" type="text" class="form-control">
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