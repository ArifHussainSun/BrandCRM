@extends('admin.layouts.main')
@section('container')
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">ADD NEW PORTFOLIO</h4>
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                    Session::forget('success');
                    @endphp
                </div>
                @endif
                <form action="{{ route('portfolio.store.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong><label for="horizontal-short_address-input" class="col-sm-3 col-form-label">Service/Industry</label></strong>
                                            <div class="col-sm-12">
                                                <select class="form-control select2" name="service_id" id="service_id">
                                                    <option value="" Selected disabled>Select Service/Industry</option>
                                                    @forelse($services as $service)
                                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                                    @empty
                                                    @endforelse
                                                </select>
                                                @if ($errors->has('service_id'))
                                                <span class="text-danger">{{ $errors->first('service_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <strong><label for="horizontal-name-input" class="col-sm-6 col-form-label">Category</label></strong>
                                            <select class="form-control select2" name="category_id" id="categories">
                                                <option value="" selected disabled>Select Category</option>
                                                @forelse($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @if ($errors->has('category_id'))
                                            <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <strong><label for="horizontal-name-input" class="col-sm-6 col-form-label">Sub Category</label></strong>
                                            <select class="form-control select2" name="sub_categories_id" id="sub_categories">
                                                <option value="" selected disabled>Select Sub Category</option>
                                                @forelse($subcategories as $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                            @if ($errors->has('sub_categories_id'))
                                            <span class="text-danger">{{ $errors->first('sub_categories_id') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6">
                                            <strong><label for="name" class="col-sm-3 col-form-label">Name</label></strong>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name here">
                                                @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <strong><label for="horizontal-title-input" class="col-sm-3 col-form-label">Title</label></strong>
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="title" id="horizontal-title-input" placeholder="Enter Title here">
                                                @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong><label for="description" class="col-sm-3 col-form-label">Description</label></strong>
                                            <div class="col-sm-12">
                                                <textarea class="form-control desc" name="description" id="summernote"></textarea>
                                                @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br />
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body" style="margin-top: 2%">
                                    <label for="image" class="control-label">Image</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                    @if ($errors->has('image'))
                                                <span class="text-danger">{{ $errors->first('image') }}</span>
                                                @endif
                                    <div class="invalid-feedback">
                                        Please upload icon image.
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body" style="margin-top: 2%">
                                    <label for="popup" class="control-label">Popup Image</label>
                                    <input type="file" class="form-control" name="popup" id="popup">
                                    @if ($errors->has('popup'))
                                                <span class="text-danger">{{ $errors->first('popup') }}</span>
                                                @endif
                                    <div class="invalid-feedback">
                                        Please upload Popup image or video.
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <strong><label for="horizontal-video_link-input" class="col-sm-6 col-form-label">Video Link</label></strong>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="video_link" id="video_link" placeholder="Enter Video Link here">                                          
                                              @if ($errors->has('video_link'))
                                            <span class="text-danger">{{ $errors->first('video_link') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <strong><label for="horizontal-metatitle-input" class="col-sm-6 col-form-label">Meta Title</label></strong>
                                        <div class="col-sm-12">
                                            <textarea rows="4" class="form-control" name="metatitle" id="horizontal-metatitle-input" placeholder="Meta Title"></textarea>
                                            @if ($errors->has('metatitle'))
                                            <span class="text-danger">{{ $errors->first('metatitle') }}</span>
                                            @endif
                                        </div>
                                        <br />
                                        <strong><label for="horizontal-metadesc-input" class="col-sm-6 col-form-label">Meta Description</label></strong>
                                        <div class="col-sm-12">
                                            <textarea rows="4" class="form-control" name="metadesc" id="horizontal-metadesc-input" placeholder="Meta Description"></textarea>
                                            @if ($errors->has('metadesc'))
                                            <span class="text-danger">{{ $errors->first('metadesc') }}</span>
                                            @endif
                                        </div>
                                        <br />
                                        <strong><label for="horizontal-metakeyword-input" class="col-sm-6 col-form-label">Meta Keywords</label></strong>
                                        <div class="col-sm-12">
                                            <textarea rows="4" class="form-control" name="metakeyword" id="horizontal-metakeyword-input" placeholder="Meta Keywords"></textarea>
                                            @if ($errors->has('metakeyword'))
                                            <span class="text-danger">{{ $errors->first('metakeyword') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-12" style="text-align: center;">
                                <button type="submit" class="btn btn-primary w-md">SAVE</button>
                            </div>
                        </div>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>


@endsection
@push('customScripts')
<script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();

        $('#summernote').summernote({
           placeholder: 'Enter Description here',
           tabsize: 2,
           height: 250,
           toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear', 'strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'undo', 'redo', 'help']]
           ]
        });
    });

</script>

@endpush
