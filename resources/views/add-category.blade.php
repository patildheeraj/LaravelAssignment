<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Product</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <section style="padding: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header text-center">
                            Add Student
                        </div>
                        <div class="card-body">
                            @if (Session::has('category_added'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('category_added')}}
                                    <button type="button" class="close text-success" data-dismiss="alert">×</button>
                                </div>
                            @endif
                            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="cname">Category Name</label>
                                    <input type="text" name="cname" id="pname" class="form-control" placeholder="Enter Product Name">
                                    @error('cname')
                                        <span class="text-danger font-weight-light">{{$message}}</span>        
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary">Add Category</button>
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