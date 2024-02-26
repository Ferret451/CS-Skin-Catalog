@section('header')
    <header>
        <nav class="navbar navbar-expand-sm navbar-expand-md navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand" href="#"> <img src="{{ asset('/cs-icon.ico') }}" alt="Logo"> </a>

                <!-- Content -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/catalog">Catalog</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item d-flex ">
                            <button class="btn btn-outline-success me-2" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                            <input class="form-control me-2" type="search" placeholder="Find..." aria-label="Search">
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="/user">
                                <i class="bi bi-person" style="font-size: 1.5rem"></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Button for folding on mobile devices -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
