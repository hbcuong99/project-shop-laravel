@extends('admin.main')

@section('head')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
@endsection
@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label>Post Name</label>
                <input type="text" name="name" value="{{ $post->name }}" class="form-control" placeholder="Enter name post">
            </div>

            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id" {{ $post->parent_id == 0 ? 'selected' : '' }}>
                    @foreach($posts as $postParent)
                        <option value="{{ $postParent->id }}"
                            {{ $post->parent_id == $postParent->id ? 'selected' : '' }}>
                            {{ $postParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $post->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Detailed Description</label>
                <textarea name="content" class="form-control">{{ $post->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" {{ $post->active == 1 ? 'checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Yes</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" {{ $post->active == 0 ? 'checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">No</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
