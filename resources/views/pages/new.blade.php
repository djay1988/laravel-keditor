@extends('layouts.main')
@section('styles')
    
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="{{ route('editor') }}">Back to Pages</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div data-keditor="html">
                <div id="content-area"></div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    
@endsection

@section('script')
<script type="text/javascript" data-keditor="script">
    $(function () {
        $('#content-area').keditor({
            snippetsUrl:"{{ asset('assets/plugins/editor-1.7/snippets/snippets.blade.html') }}"
        });
    });
</script>
@endsection