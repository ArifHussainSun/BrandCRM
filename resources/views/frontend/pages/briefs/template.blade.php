@extends('frontend.layouts.brief.master')



@push('customStyles')
{!! $page->pages_header !!}

@endpush

@section('container')
{!! $contentWithBlade !!}


@endsection

@push('customScripts')
{!! $page->pages_footer !!}
@endpush