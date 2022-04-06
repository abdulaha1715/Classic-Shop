<!-- ***** Chefs Area Starts ***** -->
    <section class="section" id="chefs">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <h6>Our Chefs</h6>
                        <h2>We offer the best ingredients for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                    function getImageUrl($image) {
                        if(str_starts_with($image, 'http')) {
                            return $image;
                        }
                        return asset('storage/uploads') . '/' . $image;
                    }
                @endphp
                @foreach ($chefs as $chef)
                    <div class="col-lg-4">
                        <div class="chef-item">
                            <div class="thumb">
                                <div class="overlay"></div>
                                <ul class="social-icons">
                                    @if (!empty($chef->cheffacebook))
                                        <li><a href="{{ $chef->cheffacebook }}"><i class="fa fa-facebook"></i></a></li>
                                    @endif
                                    @if (!empty($chef->cheftwitter))
                                        <li><a href="{{ $chef->cheftwitter }}"><i class="fa fa-twitter"></i></a></li>
                                    @endif
                                    @if (!empty($chef->chefbehence))
                                        <li><a href="{{ $chef->chefbehence }}"><i class="fa fa-behance-square"></i></a></li>
                                    @endif
                                    @if (!empty($chef->chefinstagram))
                                        <li><a href="{{ $chef->chefinstagram }}"><i class="fa fa-instagram"></i></a></li>
                                    @endif
                                    @if (!empty($chef->chefgoogleplus))
                                        <li><a href="{{ $chef->chefgoogleplus }}"><i class="fa fa-google"></i></a></li>
                                    @endif
                                </ul>
                                <img src="{{ getImageUrl($chef->chefimage) }}" alt="Chef #3">
                            </div>
                            <div class="down-content">
                                <h4>{{ $chef->name }}</h4>
                                <span>{{ $chef->specialtie }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- ***** Chefs Area Ends ***** -->
