@extends('admin.theme')
@section('content')
    <main>
        <div class="container container-fluid px-4">
            <div class="row">
                <div class="col-6">
                    <h1 class="mt-4">Roller</h1>
                </div>
                <div class="col-6" style="text-align: end">
                    <a href="{{ route('role-add') }}" class="btn btn-success btn-user-add mt-4">Rol Ekle</a>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Rol Listesi
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Rol Adı</th>
                            <th>Durum</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Rol Adı</th>
                            <th>Durum</th>
                            <th>Güncelle</th>
                            <th>Sil</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach ($roleList as $role)
                            <tr>
                                <td>{{$role->name}}</td>
                                <td> {{$role->status}} </td>
                                <td><a class="btn btn-primary btn-update" href="{{ route('role-update', $role->id)  }}">Güncelle</a></td>
                                <td><a class="btn btn-danger btn-delete" href="{{route('role-delete', $role->id)}}">Sil</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
