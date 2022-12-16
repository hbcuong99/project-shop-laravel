@extends('admin.main')

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label>Slider Name</label>
                <input type="text" name="name" value="{{ $slider->name }}" class="form-control" placeholder="Enter name slider">
            </div>

            <div class="form-group">
                <label>URL</label>
                <input type="text" name="url" value="{{ $slider->url }}" class="form-control" placeholder="Enter link url">
            </div>

            <div class="form-group">
                <label>Image product</label>
                <input type="file" name="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $slider->thumb }}">
                        <img src="{{ $slider->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $slider->thumb }}" id="thumb">
            </div>

            <div class="form-group">
                <label>Sort</label>
                <input type="text" name="sort_by" value="{{ $slider->sort_by }}" class="form-control" placeholder="Enter sort by">
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                    {{ $slider->active == 1 ? 'checked' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                    {{ $slider->active == 0 ? 'checked' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Slider</button>
        </div>
        @csrf
    </form>
@endsection

