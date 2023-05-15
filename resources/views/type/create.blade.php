@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New file</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="py-3">
                                <ul>
                                    @foreach ($errors->all() as $msg)
                                        <li>{{ $msg }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('type.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="titleInput" class="form-label">File Title</label>
                                <input name="name" type="text" class="form-control" id="titleInput"
                                    aria-describedby="fileTitle">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
