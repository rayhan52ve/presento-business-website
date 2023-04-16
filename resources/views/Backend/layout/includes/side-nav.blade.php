<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #009900" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{route('front.home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Profile
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Events
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link" href="{{ route('todo.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            To-do List
                        </a>
                        <a class="nav-link" href="{{ route('event.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Create Event
                        </a>
                        <a class="nav-link" href="{{ route('event.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Event List
                        </a>

                        
                    </nav>
                </div>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapse">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionUsers">                     
                        <a class="nav-link" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            User List
                        </a>
                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer bg-success text-center">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>