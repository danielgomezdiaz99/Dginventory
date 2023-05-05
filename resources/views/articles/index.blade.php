@extends('layouts.app')
@section('css')
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.19/dist/sweetalert2.min.js"></script>

@endsection
@section('content')

    <main class="my-5 d-flex">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-12">
                    <table id="articlesTable" class="table table-responsive table-hover">
                        <thead>
                        <tr>
                            <th data-column="id">
                                ID
                            </th>
                            <th data-column="name">
                                Nombre
                            </th>
                            <th data-column="subcategory">
                                Subcategoría
                            </th>
                            <th data-column="available">
                                Disponible
                            </th>
                            <th data-column="visible">
                                Visible
                            </th>
                            <th data-column="status">
                                Estado
                            </th>
                            <th>
                                Acciones
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @isset($articles)
                            @foreach ($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->name }}</td>
                                    <td>{{ $article->subcategory ? $article->subcategory->name : 'Sin subcategoría' }}</td>
                                    <td>{{ $article->available }}</td>
                                    <td>{{ $article->visible }}</td>
                                    <td>{{ $article->status }}</td>
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
                            <a href="{{ route('articles.create') }}" class="btn btn-primary text-black m-3">Crear Artículo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="application/javascript"></script>
    <script src="{{ asset('storage/js/articles.js') }}"></script>

@endsection
