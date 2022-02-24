@extends('admin.theme')
@section('content')
    <div class="container-fluid px-4">
        @if (isset($message))
            <div class="alert alert-danger mt-4" role="alert">{{ $message }}</div>
        @endif
        <form action="{{route('role-add-post')}}" method="post">
            @csrf
            <div class="form-group mt-10">
                <label for="name">Rol Adı</label>
                <input type="text" class="form-control" id="name" name="role_name" aria-describedby="nameHelp" placeholder="Rol Adı" required>
            </div>
            <div class="form-group mt-10">
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
@endsection
