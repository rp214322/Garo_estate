@extends('layouts.app')

@section('content')
<div class="page-head">
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title">Hello : <span class="orange strong">{!! Auth::user()->first_name !!}</span></h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- End page header -->

        <!-- property area -->
        <div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 profiel-container">
                        @include('shared.flash')
                        <form action="{{ route('update.profile') }}" method="POST">
                            <div class="profiel-header">
                                <h3>
                                    <b>BUILD</b> YOUR PROFILE <br>
                                    <small>This information will let us know more about you.</small>
                                </h3>
                                <hr>
                            </div>






                            </div>

                            <div class="clear">



                                <div class="col-sm-5 col-sm-offset-1">
                                    <div class="form-group">
                                        <label>First_Name</label>
                                        <input name="first_name" type="text" class="form-control" placeholder="first_name" {!! Auth::check() ? Auth::user()->first_name : '' !!}>
                                    </div>
                                    <div class="form-group">
                                        <label>Last_Name</label>
                                        <input name="last_name" type="text" class="form-control" placeholder="last_name" {!! Auth::check() ? Auth::user()->last_name : '' !!}>
                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Public email :</label>
                                        <input name="p-email" type="email" class="form-control" placeholder="p-email@rmail.com" {!! Auth::check() ? Auth::user()->email : '' !!}>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone :</label>
                                        <input name="Phone" type="text" class="form-control" placeholder="+1 9090909090" {!! Auth::check() ? Auth::user()->contact_no : '' !!}>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-5 col-sm-offset-1">
                                <br>
                                <input type='button' class='btn btn-finish btn-primary' name='finish' value='Finish' />
                            </div>
                            <br>
                    </form>

                </div>
            </div><!-- end row -->

        </div>
    </div>
@endsection
