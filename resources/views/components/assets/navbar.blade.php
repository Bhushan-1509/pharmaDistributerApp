<nav class="navbar navbar-expand-lg p-0 m-0">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/Lifecare.png') }}" alt="Lifecare Logo" widht="60" height="70"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <form class="d-flex" role="search" method="get" action="medicines/search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q" required>
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <a class="nav-link mx-2 active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/about-us">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/requirements">Name Patient Import</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-2" href="/services">Services</a>
                </li>

                <li class="nav-item flare">
                    <a class="nav-link mx-2" href="/contact-us">Contact Us<span class="ms-2">&#x2192;</span></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
