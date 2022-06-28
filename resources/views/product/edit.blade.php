@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', ' Product > Edit')

@section('content')
<style>
    .mt-input{
        margin-top: 31px;
    }
</style>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Edit Product</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="{{ route('product.update', ['product' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name">Product Name (Single View)</label>
                                <input type="text" class="form-control" id="name" value="{{$product->name }}" name="name" placeholder="Product Name"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="name">Product Name (Multi View)</label>
                                <input type="text" class="form-control" id="name" value="{{$product->name_2 }}" name="name_2" placeholder="Product Name"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" required id="brand_id" class="form-control select2" required>
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $b)
                                        <option value="{{ $b->id }}"
                                            @if ($b->id == $product->brand_id) selected @endif>{{ $b->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control select2" required
                                     required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $ctg)
                                        <option value="{{ $ctg->id }}" @if ($ctg->id == $product->category_id) selected @endif> {{ $ctg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>   
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="meta_text">Meta Text</label>
                                <input type="text" class="form-control" name="meta_text" value="{{$product->meta_text}}" required id="meta_text">
                            </div>
                        </div>            
                        <div class="col-md-4">
                            <div class="form-group mb-4" >
                                <label for="price">Price (IDR)</label>
                                <input type="tel" required  class="form-control money text-right" id="price" name="price"
                                    placeholder="" value="{{$product->price}}"  onkeyup="getSellPrice()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc" >Discount</label>
                                <input  type="text" required size="4" maxlength="3" class="form-control discount text-right" id="disc" name="discount" placeholder="Diskon (%)"
                                    value="0" value="{{$product->discount}}" onkeyup="getSellPrice()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Sell Price</label>
                                <input type="text" class="form-control" id="sell_price" name="sell_price" required=""
                                    readonly value="{{ number_format($product->sell_price) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group" style="padding-bottom: 1.5rem !important">
                                <label for="code">Code</label>
                                <input type="text" id="fakecode" name="code" class="form-control select2"
                                    readonly value="{{$product->code}}">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="custom-control custom-switch custom-switch-md" style="margin-top: 2.5rem !important;">
                                <input type="checkbox" name="sold" class="custom-control-input" id="customSwitch1" value="sold" @if($product->status == 'sold') checked @endif> 
                                <label class="custom-control-label" for="customSwitch1">Sold Out</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="thumbnail">Thumbnail Product</label>
                                <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" >
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="thumbnail-2">Thumbnail 2</label>
                                <input type="file" name="thumbnail_2" class="form-control-file" id="thumbnail-2" >
                            </div>
                        </div>
                       
                        <div class="col-md-6 text-center preview">
                            <img class="w-100" src="{{asset('storage/'.$product->thumbnail)}}" id="preview-photo" alt="">
                        </div>
                        <div class="col-md-6 text-center">
                            <img class="w-100" src="{{asset('storage/'.$product->thumbnail_2)}}" id="preview-photo2" alt="">
                        </div>
                        <div class="col-md-12 mt-3">
                            <div class="form-group mb-4">
                                <label for="text">Text</label>
                                <textarea class="form-control summernote-color" rows="3" name="text"
                                 id="text">{{$product->text}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Photos</label>
                                <table id="zero-config" class="table style-3 table-hover">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product_images as $image )
                                        <tr id="image-{{$image->id}}">
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <img src="{{asset('storage').'/'.$image->image}}" style="width: 80px" alt="">
                                            </td>
                                            <td>
                                                <button class="btn btn-danger px-3 py-1" type="button" onclick="deleteImage({{$image->id}})" >Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <label class="active">Add Photo</label>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="{{asset('storage/'.$product->image)}}" id="preview-photo" alt="">
                        </div>
                        <h4 class="col-12 mt-5 mb-2 text-center">Description Product</h4>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea class="form-control summernote" rows="3" name="description"
                                 id="description">{{$product->description}}</textarea>
                            </div>
                        </div>
                        <h4 class="col-12 mt-5 mb-2 text-center">Specification Product</h4>
                        <div class="col-12 mt-4 d-flex align-items-end mb-4">
                            <h5 class="mb-0">General</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="general-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="general-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('general')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="general">
                                @foreach ($general as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Body</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="body-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="body-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('body')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="body">
                                @foreach ($body as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Neck</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="neck-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="neck-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('neck')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="neck">
                                @foreach ($neck as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Hardware</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="hardware-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="hardware-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('hardware')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="hardware">
                                @foreach ($hardware as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Electronic</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="electronic-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="electronic-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('electronic')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="electronic">
                                @foreach ($electronic as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Miscellaneous</h5>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group mb-4">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="miscellaneous-title">
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group mb-4">
                                        <label for="value">Value</label>
                                        <input type="text" class="form-control " id="miscellaneous-value">
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <button class="btn btn-primary ml-3 py-1 px-2" type="button" onclick="addColumn('miscellaneous')">
                                        <span class="iconify" data-icon="fluent:add-12-filled"></span>
                                    </button>
                                </div>
                            </div>
                            <div class="row" id="miscellaneous">
                                @foreach ($miscellaneous as $item)
                                    <div class="col-md-4 old-{{$item->id}}">
                                        <div class="form-group mb-2 ">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}" required>
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" required class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}', '{{$item->product_id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="{{ route('product.index') }}"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
{{-- // let preloaded = [
//     @foreach ( $product_images as $product_image )
//         {id: {{ $product_image->id }}, src: '{{ asset("storage/" . $product_image->image) }}'},
//     @endforeach
// ]; --}}

@section('script')
    @if (\Session::has('images'))
        <script>
            
            setTimeout(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops ...!',
                    text: "{!! \Session::get('images') !!}",
                })
            }, 1000);
        </script>    
    @endif
    <script src="{{ asset('js/product.js') }}"></script>
    <script type="text/javascript">
        
        $('.input-images-1').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png'],
            mimes: ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml'],
            maxSize: undefined,
            maxFiles: 10,
        });


        
        
    </script>
@endsection
