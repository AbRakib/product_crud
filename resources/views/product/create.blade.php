@extends('welcome')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Products Module</h1>
        <a href="{{route('dashboard')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Back To Dashboard</a>
    </div>

    <!-- Content Row -->
    <div class="container-fluid">

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Product Category</label>
                                <select name="category_id" id="category_id" class=" form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Product Price</label>
                                <input type="number" class="form-control" name="price" id="price" placeholder="Product Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Product Quantity</label>
                                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Product Quantity" required>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection