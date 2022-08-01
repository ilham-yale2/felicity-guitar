@extends('layout.admin')

@section('title', 'Admin Dashboard')

@section('page', ' Private Vault > Edit')

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
                <form action="{{ route('vault.update', ['admin_private_vault' => $product->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="PUT">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name">Product Name (Single View)</label>
                                <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" placeholder="Nama Produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="name_2">Product Name (Multi View)</label>
                                <input type="text" class="form-control" id="name_2" value="{{$product->name_2}}" name="name_2" placeholder="Nama Produk"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
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
                            <div class="form-group mb-4">
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
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="alt_text">Alt Text</label>
                                <input type="text" class="form-control" name="alt_text" value="{{$product->alt_text}}" required id="alt_text">
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
                                    readonly value="{{ $product->sell_price }}">
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
                                <label for="thumbnail">Thumbnail (Single View )</label>
                                <input type="file" name="thumbnail_2" class="form-control-file" id="thumbnail-2" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="thumbnail">Thumbnail (Multi View)</label>
                                <input type="file" name="thumbnail" class="form-control-file" id="thumbnail" >
                            </div>
                        </div>
                       
                        <div class="col-md-6 text-center preview">
                            <img class="w-100" src="{{asset('storage/'.$product->thumbnail_2)}}" id="preview-photo2" alt="">
                        </div>
                        <div class="col-md-6 text-center preview">
                            <img class="w-100" src="{{asset('storage/'.$product->thumbnail)}}" id="preview-photo" alt="">
                        </div>
                        <div class="col-md-12">
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
                        {{-- PRODUCT SPECIFICATION --}}
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
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
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
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
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
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
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
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
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
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
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
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_title[]" class="form-control" value="{{$item->title}}">
                                            <input type="hidden" name="old_id[]" value="{{$item->id}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-7 old-{{$item->id}}">
                                        <div class="form-group mb-2">
                                            <input type="text" name="old_value[]" value="{{$item->value}}" class="form-control ">
                                        </div>
                                    </div>
                                    <div class="old-{{$item->id}}">
                                        <button class="btn btn-danger ml-3 py-1 px-2" type="button" onclick="deleteDetail('{{$item->id}}')">
                                        <span class="iconify" data-icon="ic:round-remove"></span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                         {{-- PRODUCT SPECIFICATION --}}
                         {{-- <h4 class="col-12 mt-5 mb-2 text-center">Specification Product</h4>
                         <div class="col-12 mt-4"><h5>General</h5></div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="condition">Condition</label>
                                 <input type="text" value="{{$detail->condition ?? '-'}}" name="condition" class="form-control" id="condition" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="number_of_strings">Number Of String</label>
                                 <input type="text" value="{{$detail->number_of_strings ?? '-'}}" name="number_of_strings" class="form-control number text-right" id="number_of_strings" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="orientation">Orientation</label>
                                 <input type="text" value="{{$detail->orientation ?? '-'}}" name="orientation" class="form-control" id="orientation" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="made_in">Country of Origin</label>
                                 <input  name="made_in" value="{{$detail->made_in ?? '-'}}" class="form-control " id="made_in" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="year">Year</label>
                                 <input type="text" value="{{$detail->year ?? '-'}}" name="year" class="form-control year" id="year" >
                             </div>
                         </div>
                         <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="weight">Weight</label>
                                <input type="text" value="{{$detail->weight_product ?? '-'}}" name="weight_product" class="form-control weight" id="weight" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="limited_series">Limited Edition / Series</label>
                                <div class="d-flex">
                                    <div class="form-check d-inline mr-5">
                                        <input class="form-check-input" type="radio" name="limited_series" id="limited_series1" value="0"  @if($detail->limited_series == 0) checked @endif>
                                        <label class="form-check-label py-1 px-3 rounded" for="limited_series1">
                                            Limited
                                        </label>
                                    </div>
                                    <div class="form-check d-inline ">
                                        <input class="form-check-input" type="radio" name="limited_series" id="limited_series2" value="1"  @if($detail->limited_series == 1) checked @endif>
                                        <label class="form-check-label py-1 px-3 rounded" for="limited_series2">
                                            Series
                                        </label>
                                    </div>
                                </div>
                                <input class="form-control" type="text" name="limited_series_text" id="" value="{{$detail->limited_series_text ?? '-'}}" >
                            </div>
                        </div>
                         <h5 class="col-md-12 mt-4">Body</h5>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="type">Body type</label>
                                 <input type="text" value="{{$detail->type ?? '-'}}" name="type" class="form-control " id="type" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="shape">Body shape</label>
                                 <input type="text" value="{{$detail->shape ?? '-'}}" name="shape" class="form-control " id="shape" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="material">Body Material</label>
                                 <input type="text" value="{{$detail->material ?? '-'}}" name="material" class="form-control " id="material" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="carve">Body carve</label>
                                 <input type="text" value="{{$detail->carve ?? '-'}}" name="carve" class="form-control " id="carve" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="binding">Body binding</label>
                                 <input type="text" value="{{$detail->binding ?? '-'}}" name="binding" class="form-control " id="binding" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="weight_relief">Weight relief</label>
                                 <input type="text" value="{{$detail->weight_relief ?? '-'}}" name="weight_relief" class="form-control " id="weight_relief" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="build_material">Build material</label>
                                 <input type="text" value="{{$detail->build_material ?? '-'}}" name="build_material" class="form-control " id="build_material" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="body_finish_type">Body finish type</label>
                                 <input type="text" value="{{$detail->body_finish_type ?? '-'}}" name="body_finish_type" class="form-control " id="body_finish_type" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="color">Color</label>
                                 <input type="text" value="{{$detail->color ?? '-'}}" name="color" class="form-control " id="color" >
                             </div>
                         </div>
                         <h5 class="col-md-12 mt-4">Neck</h5>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_material">Neck Material</label>
                                 <input type="text" value="{{$detail->neck_material ?? '-'}}" name="neck_material" class="form-control " id="neck_material" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="truss_rod">Truss Rod</label>
                                 <input type="text" value="{{$detail->truss_rod ?? '-'}}" name="truss_rod" class="form-control " id="truss_rod" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="truss_rod_cover">Truss Rod Cover</label>
                                 <input type="text" value="{{$detail->truss_rod_cover ?? '-'}}" name="truss_rod_cover" class="form-control " id="truss_rod_cover" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="peghead_particular">Peghead Particular</label>
                                 <input type="text" value="{{$detail->peghead_particular ?? '-'}}" name="peghead_particular" class="form-control " id="peghead_particular" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_profile">Neck Profile</label>
                                 <input type="text" value="{{$detail->neck_profile ?? '-'}}" name="neck_profile" class="form-control " id="neck_profile" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="fingerboard_material">Fingerboard Matrial</label>
                                 <input type="text" value="{{$detail->fingerboard_material ?? '-'}}"  name="fingerboard_material" class="form-control " id="fingerboard_material" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="crown_radius">Crown Radius</label>
                                 <input type="text" value="{{$detail->crown_radius ?? '-'}}" name="crown_radius" class="form-control number" id="crown_radius" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="scale_length">Scale Length</label>
                                 <input type="text" value="{{$detail->scale_length ?? '-'}}" name="scale_length" class="form-control comma" id="scale_length" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="frets">No. Frets / Type</label>
                                 <input type="text" value="{{$detail->frets ?? '-'}}" name="frets" class="form-control" id="frets" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="nut_size">Nut Size / Material</label>
                                 <input type="text" value="{{$detail->nut_size ?? '-'}}" name="nut_size" class="form-control" id="nut_size" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_width">Neck Width</label>
                                 <input type="text" value="{{$detail->neck_width ?? '-'}}" name="neck_width" class="form-control" id="neck_width" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_depth">Neck Depth</label>
                                 <input type="text" value="{{$detail->neck_depth ?? '-'}}" name="neck_depth" class="form-control" id="neck_depth" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="inlays">Fingerboard Inlays</label>
                                 <input type="text" value="{{$detail->inlays ?? '-'}}" name="inlays" class="form-control" id="inlays" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_binding">Neck Binding</label>
                                 <input type="text" value="{{$detail->neck_binding ?? '-'}}" name="neck_binding" class="form-control" id="neck_binding" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="side_dots">Side Dot</label>
                                 <input type="text" value="{{$detail->side_dots ?? '-'}}" name="side_dots" class="form-control" id="side_dots" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_joint">Neck Joint</label>
                                 <input type="text" value="{{$detail->neck_joint ?? '-'}}" name="neck_joint" class="form-control" id="neck_joint" >
                             </div>
                         </div>                        
                         <h5 class="col-md-12 mt-4">Hardware</h5>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="bridge">Bridge </label>
                                 <input type="text" value="{{$detail->bridge ?? '-'}}" name="bridge" class="form-control" id="bridge" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="tailpiece">Tailpiece</label>
                                 <input type="text" value="{{$detail->tailpiece ?? '-'}}" name="tailpiece" class="form-control" id="tailpiece" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="tuning_machines">Tuning Machines</label>
                                 <input type="text" value="{{$detail->tuning_machines ?? '-'}}" name="tuning_machines" class="form-control" id="tuning_machines" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="pickup_cover">Pickup cover</label>
                                 <input type="text" value="{{$detail->pickup_cover ?? '-'}}"  name="pickup_cover" class="form-control" id="pickup_cover" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="strap_buttons">Strap Buttons</label>
                                 <input type="text" value="{{$detail->strap_buttons ?? '-'}}" name="strap_buttons" class="form-control" id="strap_buttons" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="pickguard">Pickguard</label>
                                 <input type="text" value="{{$detail->pickguard ?? '-'}}" name="pickguard" class="form-control" id="pickguard" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="control_knobs">Control knobs</label>
                                 <input type="text" value="{{$detail->control_knobs ?? '-'}}" name="control_knobs" class="form-control" id="control_knobs" >
                             </div>
                         </div>                        
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="switch">Switch</label>
                                 <input type="text" value="{{$detail->switch ?? '-'}}" name="switch" class="form-control" id="switch" >
                             </div>
                         </div>                        
 
                         <h5 class="col-md-12 mt-4">Electronic</h5>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="bridge_pickup">Bridge pickup</label>
                                 <input type="text" value="{{$detail->bridge_pickup ?? '-'}}" name="bridge_pickup" class="form-control mt-input" id="bridge_pickup" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="middle_pickup">Middle pickup</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="middle_pickup" id="middle_pickup1" value="0" @if($detail->middle_pickup == 0) checked @endif >
                                         <label class="form-check-label py-1 px-3 rounded" for="middle_pickup1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="middle_pickup" id="middle_pickup2" value="1" @if($detail->middle_pickup== 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="middle_pickup2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="middle_pickup_text" id="" value="{{$detail->middle_pickup_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="neck_pickup">Neck pickup</label>
                                 <input type="text" name="neck_pickup" value="{{$detail->neck_pickup ?? '-'}} " class="form-control mt-input" id="neck_pickup" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="active_passive">Active / Passive</label>
                                 <input type="text" name="active_passive" value="{{$detail->active_passive ?? '-'}} " class="form-control" id="active_passive" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="series_pararell">Series / Pararell</label>
                                 <input type="text" value="{{$detail->series_pararell ?? '-'}} " name="series_pararell" class="form-control" id="series_pararell" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="control">Control</label>
                                 <input type="text" value="{{$detail->control ?? '-'}} " name="control" class="form-control" id="control" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="mono_stereo">Mono / Stereo</label>
                                 <input type="text" value="{{$detail->mono_stereo ?? '-'}} " name="mono_stereo" class="form-control" id="mono_stereo" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="vol_pontentiometer">Vol pontentiometer</label>
                                 <input type="text" value="{{$detail->vol_pontentiometer ?? '-'}} " name="vol_pontentiometer" class="form-control" id="vol_pontentiometer" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="pontentiometer">Pontentiometer</label>
                                 <input type="text" name="pontentiometer" value="{{$detail->pontentiometer ?? '-'}} " class="form-control" id="pontentiometer" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="capacitor">Capacitor</label>
                                 <input type="text" value="{{$detail->capacitor ?? '-'}} " name="capacitor" class="form-control mt-input" id="capacitor" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="harnesst">Harnesst</label>
                                 <input type="text" value="{{$detail->harnesst ?? '-'}} " name="harnesst" class="form-control mt-input" id="harnesst" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="push_pull">Push pull</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="push_pull" id="push_pull1" value="0" @if($detail->push_pull == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="push_pull1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="push_pull" id="push_pull2" value="1" @if($detail->push_pull == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="push_pull2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="push_pull_text" id="" value="{{$detail->push_pull_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="piezo">Piezo</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="piezo" id="piezo1" value="0" @if($detail->piezo == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="piezo1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="piezo" id="piezo2" value="1" @if($detail->piezo == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="piezo2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="piezo_text" id="" value="{{$detail->piezo_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="active_eq">Active EQ</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="active_eq" id="active_eq1" value="0" @if($detail->active_eq == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="active_eq1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="active_eq" id="active_eq2" value="1" @if($detail->active_eq == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="active_eq2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="active_eq_text" id="" value="{{$detail->active_eq_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="kill_switch">Kill Swicth</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="kill_switch" id="kill_switch1" value="0" @if($detail->kill_switch == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="kill_switch1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="kill_switch" id="kill_switch2" value="1" @if($detail->kill_switch == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="kill_switch2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="kill_switch_text" id="" value="{{$detail->kill_switch_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="output_jack">Output jack</label>
                                 <input type="text" value="{{$detail->output_jack ?? '-'}} " name="output_jack" class="form-control" id="output_jack" >
                             </div>
                         </div>
                         <h5 class="col-md-12 mt-4">Miscellaneous</h5>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="case">Case / Gigbag</label>
                                 <input type="text" value="{{$detail->case ?? '-'}} " name="case" class="form-control mt-input" id="case" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="strap_lock">Strap locks</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="strap_lock" id="strap_lock1" value="0" @if($detail->strap_lock == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="strap_lock1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="strap_lock" id="strap_lock2" value="1" @if($detail->strap_lock == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 rounded" for="strap_lock2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="strap_lock_text" id="" value="{{$detail->strap_lock_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="strings">Strings</label>
                                 <input type="text" value="{{$detail->strings ?? '-'}} " name="strings" class="form-control mt-input" id="strings" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="tools">Tools</label>
                                 <input type="text" value="{{$detail->tools ?? '-'}} " name="tools" class="form-control mt-input" id="tools" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="manual">Manual</label>
                                 <input type="text" value="{{$detail->manual ?? '-'}} " name="manual" class="form-control mt-input" id="manual" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="coa">C.O.A</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="coa" id="coa1" value="0" @if($detail->coa == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 coa rounded" for="coa1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="coa" id="coa2" value="1" @if($detail->coa == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 coa rounded" for="coa2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                <input class="form-control" type="text" name="coa_text" id="" value="{{$detail->coa_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="other">Other</label>
                                 <div class="d-flex">
                                     <div class="form-check d-inline mr-5">
                                         <input class="form-check-input" type="radio" name="other" id="other1" value="0" @if($detail->other == 0) checked @endif>
                                         <label class="form-check-label py-1 px-3 other rounded" for="other1">
                                             No
                                         </label>
                                     </div>
                                     <div class="form-check d-inline ">
                                         <input class="form-check-input" type="radio" name="other" id="other2" value="1" @if($detail->other == 1) checked @endif>
                                         <label class="form-check-label py-1 px-3 other rounded" for="other2">
                                             Yes
                                         </label>
                                     </div>
                                 </div>
                                 <input type="text" class="form-control" name="other_text" value="{{$detail->other_text ?? '-'}}" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="weight">Weight</label>
                                 <input type="text" value="{{$detail->weight ?? '-'}} " name="weight" class="mt-input form-control" id="weight" >
                             </div>
                         </div>
                         <div class="col-md-4">
                             <div class="form-group mb-4">
                                 <label for="disclosure">Disclosure</label>
                                 <input type="text" value="{{$detail->disclosure ?? '-'}} " name="disclosure" class="mt-input form-control" id="disclosure" >
                             </div>
                         </div> --}}
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
      
        $('.input-images-1').imageUploader();

        function deleteImage(id) {
            Swal.fire({
                title: `Are you sure to delete this image?`,
                text: 'Deleted data cannot be restored' ,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log(id);
                    $.ajax({
                        url: `${base_url}/private-vault/delete-image`,
                        method: "POST",
                        headers: {
                            "X-CSRF-TOKEN": token,
                        },
                        data: {
                            id: id,
                        },
                        success: function (response) {
                            if(response.type == 'success'){
                                Swal.fire({
                                    icon: response.type,
                                    title: response.title,
                                    text: response.text,
                                })
                                $("#image-" + id).remove();
                            }
                            
                        },
                    });
                }
            });
        
        }
    </script>
@endsection
