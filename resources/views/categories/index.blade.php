@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

    <main class="my-5 d-flex">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <table id="categoriesTable" class="table table-responsive table-hover">
                        <thead>
                        <tr>
                            <th data-column="id">
                                ID
                            </th>
                            <th data-column="name">
                                Nombre
                            </th>

                            <th data-column="available">
                                Disponible
                            </th>
                            <th data-column="visible">
                                Visible
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($categories)
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->available}}</td>
                                    <td>{{ $category->visible}}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary text-black">Crear Categoría</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="application/javascript"></script>
    <script src="{{ asset('storage/js/categories.js') }}"></script>
@endsection

