
<div class="card shadow-sm">
    <div class="card-body">
        {{-- <h4 class="card-title text-center">Profile</h4> --}}
        <div class="card-body">
            <div class="text-center">
                <img src="@if (Auth::user()->photo) {{ Storage::url(Auth::user()->photo) }} @else https://ui-avatars.com/api/?background=000C32&color=fff&name={{ Auth::user()->name }} @endif" class="rounded-circle" alt="profile"
                    width="150px">
            </div>
            <div class="text-center mt-3">
                <h5>{{ Auth::user()->name }}</h5>
                <p>{{ Auth::user()->keanggotaan }}</p>  
            </div>

        </div>
    </div>
</div>

<div class="card mt-3 shadow-sm">
    <div class="card-body">
        <h4 class="card-title text-center">Menu</h4>
        <div class="card-body">
            <ul class="list-group ">
                {{-- <a href="{{ route('user.dashboard') }}" class="list-group-item text-info">Dashboard</a> --}}
                <a href="{{ route("user.profile") }}" class="list-group-item text-info">Data Pribadi</a>
                <a href="{{ route('user.kajian') }}" class="list-group-item text-info">Kajian</a>
                <a href="{{ route('logout') }}" class="list-group-item text-info">Logout</a>
            </ul>
        </div>
    </div>
</div>