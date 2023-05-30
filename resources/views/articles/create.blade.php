@extends('layouts.app')

@section('content')
    <div class="my-5">
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nombreArticulo" class="form-label">Nombre del artículo</label>
                <input type="text" class="form-control" id="nombreArticulo" name="nombreArticulo">
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="text" class="form-control" id="stock" name="stock" placeholder="0">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <select class="form-select" id="categoria" name="categoria">
                    <option value="">Selecciona una categoría</option>
                    @foreach($categories as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="subcategoria" class="form-label">Subcategoría</label>
                <select class="form-select" id="subcategoria" name="subcategoria" aria-label="subcategoría" disabled>
                    <option selected>Selecciona primero una categoría</option>
                </select>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="available" name="available">
                <label class="form-check-label" for="flexCheckDefault">
                    Disponible
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="visible" name="visible">
                <label class="form-check-label" for="flexCheckChecked">
                    Visible
                </label>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <textarea class="form-control" id="estado" name="estado" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-primary text-black">Guardar</button>
        </form>
    </div>
@endsection
@section('js')
    <script src="{{ asset('storage/js/articles.js') }}"></script>
@endsection


