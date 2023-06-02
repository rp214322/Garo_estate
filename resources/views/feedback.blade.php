@extends('layouts.app')

@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Feedback</h1>
            </div>
        </div>
    </div>
</div>
<div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="" id="contact1">
                    <h2>Feedback</h2>
                    @include('shared.flash')
                    <form action="{{ route('store.feedback') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="rateInput"><b>Rating</b></label>
                                    <div class="my-rating"></div>
                                    <input type="hidden" name="rating" id="rateInput">
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" placeholder="description"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send Feedback</button>
                            </div>
                        </div>
                        <!-- /.row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
