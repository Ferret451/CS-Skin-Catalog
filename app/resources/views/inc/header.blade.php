@section('header')
    <header>
        <nav class="navbar navbar-expand-md navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <!--  Icon  -->
                <a class="navbar-brand" href="#"> <img src="{{ asset('/cs-icon.ico') }}" alt="Logo"> </a>

                <!-- Button for folding on mobile devices -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Content -->
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-outline-success" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <input class="form-control me-2" type="search" placeholder="Find..." aria-label="Search">
                        </li>
                        <li class="nav-item ml-auto">
                            <a class="nav-link" href="#">
                                <i class="bi bi-person" style="font-size: 1.5rem"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>
