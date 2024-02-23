@extends('layouts.app')

@section('content')
    <div class="slider-area">
        <div class="slider">
            <div id="bg-slider" class="owl-carousel owl-theme">

                <div class="item"><img src="{{ asset('assets/img/slide1/slider-image-2.jpg') }}" alt="The Last of us"></div>
                <div class="item"><img src="{{ asset('assets/img/slide1/slider-image-1.jpg') }}" alt="GTA V"></div>

            </div>
        </div>
        <div class="container slider-content">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12">
                    <h2>property Searching Just Got So Easy</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi
                        sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>

                </div>
            </div>
        </div>
    </div>

    <div class="home-lager-shearch" style="background-color: rgb(252, 252, 252); padding-top: 25px; margin-top: -125px;">
        <div class="container">
            <div class="col-md-12 large-search">
                <div class="search-form wow pulse">
                    <form action="{{ route('property') }}" method="GET" class=" form-inline">
                        <div class="col-md-12">
                            <div class="col-md-3">
                                <input type="text" class="form-control" name="search" placeholder="Key word">
                            </div>
                            <div class="col-md-3">
                                <select id="launchBegins" name="category_id[]" class="selectpicker" title="Select Category">
                                    @foreach (App\Models\Category::pluck('name', 'id')->toArray() as $id => $name)
                                        <option value="{!! $id !!}">{!! $name !!}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select id="launchBegins" name="subcategory_id[]" class="selectpicker"
                                    title="Select Sub Category">
                                    {{-- @foreach (App\Models\Category::pluck('name', 'id')->toArray() as $id => $name)
                                    <option value="{!! $id !!}">{!! $name !!}</option>
                                @endforeach --}}

                                </select>
                            </div>
                            <div class="col-md-3">
                                <select id="launchBegins" name="area_id[]" class="selectpicker" data-live-search="true"
                                    data-live-search-style="begins" title="Select your area">
                                    @foreach (App\Models\Area::pluck('area', 'id')->toArray() as $id => $area)
                                        <option value="{!! $id !!}">{!! $area !!}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="search-row">

                                <div class="col-sm-4">
                                    <label for="price-range">Price range (₹):</label>
                                    <input type="text" class="span2" name="price" value="" data-slider-min="0"
                                        data-slider-max="100000000" data-slider-step="500000"
                                        data-slider-value="[5000000,100000000]" id="price-range"><br />
                                    <b class="pull-left color">100000₹</b>
                                    <b class="pull-right color">100000000₹</b>
                                </div>
                                <!-- End of  -->


                                <!-- End of  -->

                                <div class="col-sm-4">
                                    <label for="price-range">BHK :</label>
                                    <input type="text" class="span2" name="bhk" value="" data-slider-min="0"
                                        data-slider-max="5" data-slider-step="1" data-slider-value="[1,5]"
                                        id="min-baths"><br />
                                    <b class="pull-left color">1</b>
                                    <b class="pull-right color">6</b>
                                </div>
                                <!-- End of  -->
                                <div class="col-sm-4">
                                    <label for="price-range">Bathrooms :</label>
                                    <input type="text" class="span2" name="bathrooms" value="" data-slider-min="0"
                                        data-slider-max="6" data-slider-step="1" data-slider-value="[1,6]"
                                        id="property-geo"><br />
                                    <b class="pull-left color">1</b>
                                    <b class="pull-right color">7</b>
                                </div>
                                <div class="col-sm-3">

                                </div>
                                <!-- End of  -->

                            </div>

                            <div class="search-row">
                                @foreach (App\Models\Amenity::pluck('name', 'id')->toArray() as $id => $name)
                                    <div class="col-sm-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="amenities[]" value="{{ $id }}">
                                                {{ $name }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="center">
                            <input type="submit" name="submit" value="" class="btn btn-default btn-lg-sheach">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- property area -->
    <div class="content-area recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>Latest submitted property</h2>
                </div>
            </div>

            <div class="row">
                <div class="proerty-th">
                    @foreach (App\Models\Property::orderByDesc('created_at')->limit(3)->get() as $property)
                        <div class="col-sm-6 col-md-3 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{!! route('viewproperty', $property->slug) !!}"><img src="{!! $property->feature_image ? $property->feature_image->file_url('thumb') : asset('images/ImageNotFound.jpeg') !!}"></a>
                                </div>

                                <div class="item-entry overflow">
                                    <h5><a href="{!! route('viewproperty', $property->slug) !!}">{!! $property->title !!}</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> {{ $property->sq_ft }} </span>
                                    <span class="proerty-price pull-right">₹ {{ $property->price }}</span>
                                    <p style="display: none;">{{ $property->description }}</p>
                                    <div class="property-icon">
                                        <img src="{{ asset('assets/img/icon/bed.png') }}">({{ $property->bhk }})|
                                        <img src="{{ asset('assets/img/icon/shawer.png') }}">({{ $property->bathrooms }})
                                    </div>
                                    <a class="favouriteProperty" data-href="{!! route('favourite.property', $property->id) !!}"><i
                                            class="fa {!! in_array($property->id, $favourite_properties) ? 'fa-heart' : 'fa-heart-o' !!}"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-sm-6 col-md-3 p0">
                        <div class="box-tree more-proerty text-center">
                            <div class="item-tree-icon">
                                <i class="fa fa-th"></i>
                            </div>
                            <div class="more-entry overflow">
                                <h5><a href="{{ route('property') }}">CAN'T DECIDE ? </a></h5>
                                <h5 class="tree-sub-ttl">Show all properties</h5>
                                <button class="btn border-btn more-black" value="All properties">All properties</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Welcome area -->
    <div class="Welcome-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 Welcome-entry  col-sm-12">
                    <div class="col-md-5 col-md-offset-2 col-sm-6 col-xs-12">
                        <div class="welcome_text wow fadeInLeft" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                                    <!-- /.feature title -->
                                    <h2>GARO ESTATE </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <div class="welcome_services wow fadeInRight" data-wow-delay="0.3s" data-wow-offset="100">
                            <div class="row">
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-home pe-4x"></i>
                                        </div>
                                        <h3>Any property</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-users pe-4x"></i>
                                        </div>
                                        <h3>More Clients</h3>
                                    </div>
                                </div>


                                <div class="col-xs-12 text-center">
                                    <i class="welcome-circle"></i>
                                </div>

                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-notebook pe-4x"></i>
                                        </div>
                                        <h3>Easy to use</h3>
                                    </div>
                                </div>
                                <div class="col-xs-6 m-padding">
                                    <div class="welcome-estate">
                                        <div class="welcome-icon">
                                            <i class="pe-7s-help2 pe-4x"></i>
                                        </div>
                                        <h3>Any help </h3>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--TESTIMONIALS -->


    <!-- Count area -->
    <div class="count-area">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                    <!-- /.feature title -->
                    <h2>You can trust Us </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 percent-blocks m-main" data-waypoint-scroll="true">
                    <div class="row">
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-users"></span>
                                </div>
                                <div class="chart" data-percent="5000">
                                    <h2 class="percent" id="counter">0</h2>
                                    <h5>HAPPY CUSTOMER </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-home"></span>
                                </div>
                                <div class="chart" data-percent="12000">
                                    <h2 class="percent" id="counter1">0</h2>
                                    <h5>Properties in stock</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-flag"></span>
                                </div>
                                <div class="chart" data-percent="120">
                                    <h2 class="percent" id="counter2">0</h2>
                                    <h5>Area registered </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-xs-6">
                            <div class="count-item">
                                <div class="count-item-circle">
                                    <span class="pe-7s-graph2"></span>
                                </div>
                                <div class="chart" data-percent="5000">
                                    <h2 class="percent" id="counter3">5000</h2>
                                    <h5>DEALER BRANCHES</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- boy-sale area -->
    <div class="boy-sale-area">
        <div class="container">
            <div class="row">

                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-md-offset-0 col-xs-12">
                    <div class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-search"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>ARE YOU LOOKING FOR A Property?</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                        </div>
                        <div class="asks-first-arrow">
                            <a href="{{ route('property') }}"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-10 col-sm-offset-1 col-xs-12 col-md-offset-0">
                    <div class="asks-first">
                        <div class="asks-first-circle">
                            <span class="fa fa-usd"></span>
                        </div>
                        <div class="asks-first-info">
                            <h2>DO YOU WANT TO SELL A Property?</h2>
                            <p> varius od lio eget conseq uat blandit, lorem auglue comm lodo nisl no us nibh mas lsa</p>
                        </div>
                        <div class="asks-first-arrow">
                            <a href="#"><span class="fa fa-angle-right"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p class="asks-call">QUESTIONS? CALL US : <span class="strong"> +91 908 967 5906</span></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            jQuery(".favouriteProperty").on("click", function(e) {
                jQuery('#preloder, .loader').show();
                e.preventDefault();
                var _this = jQuery(this);
                $.ajax({
                        type: "GET",
                        url: _this.data('href'),
                    })
                    .done(function(data) {
                        jQuery(_this).find("i").toggleClass('fa-heart-o').toggleClass('fa-heart');
                        jQuery('#preloder, .loader').hide();
                    }).fail(function(error) {
                        jQuery('#preloder, .loader').hide();
                        console.log(error);
                    });
            });
        });
    </script>
@endsection
