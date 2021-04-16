<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Category</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <section style="padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            Edit Category
                        </div>
                        <div class="card-body">
                            @if (Session::has('category_updated'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('category_updated')}}
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div>
                            @endif
                            <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="cname">Category Name</label>
                                    <input type="hidden" name="id" value="{{$category->id}}">
                                    <input type="text" name="cname" value="{{$category->cname}}" class="form-control" placeholder="Enter Product Name">
                                </div>
                                <button type="submit" class="btn btn-primary">Update Category</button>
                                <a href="{{route('category.fetch')}}" class="btn btn-success float-right">All Category</a>
                            </form>
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