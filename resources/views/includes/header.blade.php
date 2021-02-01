<nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
    <div class="container">
        <a href="{{route('index')}}"><img src="{{asset('Logo.png')}}" class="navbar-brand logo navbar-logo" alt=""></a>     
            <a class="navbar-brand logo" href="{{route('index')}}">ES FOREX Trading</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarNav"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="nav navbar-nav ml-auto">
                    @guest
                    @else
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('learning-introduction')}}">Learning Materials</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="{{route('order-show')}}">Order History</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="{{route('fund-index')}}">Funds Management</a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    </form>
                    @endguest
                </ul>
                </div>
    </div>
</nav>