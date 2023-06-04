@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
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
                            <th data-column="stock">
                                Stock
                            </th>
                        <th data-column="subcategory">
                            Subcategoría
                        </th>
                        <th>
                            Imagen
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
                                <td>{{ $article->stock }}</td>
                                <td>{{ $article->subcategory ? $article->subcategory->name : 'Sin subcategoría' }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="Imagen del artículo"
                                         class="img-fluid rounded" style="width: 50px; height: 50px;">
                                </td>
                                <td>{{ $article->available }}</td>
                                <td>{{ $article->visible }}</td>
                                <td>{{ $article->status }}</td>
                                <td>
                                    <button type="button" class="btn btn-link text-danger btn-delete"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('articles.create') }}" class="btn btn-primary text-black m-3">Crear
                            Artículo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('storage/js/articles.js') }}"></script>
@endsection
