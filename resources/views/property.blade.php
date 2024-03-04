@extends('layouts.app')
@section('content')
    <div class="page-head">
        <div class="container">
            <div class="row">
                <div class="page-head-content">
                    <h1 class="page-title">List Property</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- End page header -->

    <!-- property area -->
    <div class="properties-area recent-property" style="background-color: #FFF;">
        <div class="container">
            <div class="row">
                <div class="col-md-9 padding-top-40 properties-page">
                    <div class="section clear">
                        <div class="col-xs-10 page-subheader sorting pl0">
                            <ul class="sort-by-list">
                                <li class=" {!! $request->sort_by == 'asc' ? 'active' : '' !!}">
                                    @if ($request->sort_by == 'asc')
                                        <a href="{!! route('property', array_merge(request()->query(), ['sort_by' => 'desc'])) !!}" class="order_by_price"
                                            data-orderby="property_price" data-order="DESC">
                                            Property Price <i class="fa fa-sort-amount-desc"></i>
                                        </a>
                                    @else
                                        <a href="{!! route('property', array_merge(request()->query(), ['sort_by' => 'asc'])) !!}" class="order_by_date"
                                            data-orderby="property_price" data-order="ASC">
                                            Property Price <i class="fa fa-sort-amount-asc"></i>
                                        </a>
                                    @endif
                                </li>
                            </ul><!--/ .sort-by-list-->
                            <div class="items-per-page">
                                <label for="items_per_page"><b>Property per page :</b></label>
                                <div class="sel">
                                    <select id="perPage">
                                        <option value="{!! route('property', array_merge(request()->query(), ['per_page' => 10])) !!}" {!! $request->per_page == 10 ? 'selected' : '' !!}>10</option>
                                        <option value="{!! route('property', array_merge(request()->query(), ['per_page' => 50])) !!}" {!! $request->per_page == 50 ? 'selected' : '' !!}>50</option>
                                        <option value="{!! route('property', array_merge(request()->query(), ['per_page' => 100])) !!}" {!! $request->per_page == 100 ? 'selected' : '' !!}>100</option>
                                    </select>
                                </div><!--/ .sel-->
                            </div><!--/ .items-per-page-->
                        </div>
                        <div class="col-xs-2 layout-switcher">
                            <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                            <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                        </div><!--/ .layout-switcher-->
                    </div>

                    <div class="section clear">
                        <div id="list-type" class="proerty-th">
                            @foreach ($properties as $property)
                                <div class="col-sm-6 col-md-4 p0">
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
                                                <img
                                                    src="{{ asset('assets/img/icon/shawer.png') }}">({{ $property->bathrooms }})
                                            </div>
                                            @if (auth()->check())
                                                <a class="favouriteProperty" data-href="{!! route('favourite.property', $property->id) !!}">
                                                    <i class="fa {!! in_array($property->id, $favourite_properties) ? 'fa-heart' : 'fa-heart-o' !!}"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}" class="favorite-button"
                                                    data-property-id="{{ $property->id }}">
                                                    <i class="fa fa-heart-o"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="section">
                        <div class="pull-right">
                            <div class="pagination">
                                {{ $properties->links() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 pl0 padding-top-40">
                    <div class="blog-asside-right pl0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Smart search</h3>
                            </div>
                            <div class="panel-body search-widget">
                                <form action="{{ route('property') }}" method="GET" class=" form-inline">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <input type="text" class="form-control" placeholder="Key word">
                                            </div>
                                            <div class="col-xs-6">

                                                <select id="lunchBegins" class="selectpicker"
                                                    data-live-search-style="begins" title="Select Category">

                                                    @foreach (App\Models\Category::pluck('name', 'id')->toArray() as $id => $name)
                                                        <option value="{!! $id !!}">{!! $name !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset>
                                        <div class="row">

                                            <div class="col-xs-6">

                                                <select id="lunchBegins" class="selectpicker"
                                                    data-live-search-style="begins" title="Select Sub Category">

                                                    {{-- @foreach (App\Models\Category::pluck('name', 'id')->toArray() as $id => $name)
                                                <option value="{!! $id !!}">{!! $name !!}</option>
                                            @endforeach --}}
                                                </select>
                                            </div>
                                            <div class="col-xs-6">

                                                <select id="lunchBegins" class="selectpicker" data-live-search="true"
                                                    data-live-search-style="begins" title="Select Area">

                                                    @foreach (App\Models\Area::pluck('area', 'id')->toArray() as $id => $area)
                                                        <option value="{!! $id !!}">{!! $area !!}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <label for="price-range">Price range (₹):</label>
                                                <input type="text" class="span2" value=""
                                                    data-slider-min="100000" data-slider-max="100000000"
                                                    data-slider-step="500000" data-slider-value="[5000000,50000000]"
                                                    id="price-range"><br />
                                                <b class="pull-left color">100000₹</b>
                                                <b class="pull-right color">100000000₹</b>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <label for="price-range">BHK :</label>
                                                <input type="text" class="span2" value="" data-slider-min="1"
                                                    data-slider-max="6" data-slider-step="1" data-slider-value="[2,5]"
                                                    id="min-baths"><br />
                                                <b class="pull-left color">1</b>
                                                <b class="pull-right color">6</b>
                                            </div>

                                            <div class="col-xs-6">
                                                <label for="property-geo">Bathroom :</label>
                                                <input type="text" class="span2" value="" data-slider-min="1"
                                                    data-slider-max="6" data-slider-step="1" data-slider-value="[2,5]"
                                                    id="min-bed"><br />
                                                <b class="pull-left color">1</b>
                                                <b class="pull-right color">6</b>

                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="padding-5">
                                        <div class="row">
                                            @foreach (App\Models\Amenity::pluck('name', 'id')->toArray() as $id => $name)
                                                <div class="col-xs-6">
                                                    <div class="checkbox">
                                                        <label> <input type="checkbox" name="amenities[]"
                                                                value="{{ $id }}">
                                                            {{ $name }}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <input class="button btn largesearch-btn" value="Search" type="submit">
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function() {

            jQuery("#perPage, #sortBy").on('change', function() {
                window.location.href = jQuery(this).val();
            });

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
