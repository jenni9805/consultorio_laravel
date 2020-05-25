<div class="sidebar shadow">
    <div class="section-top">
        <div class="logo">
            <img src="{{ url('static/imagenes/symbols.png')}}" class="img-fluid" alt="">
        </div>
        <div class="user">
            <span class="subtitle">Hi!:</span>
            <div class="name">
                {{Auth::user()->name }} {{Auth::user()->lastname }}
                <a href="{{url('/logout')}}" data-toggle="tooltip" data-placement="top" title="Salir">
                    <i class="fas fa-sign-out-alt"></i></a>
            </div>
            <div class="email">{{Auth::user()->email}}</div>
        </div>
    </div>
    <div class="main">
        <ul>
            <li>
                <a href="{{url('/admin')}}"><i class="fas fa-home"></i>Home</a>
            </li>
            <li>
                <a href="{{url('/admin/users')}}"><i class="fas fa-user-friends"></i>Users</a>
            </li>
            <li>
                <a href="{{ url('/admin/patients') }}"><i class="fas fa-user-friends"></i>Patients</a>
            </li>
        </ul>
    </div>
</div>