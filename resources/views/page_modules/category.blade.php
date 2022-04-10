<section>
    <div class="overflow-hidden" style="background: white; border-radius: 10px; padding: 20px;">
        @if(session()->has('category_created'))
          <div style="border-radius: 10px" class="alert alert-primary" role="alert">
              {{ session()->get('category_created') }}
          </div>
        @endif

        @if(session()->has('category_updated'))
            <div style="border-radius: 10px" class="alert alert-warning" role="alert">
                {{ session()->get('category_updated') }}
            </div>
        @endif

        @if(session()->has('category_deleted'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('category_deleted') }}
            </div>
        @endif

        <div style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Category</h1>

            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 1px solid green; border-radius: 10px; color: green; padding: 5px 10px; background: transparent; ">
                Create New Category
            </button>
        </div>
    
        <div class="text-nowrap" style="overflow-y: hidden; margin-top: 20px;">
            <table class="table table-striped" id="myDataTable">
                <thead>
                  <tr style="color: #2d6a4f;">
                    <th scope="col">ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Category Image</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)    
                        <tr>
                          <th scope="row" class="align-middle">{{ $category->id }}</th>
                          <td class="align-middle" style="color: #1c5d99;">{{ $category->category_name }}</td>

                          @if ($category->status == "Hot" )
                            <td class="align-middle"><span style="color: whitesmoke; background: #ff6700; padding: 2px 7px; border-radius: 20px;">{{ $category->status }}</span></td>
                          @else
                            <td class="align-middle"><span style="color: whitesmoke; background: #1f7a8c; padding: 2px 7px; border-radius: 20px;">{{ $category->status }}</span></td>
                          @endif

                          <td>
                              <img class="rounded" style="width: 200px; height: 100px; object-fit: cover;" src="category_images/{{ $category->category_image }}" alt="{{ $category->category_image }}">
                          </td>
                          <td class="align-middle">
                            <div class="d-flex gap-2">
                              <button value="{{ $category->id }}" class="view_btn" onMouseOver="this.style.color='#40916c'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-eye" style="font-size: 20px;"></i></button>
                              <button value="{{ $category->id }}" class="edit_btn" onMouseOver="this.style.color='#219ebc'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="fas fa-pencil-alt" style="font-size: 20px;"></i></button>
                              <button value="{{ $category->id }}" class="delete_btn" onMouseOver="this.style.color='#f00'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-trash-alt" style="font-size: 20px;"></i></button>
                            </div>
                          </td>
                          {{-- Edit Modal --}}
                          @include('modals.category.edit_category')
                        </tr>
                        {{-- Delete Modal --}}
                        @include('modals.category.delete_category')
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div>
      {{-- View Modal --}}
      @include('modals.category.view_category')
    </div>
    <div>
      {{-- Create Category Modal --}}
      @include('modals.category.create_category')
    </div>
  </div>
</section>