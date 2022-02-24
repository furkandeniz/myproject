@extends('admin.theme')
@section('content')
    <div class="container-fluid px-4">
        @if (isset($message))
            <div class="alert alert-danger mt-4" role="alert">{{ $message }}</div>
        @endif
            <form action="{{route('user-update-post')}}" method="post">
                @csrf
                <input class="hidden" name="user_id" style="display: none;" value="{{$userInfo->id }}"></input>
                <div class="form-group mt-10">
                    <label for="name">İsim</label>
                    <input type="text" class="form-control" id="name" name="first_name" aria-describedby="nameHelp" value="{{ $userInfo->first_name }}" required>
                </div>
                <div class="form-group mt-10">
                    <label for="lastname">Soyad</label>
                    <input type="text" class="form-control" id="lastname" name="last_name" value="{{ $userInfo->last_name }}" required>
                </div>
                <div class="form-group mt-10">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $userInfo->email }}" required>
                </div>
                <div class="form-group mt-10">
                    <label for="role">Rol</label>
                    <select class="form-control" id="role" name="role" required>
                        @if ($userInfo->role == 'superadmin')
                            <option selected = 'selected'>Süper Admin</option>
                        @else
                            <option>Süper Admin</option>
                        @endif
                        @if ($userInfo->role == 'Admin')
                                <option selected="selected">Admin</option>
                        @else
                            <option>Admin</option>
                        @endif
                        @if ($userInfo->role == 'editor')
                                <option selected="selected">Editör</option>
                        @else
                            <option>Editör</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-10">
                    <label for="password">Şifre</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Şifre" required>
                </div>
                <div class="form-group mt-10">
                    <label for="repassword">Şifre Tekrarı</label>
                    <input type="password" class="form-control" id="repassword" name="repassword" placeholder="Şifre Tekrarı" required>
                </div><br>
                <div class="form-group mt-10">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </form>
    </div>
@endsection
