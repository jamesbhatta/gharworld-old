@extends('layouts.admin')

@section('content')

<div class="container">
    <div>
        <h5 class="page-title">Contact</h5>
    </div>
    <div class="white p-4">
        @include('partials.alerts')

        <form action="{{ route('admin.contact.update') }}" method="POST" class="form" enctype="form-data/multipart">
            @csrf
            @method('post')
            <div class="form-group">
                <label for="">Address:</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $contact->address) }}">
            </div>
            <div class="form-group">
                <label for="">Phone:</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $contact->phone) }}">
            </div>
            <div class="form-group">
                <label for="">Phone Secondary:</label>
                <input type="text" name="phone_sec" class="form-control" value="{{ old('phone_sec', $contact->phone_sec) }}">
            </div>
            <div class="form-group">
                <label for="">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $contact->email) }}">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary z-depth-0">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
