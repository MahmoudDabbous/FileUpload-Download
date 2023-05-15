@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <div>
                            <h5>{{ __('Your Dashboard') }}</h5>
                            <a href="{{ route('file.create') }}" target="" class="btn btn-primary" rel="">Add a
                                file</a>
                            <a href="{{ route('type.create') }}" target="" class="btn btn-primary" rel="">Add a
                                type</a>
                        </div>
                        <div>
                            <div class="mt-5 accordion" id="accordionExample">
                                @foreach ($types as $type)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header d-flex flex-row">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#{{ $type->name }}" aria-expanded="true"
                                                aria-controls="{{ $type->name }}">
                                                <strong>{{ $type->name }}</strong>
                                            </button>
                                            <form action="{{ route('type.download', $type) }}" method="POST">
                                                @csrf
                                                <button class=" btn btn-info">Download All</button>
                                            </form>
                                            <form action="{{ route('type.delete', $type) }}" method="POST">
                                                @csrf
                                                <button class=" btn btn-danger">Delete All</button>
                                            </form>
                                        </h2>
                                        <div id="{{ $type->name }}" class="accordion-collapse "
                                            data-bs-parent="#accordionExample">
                                            @foreach ($type->files as $file)
                                                <div class="accordion-body d-flex flex-row">
                                                    <strong>{{ $file->title }}</strong>
                                                    <div class="ms-auto d-flex flex-row">
                                                        <form class="ms-auto" action="{{ route('file.download', $file) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button class=" btn btn-info">Download</button>
                                                        </form>
                                                        <form class="ms-auto" action="{{ route('file.delete', $file) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button class=" btn btn-danger">delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
