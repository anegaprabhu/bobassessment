<nav class="navbar navbar-expand-sm navbar-light bg-white border-bottom">
        <a href="" class="navbar-brand"> <img height="55" src="{{ asset('images/brainobrain-logo.png') }}" alt="logo" /></a>
        
        <div class="navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="javascript:void(0)" class="nav-link">
                    @if (\Route::current()->getName() != 'login' 
                        && \Route::current()->getName() != 'register' 
                        && \Route::current()->getName() != 'login.parents'
                        && \Route::current()->getName() != 'register.parents'
                    ) 
                        <span class="menbar" onclick="openNav()"><i class="fa fa-bars"></i></span>
                    @endif
                    </a>
                </li>
            </ul>
        </div>
</nav>

<!-- bg-white border-bottom -->
