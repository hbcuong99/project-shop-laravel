@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter name product">
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" value="{{ old('price') }}" class="form-control" placeholder="Enter name price">
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Category</label>
                            <select class="form-control" name="menu_id">
                                <option value="0">Parent Product</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Price Sale</label>
                            <input type="text" name="price_sale" value="{{ old('price_sale') }}" class="form-control" placeholder="Enter name price sale">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" value="{{ old('description') }}" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" value="{{ old('content') }}" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label>Image product</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="no_active">
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create Product</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
