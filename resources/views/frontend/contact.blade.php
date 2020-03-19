@extends('layouts.app')
@push('styles')
<style>
    .mail-icon {
        padding: 15px;
        background-color: #f8fafc;
        border: 2px solid rgba(0, 0, 0, 0.4);
        border-radius: 50%;
    }

</style>
@endpush
@section('content')
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-8 mb-5">
                <form action="#" class="px-5 pb-5 pt-3 bg-white border">
                    <div class="form-group">
                        <div class="d-flex">
                            <div class="pr-3 align-self-center">
                                <div class="mail-icon"><i class="far fa-envelope fa-3x"></i></div>
                            </div>
                            <div>
                                <h3 class="h3-reponsive font-weight-bold mb-0">Contact Us</h3>
                                <div class="lead p-0 font-small">
                                    Contact us about anything related to our company or service.
                                    <br>
                                    We will do our best to get back to you as soon as possible.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label class="font-weight-bold" for="fullname">Full Name</label>
                            <input type="text" id="fullname" class="form-control" placeholder="Full Name">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email Address">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="email">Subject</label>
                            <input type="text" id="subject" class="form-control" placeholder="Enter Subject">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Say hello to us"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Send Message" class="btn btn-primary  py-2 px-4 rounded-0">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h6 text-black mb-3 text-uppercase">Contact Info</h3>
                    <p class="mb-0 font-weight-bold">Address</p>
                    <p class="mb-4">{{ $contact->address }}</p>

                    <p class="mb-0 font-weight-bold">Phone</p>
                    <p class="mb-4">
                        {{ $contact->phone }}
                        <br>
                        {{ $contact->phone_sec }}
                    </p>

                    <p class="mb-0 font-weight-bold">Email Address</p>
                    <p class="mb-0"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
