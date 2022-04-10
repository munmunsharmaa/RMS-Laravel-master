<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Order</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_order') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="id" id="id">
                        <div class="row mb-3">
                            <label for="employee_id" class="col-md-4 col-form-label text-md-end">{{ __('Employee ID') }}</label>

                            <div class="col-md-6">
                                <input disabled id="employee_id" type="text" class="form-control @error('employee_id') is-invalid @enderror" name="employee_id" value="{{ old('employee_id') }}" required autocomplete="employee_id" autofocus>

                                @error('employee_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="order_date" class="col-md-4 col-form-label text-md-end">{{ __('Order Date') }}</label>

                            <div class="col-md-6">
                                <input id="order_date" type="date" class="form-control @error('order_date') is-invalid @enderror" name="order_date" value="{{ old('order_date') }}" autocomplete="order_date" autofocus>

                                @error('order_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select id="status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>
                                    <option selected disabled>Select Status</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Refunded">Refunded</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="print_qty" class="col-md-4 col-form-label text-md-end">{{ __('Print Qty') }}</label>

                            <div class="col-md-6">
                                
                                <input id="print_qty" type="number" class="form-control @error('print_qty') is-invalid @enderror" name="print_qty" value="{{ old('print_qty') }}" required autocomplete="print_qty" autofocus>

                                @error('print_qty')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="table_id" class="col-md-4 col-form-label text-md-end">{{ __('Table ID') }}</label>

                            <div class="col-md-6">
                                <select id="table_id" class="form-select @error('table_id') is-invalid @enderror" aria-label="Default select example" name="table_id" value="{{ old('table_id') }}" required autocomplete="table_id" autofocus>
                                    <option selected disabled>Select Item ID</option>
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}">{{ $table->table_name }}</option>
                                    @endforeach
                                </select>

                                @error('table_id')
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