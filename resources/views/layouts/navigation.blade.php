<aside style="background: white; border-radius: 10px;">
    <nav style=" list-style: none;">
        <a class="nav_a" href="{{ route("dashboard") }}" style="text-decoration: none; {{ Request::segment(1) == '' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="display: flex; padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == '' ? 'background: green;' : 'background: white;' }}">
                <div>Dashboard</div>
            </li>
        </a>
        <a class="nav_a" href="{{ route("order_detail_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'order-detail' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'order-detail' ? 'background: green;' : 'background: white;' }}">
                Order Detail
            </li>
        </a>
        <a class="nav_a" href="{{ route("order_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'order' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'order' ? 'background: green;' : 'background: white;' }}">
                Order
            </li>
        </a>
        <a class="nav_a" href="{{ route("item_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'item' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'item' ? 'background: green;' : 'background: white;' }}">
                Item
            </li>
        </a>
        <a class="nav_a" href="{{ route("table_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'table' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'table' ? 'background: green;' : 'background: white;' }}">
                Table
            </li>
        </a>
        <a class="nav_a" href="{{ route("category_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'category' ? 'color: white;' : 'color: black;' }}">
            <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'category' ? 'background: green;' : 'background: white;' }}">
                Category
            </li>
        </a>
        @if ($auth->user_type == "Admin")
            <a class="nav_a" href="{{ route("employee_home") }}" style="text-decoration: none; {{ Request::segment(1) == 'employee' ? 'color: white;' : 'color: black;' }}">
                <li class="nav_a_li" style="padding: 10px 0 10px 20px; border-radius: 10px; {{ Request::segment(1) == 'employee' ? 'background: green;' : 'background: white;' }}">
                    Employee
                </li>
            </a>
        @endif
    </nav>
</aside