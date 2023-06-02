@extends('layouts.app')
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Favourite Property</h1>
            </div>
        </div>
    </div>
</div>
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-9 padding-top-40 properties-page">
                <div class="section clear">
                    <div id="list-type" class="proerty-th">
                    @foreach ($properties as $property )


                    <div class="col-sm-6 col-md-3 p0">
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
                                <a class="favouriteProperty" data-href="{!! route('favourite.property',$property->id) !!}"><i class="fa fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                        @endforeach
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
        jQuery(".favouriteProperty").on("click",function(e){
            jQuery('#preloder, .loader').show();
            e.preventDefault();
            var url = jQuery(this).data('href');
            $.ajax({
                type: "GET",
                url: url,
            })
            .done(function (data) {
                jQuery('#preloder, .loader').hide();
                window.location.reload();
            }).fail(function (error) {
                jQuery('#preloder, .loader').hide();
                console.log(error);
            });
        });
    });
</script>
@endsection
