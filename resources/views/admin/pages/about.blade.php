@extends('layouts.admin')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
<style>
    .note-editor,
    .note-toolbar .btn {
        box-shadow: none;
    }

</style>
@endpush


@section('content')

<div class="container">
    <div class="white p-4">
        <div>
            <h5 class="page-title">About</h5>
        </div>
        @include('partials.alerts')

        <form action="{{ route('admin.about.update') }}" method="POST" class="form" enctype="form-data/multipart">
            @csrf
            @method('post')
            <div class="form-group">
                <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ old('description', $about->content) }}</textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary z-depth-0">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>

<script>
    $(function() {
        $(function() {
            $('#content').summernote({
                placeholder: 'Content goes here...'
                , tabsize: 2
                , height: 500
            });
        });
    });

</script>
@endpush
