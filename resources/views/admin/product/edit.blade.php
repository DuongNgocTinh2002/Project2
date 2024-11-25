@extends('admin.layouts._masterLayout')

@section('content')

<div class="col-lg-12">
    <div class="block">
        @if(session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="title"><strong>Edit product</strong></div>
        
        <div class="block-body">
            <form class="form-horizontal" method="POST" action="{{ route('admin.product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Name</label>
                    <div class="col-sm-9">
                        <input value="{{ $product->name }}" name="name" type="text" class="form-control" required />
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Category</label>
                    <div class="col-sm-9">
                        <select name="category_id" class="form-control mb-3 mb-3" required>
                            @foreach ($categories as $category)
                                <option 
                                    @selected($category->id ==  $product->category_id)
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Image</label>
                    <div class="col-sm-4">
                        <input name="images[]" type="file" class="form-control" multiple />
                    </div>
                    @foreach ($product->images as $image)
                        <img style="width: 160px; height: 90px; object-fit: cover" src="{{ asset('uploads/' . $image->name) }}" alt="" srcset="">
                    @endforeach
                </div>

                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Price</label>
                    <div class="col-sm-9">
                        <input value="{{ $product->price }}" name="price" type="number" placeholder="0 VNĐ" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Quantity</label>
                    <div class="col-sm-9">
                        <input value="{{ $product->quantity }}" name="quantity" type="number" placeholder="0 item" class="form-control">
                    </div>
                </div>

                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Description</label>
                    <div class="col-sm-9">
                        <textarea rows="6" name="description" type="text" class="form-control">
                            {{ $product->description }}
                        </textarea>
                    </div>
                </div>
            
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-3 form-control-label">Checkboxes &amp; radios</label>
                    <div class="col-sm-9">
                        <div class="i-checks">
                            <input name="is_active" @checked($product->is_active == 1) id="checkboxCustom1" type="checkbox" value="{{ $product->is_active }}" class="checkbox-template">
                            <label for="checkboxCustom1">Is Active</label>
                        </div>
                    </div>
                </div>
            
                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-9 ml-auto">
                        <button type="reset" class="btn btn-secondary">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>

@endsection