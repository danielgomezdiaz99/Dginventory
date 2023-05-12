@extends('layouts.app')

@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
@endsection

@section('content')

    <main class="my-5 d-flex">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <a href="{{ route('subcategories.create') }}" class="btn btn-primary text-black">Crear Subcategoría</a>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-12">
                    <table id="subcategoriesTable" class="table table-responsive table-hover">
                        <thead>
                        <tr>
                            <th data-column="id">
                                ID
                            </th>
                            <th data-column="name">
                                Nombre
                            </th>

                            <th>
                                Disponible
                            </th>
                            <th>
                                Visible
                            </th>
                            <th>
                                Categoría
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($subcategories)
                            @foreach ($subcategories as $subcategory)
                                <tr>
                                    <td>{{ $subcategory->id }}</td>
                                    <td>{{ $subcategory->name }}</td>
                                    <td>{{ $subcategory->available}}</td>
                                    <td>{{ $subcategory->visible}}</td>
                                    <td>{{ $subcategory->category ? $subcategory->category->name : '-' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-link text-danger btn-delete"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="application/javascript"></script>
    <script src="{{ asset('storage/js/subcategories.js') }}"></script>
@endsection
