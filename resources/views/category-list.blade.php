<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    @include('masters.navbar')
    <section style="padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 m-auto">
                    <div class="card">
                        <div class="card-header">
                            All Category                           
                            <a href="{{route('product.add')}}" class="btn btn-success float-right">Add New Product</a>
                            <a href="{{route('category.add')}}" class="btn btn-success float-right mr-2">Add New Category</a>
                        </div>
                        <div class="card-body">
                            @if (Session::has('category_deleted'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('category_deleted')}}
                                    <button type="button" class="close text-danger" data-dismiss="alert">×</button>
                                </div>
                            @endif
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>

                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{$item->cname}}</td>

                                            <td>
                                                <a href="/edit-category/{{$item->id}}" class="btn btn-info">Edit</a>
                                                <a href="/delete-category/{{$item->id}}" class="btn btn-danger">Delete</a>
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>