<header style="background: #2d6a4f; padding: 0 30px;">
    <div style="color: white; align-items: center; display: grid; grid-template-columns: 350px auto;">
        <div style="display: flex; align-items: center;">
            <h1>Deli Food</h1>
        </div>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h3>Welcome back, {{ $auth -> name }}!</h3>
            </div>
            <div style="align-items: center; display: flex; gap: 20px;">
                <div style="display: flex; gap: 10px;">
                    <i class="fab fa-facebook-square" style="font-size: 34px;"></i>
                    <i class="fab fa-instagram-square" style="font-size: 34px;"></i>
                    <i class="fab fa-twitter-square" style="font-size: 34px;"></i>
                    <i class="fab fa-linkedin" style="font-size: 34px;"></i>
                </div>
                <div class="d-flex rounded-pill gap-2" style="align-items: center; background: white; cursor: pointer;">
                    <li class="nav-item dropdown" style="list-style: none;">
                        <a id="navbarDropdown" style="color: black;" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img class="rounded-circle" style="width: 30px; height: 30px; object-fit: cover;" src="user_photos/{{ $auth->photo }}" alt="{{ $auth->photo }}">
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a data-bs-toggle="modal" data-bs-target="#changePasswordModal" class="dropdown-item" href="{{ route('order_home') }}">
                                {{ __('Change Password') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </div>
            </div>
        </div>

        {{-- Change Password Modal --}}
        @include('modals.change_password.change_password')
    </div>
</header>