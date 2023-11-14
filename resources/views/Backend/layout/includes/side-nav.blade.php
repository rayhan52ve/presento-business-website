<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" style="background-color: #009900" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{ url()->current()==route('dashboard') ? 'active':'' }}" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>

                <a class="nav-link {{ url()->current()==route('profile') ? 'active':'' }}" href="{{route('profile')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                    Profile
                </a>

                <a class="nav-link collapsed @if ( url()->current()==route('event.create') ||  url()->current()==route('event.index')) active @endif" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEvent" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Events
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseEvent" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link {{ url()->current()==route('event.create') ? 'active':'' }}" href="{{ route('event.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Create Event
                        </a>
                        <a class="nav-link {{ url()->current()==route('event.index') ? 'active':'' }}" href="{{ route('event.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Event List
                        </a>
                    </nav>
                </div>
                
                <a class="nav-link collapsed @if ( url()->current()==route('tag.create') ||  url()->current()==route('tag.index')) active @endif" href="#" data-bs-toggle="collapse" data-bs-target="#collapseTag" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-tags"></i></div>
                    Tags
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseTag" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link {{ url()->current()==route('tag.create') ? 'active':'' }}" href="{{ route('tag.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Create Tag
                        </a>
                        <a class="nav-link {{ url()->current()==route('tag.index') ? 'active':'' }}" href="{{ route('tag.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Tag List
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed @if ( url()->current()==route('category.create') ||  url()->current()==route('category.index')) active @endif" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCategory" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCategory" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                       
                        <a class="nav-link {{ url()->current()==route('category.create') ? 'active':'' }}" href="{{ route('category.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Create
                        </a>
                        <a class="nav-link {{ url()->current()==route('category.index') ? 'active':'' }}" href="{{ route('category.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            List
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed @if ( url()->current()==route('sub-category.create') ||  url()->current()==route('sub-category.index')) active @endif" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSubCategory" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Sub Category
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSubCategory" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                       
                        <a class="nav-link {{ url()->current()==route('sub-category.create') ? 'active':'' }}" href="{{ route('sub-category.create') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Create
                        </a>
                        <a class="nav-link {{ url()->current()==route('sub-category.index') ? 'active':'' }}" href="{{ route('sub-category.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            List
                        </a>
                    </nav>
                </div>

                <a class="nav-link collapsed {{ url()->current()==route('user.index') ? 'active':'' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapse">
                    <div class="sb-nav-link-icon"><i class="fa-regular fa-user"></i></div>
                    Users
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUsers" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionUsers">                     
                        <a class="nav-link {{ url()->current()==route('user.index') ? 'active':'' }}" href="{{ route('user.index') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            User List
                        </a>
                        
                    </nav>
                </div>
            </div>
        </div>
        <div class="sb-sidenav-footer text-dark text-center" style="background-color: #6eb76e">
            <div class="small">Logged in as:</div>
            {{Auth::user()->name}}
        </div>
    </nav>
</div>