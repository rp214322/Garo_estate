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
                            <li class=" {!! $request->sort_by == "asc" ? 'active' : '' !!}">
                                @if ($request->sort_by == "asc")
                                <a href="{!! route('property',array_merge(request()->query(), ['sort_by' => 'desc'])) !!}" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    Property Price <i class="fa fa-sort-amount-desc"></i>
                                </a>
                                @else
                                <a href="{!! route('property',array_merge(request()->query(), ['sort_by' => 'asc'])) !!}" class="order_by_date" data-orderby="property_price" data-order="ASC">
                                    Property Price <i class="fa fa-sort-amount-asc"></i>
                                </a>
                                @endif
                            </li>
                        </ul><!--/ .sort-by-list-->
                        <div class="items-per-page">
                            <label for="items_per_page"><b>Property per page :</b></label>
                            <div class="sel">
                                <select id="perPage">
                                    <option value="{!! route('property',array_merge(request()->query(), ['per_page' => 10])) !!}" {!! $request->per_page == 10 ? 'selected' : '' !!}>10</option>
                                    <option value="{!! route('property',array_merge(request()->query(), ['per_page' => 50])) !!}" {!! $request->per_page == 50 ? 'selected' : '' !!}>50</option>
                                    <option value="{!! route('property',array_merge(request()->query(), ['per_page' => 100])) !!}" {!! $request->per_page == 100 ? 'selected' : '' !!}>100</option>
                                </select>
                            </div><!--/ .sel-->
                        </div><!--/ .items-per-page-->
                    </div>
                </div>

                <div class="section clear">
                    <div id="list-type" class="proerty-th">
                        @foreach ($properties as $property )


                        <div class="col-sm-6 col-md-4 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{!! route('viewproperty',$property->slug) !!}"><img src="{!! $property->feature_image ? $property->feature_image->file_url('thumb') : asset('images/ImageNotFound.jpeg') !!}"></a>
                                </div>

                                <div class="item-entry overflow">
                                    <h5><a href="{!! route('viewproperty',$property->slug) !!}">{!! $property->title !!}</a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b> Area :</b> {{ $property->sq_ft }} </span>
                                    <span class="proerty-price pull-right">₹ {{ $property->price }}</span>
                                    <p style="display: none;">{{ $property->description }}</p>
                                    <div class="property-icon">
                                        <img src="{{ asset('assets/img/icon/bed.png') }}">({{ $property->bhk }})|
                                        <img src="{{ asset('assets/img/icon/shawer.png') }}">({{ $property->bathrooms }})
                                    </div>
                                    <a class="favouriteProperty" data-href="{!! route('favourite.property',$property->id) !!}"><i class="fa {!! in_array($property->id,$favourite_properties) ? 'fa-heart' : 'fa-heart-o' !!}"></i></a>
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
<script>
    jQuery(document).ready(function(){

        jQuery("#perPage, #sortBy").on('change',function(){
            window.location.href = jQuery(this).val();
        });

        jQuery(".favouriteProperty").on("click",function(e){
            jQuery('#preloder, .loader').show();
            e.preventDefault();
            var _this = jQuery(this);
            $.ajax({
                type: "GET",
                url: _this.data('href'),
            })
            .done(function (data) {
                jQuery(_this).find("i").toggleClass('fa-heart-o').toggleClass('fa-heart');
                jQuery('#preloder, .loader').hide();
            }).fail(function (error) {
                jQuery('#preloder, .loader').hide();
                console.log(error);
            });
        });
    });
</script>
@endsection

