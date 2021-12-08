@extends('admin.layouts.home')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>

                @foreach ($errors->all() as $error)
                    <li class="alert alert-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="form-actual" enctype="multipart/form-data" class="row"
        action="{{ route('admin.actual.update', $actual) }}" method="post">
        @csrf
        @method('PUT')
        @include('admin.components.actual.fields')
    </form>
@endsection
