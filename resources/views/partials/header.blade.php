<header class="navbar navbar-expand-md d-print-none sticky-top">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu" aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
                <img src="{{ asset('static/logo.svg') }}" width="110" height="32" alt="Tabler" class="navbar-brand-image">
            </a>
        </h1>
        @include('components.theme-btn')
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                About
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
                                    <path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
                                    <path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
                                    <path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Blog
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
