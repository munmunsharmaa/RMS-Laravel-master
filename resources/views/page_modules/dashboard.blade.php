<section>  
    <div style="background: white; border-radius: 10px; padding: 20px;">
        @if(session()->has('changed_password_successfully'))
            <div style="border-radius: 10px" class="alert alert-primary" role="alert">
                {{ session()->get('changed_password_successfully') }}
            </div>
        @endif

        @if(session()->has('fail_to_change_password'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('fail_to_change_password') }}
            </div>
        @endif

        <div>
            <div class="row" style="color: white;">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #023e8a; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Order Detail</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_order_detail }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #d90429; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Order</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_order }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #f77f00; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Item</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_item }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #ff4d6d; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Table</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_table }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #8338ec; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Category</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_categorie }}</p></div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div style="background: #38b000; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
                        <div style="margin: 0 10px;">
                            <div><p>Employee</p></div>
                            <div><p style="text-align: right; font-size: 20px;">{{ $num_of_employee }}</p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin: 20px 0;">
            <h1>List of Items</h1>
        </div>
        <div style="overflow-y: scroll; height: 60vh; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);">
            <div class="row" style="gap: 10px; margin: 5px;">
                @foreach ($item_data as $item)    
                    <div style="width: 18rem; border-radius: 10px; box-shadow: 0px 0px 6px 0px rgba(0, 153, 255, 0.16);" class="card col-xs-12 col-sm-12 col-md-6 col-lg-4 col-xl-4" >
                        <div style="height: 250px; align-items: center; display: flex; justify-content: center;">
                            <img src="item_images/{{ $item->item_image }}" class="card-img-top" alt="{{ $item->item_image }}">
                        </div>
                        <div class="card-body" style="margin: 10px 0 0 0; border-top: 1px solid gray">
                            <p class="card-text" style="font-weight: bold;">Name: {{ $item->item_name }}</p>
                            <p class="card-text">Price: {{ $item->unit_price }}</p>
                            <p class="card-text">Category: {{ $item->category_name }}</p>
                            <p class="card-text">Status: {{ $item->status }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>