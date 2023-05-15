@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Title</div>
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
                        <form method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="titleInput" class="form-label">File Title</label>
                                <input name="title" type="text" class="form-control" id="titleInput"
                                    aria-describedby="fileTitle">
                            </div>
                            <label for="typeInput" class="form-label">File Title</label>
                            <select name="type" id="typeInput" class="form-select mb-3">
                                
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Upload File</label>
                                <input name="file" class="form-control" type="file" id="formFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
