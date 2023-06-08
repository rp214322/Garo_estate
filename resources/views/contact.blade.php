@extends('layouts.app')

@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Contact</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="" id="contact1">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3><i class="fa fa-map-marker"></i> Address</h3>
                            <p>13/25 shibuia
                                <br>Tokyo
                                <br>45Y 73J
                                <br>
                                <strong>Japan</strong>
                            </p>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-4">
                            <h3><i class="fa fa-phone"></i> Call center</h3>
                            <p class="text-muted">This number is toll free if calling from
                                Great Britain otherwise we advise you to use the electronic
                                form of communication.</p>
                            <p><strong>+33 555 444 333</strong></p>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-4">
                            <h3><i class="fa fa-envelope"></i> Electronic support</h3>
                            <p class="text-muted">Please feel free to write an email to us or to use our electronic ticketing system.</p>
                            <ul>
                                <li><strong><a href="mailto:">info@company.com</a></strong>   </li>
                                <li><strong><a href="#">Ticketio</a></strong> - our ticketing support platform</li>
                            </ul>
                        </div>
                        <!-- /.col-sm-4 -->
                    </div>
                    <h2>Contact us</h2>
                    @include('shared.flash')
                    <form action="{{ route('store.inquiry') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Firstname</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="firstname*" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Lastname</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="lastname" >
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email*"  email>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="contact no">Contact no</label>
                                    <input type="number" class="form-control" id="contact_no" name="contact_no" placeholder="contact no*" >
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" class="form-control" name="description" placeholder="description*" ></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send message</button>
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
