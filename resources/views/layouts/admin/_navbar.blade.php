<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>


    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav  mr-auto-navbav {{ app()->getLocale() === 'en' ? 'ml-auto' : '' }}">
        <!-- Navbar Search -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa-solid fa-globe"></i> {{ LaravelLocalization::getCurrentLocaleNative() }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}" class="dropdown-item"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        @if (LaravelLocalization::getCurrentLocale() == $localeCode)
                            <strong>{{ $properties['native'] }}</strong>
                        @else
                            {{ $properties['native'] }}
                        @endif
                    </a>
                @endforeach

            </div>
        </li>



        <li class="nav-item dropdown user user-menu ">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                <img src={{ asset('dashboard/img/user2-160x160.jpg') }}
                    class="user-image img-circle elevation-2 avatar">
                <span class="hidden-xs">{{ Auth::user()->roles[0]->name }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right " style="left: inherit; right: 0px;">
                <!-- User image -->
                <li class="user-header bg-primary">

                    <img src={{ asset('dashboard/img/user2-160x160.jpg') }} class="img-circle elevation-2 avatar"
                        alt="User Image">
                    <p>
                        {{ Auth::user()->name }}

                    </p>
                </li>

                <!-- Menu Footer-->
                <li class="user-footer">
                    <!-- <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>-->
                    <div class="pull-right">

                        <form action="{{ route('admin.logout') }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                        </form>
                    </div>
                </li>
            </ul>
        </li>





    </ul>
</nav>
