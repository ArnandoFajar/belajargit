@extends('template.container')

@section('style')
<link rel="stylesheet" href="{{asset('style/style.css')}}">
@endsection

@section('content')
<div class="container mt-5">
<h1>Product List</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $Data2)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$Data2->product_name}}</td>
            <td>{{$Data2->category->name}}</td>
            <td>{{$Data2->price}}</td>
            <td>{{$Data2->stock}}</td>
            <td>
                <a href="/edit/{{$Data2->id}}" class="btn btn-success">Edit</a>
                <form id="form2" action="/delete/{{$Data2->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>  
@endsection