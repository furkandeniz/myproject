@extends('admin.theme')
@section('content')
        <div class="container container-fluid px-4">
            <div class="row">
                <form action="{{route('user-delete-post')}}" method="post">
                    @csrf
                    <h3>Silinecek Kullanıcı:</h3>
                    <input type="hidden" name="user_id" style="display: none;" value="{{$userInfo->id}}">
                    <p>{{ $userInfo->first_name }} {{ $userInfo->last_name}}</p>
                    <button type="submit" class="btn btn-danger">Sil</button>
                </form>
            </div>
        </div>
@endsection
