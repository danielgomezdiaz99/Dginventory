@extends('layouts.app')
@section('css')
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row text-center">
            <div class="col-12">
                <table id="ordersTable" class="table table-responsive table-hover">
                    <thead>
                    <tr>
                        <th data-column="id">
                            Referencia
                        </th>
                        <th data-column="status">
                            Estado
                        </th>
                        <th data-column="create_at">
                            Fecha
                        </th>
                        <th>
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @isset($orders)

                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>
                                    @if ($order->status == 1)
                                        Solicitado
                                    @elseif ($order->status == 2)
                                        Enviado
                                    @elseif ($order->status == 3)
                                        Recibido
                                    @endif
                                </td>
                                <td>{{ $order->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-link text-danger btn-delete"><i
                                            class="fas fa-trash-alt"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endisset
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" type="application/javascript"></script>
    <script src="{{ asset('storage/js/articles.js') }}"></script>
@endsection
