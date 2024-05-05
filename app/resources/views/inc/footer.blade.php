@section('footer')
    <footer class="bg-dark text-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-6">
                    <h5 class="mb-3">@lang('footer.social-networks')</h5>
                    <div class="d-flex gap-4">
                        <a href="https://www.instagram.com/" class="text-light">
                            <i class="bi bi-instagram" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.twitter.com/" class="text-light">
                            <i class="bi bi-twitter" style="font-size: 1.5rem;"></i>
                        </a>
                        <a href="https://www.facebook.com/" class="text-light">
                            <i class="bi bi-facebook" style="font-size: 1.5rem;"></i>
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <h5 class="mb-3">@lang('footer.contact-us')</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <i class="bi bi-geo-alt-fill" style="font-size: 1.5rem;"></i>
                            <span class="ms-2">@lang('footer.street')</span>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-telephone-fill" style="font-size: 1.5rem;"></i>
                            <span class="ms-2">+5 (55) 555-55-55</span>
                        </li>
                        <li class="mb-2">
                            <i class="bi bi-envelope-fill" style="font-size: 1.5rem;"></i>
                            <span class="ms-2">fakemail@gmail.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="bg-light mt-4 mb-3">
            <div class="text-center">
                <p>@lang('footer.rights')</p>
            </div>
        </div>
    </footer>

