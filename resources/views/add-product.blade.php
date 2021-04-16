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
                            @if (Session::has('product_added'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('product_added')}}
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                </div>
                            @endif
                            <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                <div class="form-group">
                                    <label for="pname">Product Name</label>
                                    <input type="text" name="pname" value="{{old('pname')}}" class="form-control" placeholder="Enter Product Name">
                                    @error('pname')
                                        <span class="text-danger font-weight-light">{{$message}}</span>        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pprice">Product Price</label>
                                    <input type="text" name="pprice" value="{{old('pprice')}}" class="form-control" placeholder="Enter Product Price">
                                    @error('pprice')
                                        <span class="text-danger font-weight-light">{{$message}}</span>        
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pcategory">Product Category</label>
                                    <select name="pcategory" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->cname}}</option>                                            
                                        @endforeach
                                    </select>
                                    @error('pcategory')
                                        <span class="text-danger font-weight-light">{{$message}}</span>        
                                    @enderror
                                    
                                    {{-- <input type="text" name="pcategory" id="pcategory" class="form-control" placeholder="Enter Product Category"> --}}
                                </div>
                                <div class="form-group">
                                    <label for="file">Product Image</label>
                                    <input type="file" name="file" id="file" class="form-control" onchange="previewfile(this)">
                                    @error('file')
                                        <span class="text-danger font-weight-light">{{$message}}</span>        
                                    @enderror
                                    <img src="#" id="previewImg" value="{{old('file')}}" style="max-width: 110px; margin-top:20px;" />
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{route('product.fetch')}}" class="btn btn-success float-right">All Product</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function previewfile(input){
            var file = $("input[type=file]").get(0).files[0];
            if (file){
                var reader = new FileReader();
                reader.onload = function(){
                    $('#previewImg').attr("src",reader.result);
                }
            }
            reader.readAsDataURL(file);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>