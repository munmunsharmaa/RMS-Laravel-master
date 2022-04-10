<section>
  <div class="overflow-hidden" style="background: white; border-radius: 10px; padding: 20px;">
        @if(session()->has('employee_created'))
          <div style="border-radius: 10px" class="alert alert-primary" role="alert">
              {{ session()->get('employee_created') }}
          </div>
        @endif

        @if(session()->has('employee_updated'))
            <div style="border-radius: 10px" class="alert alert-warning" role="alert">
                {{ session()->get('employee_updated') }}
            </div>
        @endif

        @if(session()->has('employee_deleted'))
            <div style="border-radius: 10px" class="alert alert-danger" role="alert">
                {{ session()->get('employee_deleted') }}
            </div>
        @endif
        <div style="display: flex; align-items: center; justify-content: space-between;">
            <h1>Employee</h1>

            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" style="border: 1px solid green; border-radius: 10px; color: green; padding: 5px 10px; background: transparent; ">
                Create New Employee
            </button>
        </div>
    
        <div class="text-nowrap" style="overflow-y: hidden; margin-top: 20px;">
            <table class="table table-striped" id="myDataTable">
                <thead>
                  <tr style="color: #2d6a4f;">
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Role</th>
                    <th scope="col">Company</th>
                    <th scope="col">Job Title</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Home Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">State/Province</th>
                    <th scope="col">Zip/Postal Code</th>
                    <th scope="col">Country/Region</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)    
                        <tr>
                          <th scope="row" class="align-middle">{{ $user->id }}</th>
                          <td class="align-middle" style="color: #1c5d99;">{{ $user->name }}</td>
                          <td class="align-middle">{{ $user->email }}</td>

                          @if ($user->user_type == "Admin" )
                            <td class="align-middle"><span style="color: whitesmoke; background: #ffc600; padding: 2px 7px; border-radius: 20px;">{{ $user->user_type }}</span></td>
                          @elseif ($user->user_type == "Mediator")
                            <td class="align-middle"><span style="color: whitesmoke; background: #52b788; padding: 2px 7px; border-radius: 20px;">{{ $user->user_type }}</span></td>
                          @else
                            <td class="align-middle"><span style="color: whitesmoke; background: #adb5bd; padding: 2px 7px; border-radius: 20px;">{{ $user->user_type }}</span></td>
                          @endif

                          <td class="align-middle">{{ $user->role }}</td>
                          <td class="align-middle">{{ $user->company }}</td>
                          <td class="align-middle">{{ $user->job_title }}</td>
                          <td class="align-middle">{{ $user->phone }}</td>
                          <td class="align-middle">{{ $user->home_phone }}</td>
                          <td class="align-middle">{{ $user->address }}</td>
                          <td class="align-middle">{{ $user->city }}</td>
                          <td class="align-middle">{{ $user->state_province }}</td>
                          <td class="align-middle">{{ $user->zip_postal_code }}</td>
                          <td class="align-middle">{{ $user->country_region }}</td>
                          <td>
                              <img class="rounded-circle" style="width: 70px; height: 70px; object-fit: cover;" src="user_photos/{{ $user->photo }}" alt="{{ $user->photo }}">
                          </td>
                          <td class="align-middle">
                            <div class="d-flex gap-2">
                              <button value="{{ $user->id }}" class="view_btn" onMouseOver="this.style.color='#40916c'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-eye" style="font-size: 20px;"></i></button>
                              <button value="{{ $user->id }}" class="edit_btn" onMouseOver="this.style.color='#219ebc'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="fas fa-pencil-alt" style="font-size: 20px;"></i></button>
                              @unless ($user->user_type == 'Admin' && $user->name == 'Lorn Sovannra')
                                <button value="{{ $user->id }}" class="delete_btn" onMouseOver="this.style.color='#f00'" onMouseOut="this.style.color='#000'" style="border: none; background: transparent;"><i class="far fa-trash-alt" style="font-size: 20px;"></i></button>
                              @endunless
                            </div>
                          </td>
                          {{-- Edit Modal --}}
                          @include('modals.employee.edit_employee')
                        </tr>
                        {{-- Delete Modal --}}
                        @include('modals.employee.delete_employee')
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
    <div>
      {{-- View Modal --}}
      @include('modals.employee.view_employee')
    </div>
    <div>
      {{-- Create Employee Modal --}}
      @include('modals.employee.create_employee')
    </div>
  </div>
</section>