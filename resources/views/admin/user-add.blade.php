@extends('admin.theme')
@section('content')
    <div class="container-fluid px-4">
        @if (isset($message))
            <div class="alert alert-danger mt-4" role="alert">{{ $message }}</div>
        @endif
        <form action="{{route('user-add-post')}}" method="post">
            @csrf
            <div class="form-group mt-10">
                <label for="name">İsim</label>
                <input type="text" class="form-control" id="name" name="first_name" aria-describedby="nameHelp" placeholder="İsim" required>
            </div>
            <div class="form-group mt-10">
                <label for="lastname">Soyad</label>
                <input type="text" class="form-control" id="lastname" name="last_name" placeholder="Soyad" required>
            </div>
            <div class="form-group mt-10">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group mt-10">
                <label for="role">Rol</label>
                <select class="form-control" id="role" name="role" required>
                        <option>Süper Admin</option>
                        <option>Admin</option>
                        <option>Editör</option>
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
                <button type="submit" class="btn btn-primary">Kaydet</button>
            </div>
        </form>
    </div>
@endsection
