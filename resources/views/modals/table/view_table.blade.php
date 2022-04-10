<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Table</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">{{ __('View') }}</div>
                <div class="card-body">

                    <div class="row mb-3">
                        <label for="view_id" class="col-md-4 col-form-label text-md-end">{{ __('Table ID') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_id" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="view_table_name" class="col-md-4 col-form-label text-md-end">{{ __('Table Name') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_table_name" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="view_description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                        <div class="col-md-6">
                            <input disabled id="view_description" type="text" class="form-control">
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