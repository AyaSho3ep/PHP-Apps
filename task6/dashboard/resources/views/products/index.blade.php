@extends('layouts.parent')
@yield('title', 'index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Creation Date</th>
                                    <th>Last Update Date</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name_en }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }}</td>
                                    <td>{{ $product->status }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <a href="{{route('dashboard.products.edite',$product->id )}}" class="btn btn-outline-primary">Edite</a>
                                        <form action="{{route('dashboard.products.delete',$product->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" > Delete </button>
                                        </form>
                                    </td>

                                </tr>

                                @endforeach


                </table>


            </div>
        </div>
    </div>
@endsection
