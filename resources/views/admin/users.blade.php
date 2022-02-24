@extends('admin.theme')
@section('content')
        <main>
            <div class="container container-fluid px-4">
                <div class="row">
                        <div class="col-6">
                            <h1 class="mt-4">Kullanıcılar</h1>
                        </div>
                        <div class="col-6" style="text-align: end">
                            <a href="{{ route('user-add') }}" class="btn btn-success btn-user-add mt-4">Kullanıcı Ekle</a>
                        </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Kullanıcı Listesi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                            <tr>
                                <th>İsim</th>
                                <th>Soyad</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Kayıt Tarihi</th>
                                <th>Durum</th>
                                <th>Güncelle</th>
                                <th>Sil</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>İsim</th>
                                <th>Soyad</th>
                                <th>Email</th>
                                <th>Rol</th>
                                <th>Kayıt Tarihi</th>
                                <th>Durum</th>
                                <th>Güncelle</th>
                                <th>Sil</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach ( $userList as $user)
                            <tr>
                                <td>{{ $user->first_name  }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->role }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>{{ $user->status }}</td>
                                <td><a class="btn btn-primary btn-update" href="{{ route('user-update', $user->id) }}">Güncelle</a></td>
                                <td><a class="btn btn-danger btn-delete" href="{{ route('user-delete', $user->id) }}">Sil</a></td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
@endsection
