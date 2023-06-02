@extends('layouts.app')
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{ $property->title }}</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">

        <div class="clearfix padding-top-40" >

            <div class="col-md-8 single-property-content prp-style-2">
                <div class="">
                    <div class="row">
                        <div class="light-slide-item">
                            <div class="clearfix">
                                <div class="favorite-and-print">
                                    <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                    <a class="printer-icon " href="javascript:window.print()">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>

                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    @foreach ($property->gallery as $photo)
                                    <li data-thumb="{{ $photo->file_url('thumb') }}">
                                        <img src="{{ $photo->file_url() }}" />
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-property-wrapper">

                        <div class="section">
                            <h4 class="s-property-title">Address</h4>
                            <div class="s-property-content">
                                {{ $property->address }}
                            </div>
                        </div>

                        <div class="section">
                            <h4 class="s-property-title">Description</h4>
                            <div class="s-property-content">
                                {{ $property->description }}
                            </div>
                        </div>
                        <!-- End description area  -->



                        <div class="section property-features">

                            <h4 class="s-property-title">Amenities</h4>
                            <ul>
                                @foreach ($property->amenities as $amenity )
                                    <li>
                                        {{ $amenity }}
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                        <!-- End features area  -->


                        <!-- End video area  -->


                        <!-- End video area  -->
                    </div>
                </div>


            </div>

            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right property-style2">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">
                                <div class="single-property-header">
                                    <h1 class="property-title">{{ $property->title }}</h1>
                                    <span class="property-price">₹{{ $property->price }}</span>
                                </div>

                                <div class="property-meta entry-meta clearfix ">

                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info-icon icon-tag">
                                            <img src="{{ asset('assets/img/icon/sale-orange.png') }}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-label">Status</span>
                                            <span class="property-info-value">{{ $property->status ? "Sold" : "For sale" }}</span>
                                        </span>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info icon-area">
                                            <img src="{{ asset('assets/img/icon/room-orange.png') }}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-label">Area</span>
                                            <span class="property-info-value">{{ $property->sq_ft }}<b class="property-info-unit">Sq Ft</b></span>
                                        </span>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info-icon icon-bed">
                                            <img src="{{ asset('assets/img/icon/bed-orange.png') }}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-label">BHK</span>
                                            <span class="property-info-value">{{ $property->bhk }}</span>
                                        </span>
                                    </div>

                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info-icon icon-bath">
                                            <img src="{{ asset('assets/img/icon/cars-orange.png') }}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-label">Bathrooms</span>
                                            <span class="property-info-value">{{ $property->bathrooms }}</span>
                                        </span>
                                    </div>



                                </div>
                                {{-- <div class="dealer-section-space">
                                    <span>Dealer information</span>
                                </div> --}}
                                {{-- <div class="clear">
                                    <div class="col-xs-4 col-sm-4 dealer-face">
                                        <a href="">
                                            <img src="assets/img/client-face1.png" class="img-circle">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 ">
                                        <h3 class="dealer-name">
                                            <a href="">Nathan James</a>
                                            <span>Real Estate Agent</span>
                                        </h3>
                                        <div class="dealer-social-media">
                                            <a class="twitter" target="_blank" href="">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="facebook" target="_blank" href="">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a class="gplus" target="_blank" href="">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                            <a class="linkedin" target="_blank" href="">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a class="instagram" target="_blank" href="">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div>

                                    </div>
                                </div> --}}

                                {{-- <div class="clear">
                                    <ul class="dealer-contacts">
                                        <li><i class="pe-7s-map-marker strong"> </i> 9089 your adress her</li>
                                        <li><i class="pe-7s-mail strong"> </i> email@yourcompany.com</li>
                                        <li><i class="pe-7s-call strong"> </i> +1 908 967 5906</li>
                                    </ul>
                                    <p>Duis mollis  blandit tempus porttitor curabiturDuis mollis  blandit tempus porttitor curabitur , est non…</p>
                                </div> --}}

                            </div>
                        </div>
                    </div>



                    <div class="panel panel-default sidebar-menu wow fadeInRight animated" >
                        <div class="panel-heading">
                            <h3 class="panel-title">Inquiry</h3>
                        </div>
                        <div class="panel-body search-widget">
                            @include('shared.flash')
                            <form action="{{ route('store.inquiry') }}" method="POST" class=" form-inline">
                                @csrf
                                <input type="hidden" name="property_id" value="{{ $property->id }}">
                                @if (Auth::check())
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                @endif
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="firstname*" value="{!! Auth::check() ? Auth::user()->first_name : '' !!}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="lastname" value="{!! Auth::check() ? Auth::user()->last_name : '' !!}" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email*" value="{!! Auth::check() ? Auth::user()->email : '' !!}" required email>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact no">Contact no</label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="contact no*" value="{!! Auth::check() ? Auth::user()->contact_no : '' !!}" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" placeholder="description*" required></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div>

                </aside>
            </div>

        </div>

    </div>
</div>
@endsection
