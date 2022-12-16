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
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="Enter name product">
                            </div>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="price" value="{{ $product->price }}" class="form-control" placeholder="Enter name price">
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Product Category</label>
                            <select class="form-control" name="menu_id">
                                <option>Parent Product</option>
                                @foreach($menus as $menu)
                                    <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : ''}}>
                                        {{ $menu->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- /.form-group -->
                        <div class="form-group">
                            <label>Price Sale</label>
                            <input type="text" name="price_sale" value="{{ $product->price_sale }}" class="form-control" placeholder="Enter name price sale">
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Image product</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->thumb }}" target="_blank">
                        <img src="{{ $product->thumb }}" width="100px">

                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $product->active == 1 ? 'checked' : '' }}
                    >
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="no_active"
                        {{ $product->active == 0 ? 'checked' : '' }}
                    >
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Product</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
