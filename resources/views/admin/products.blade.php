@extends("layouts.partials.admin.adminlte")
<!-- Include Editor style. -->

@section("main-content")
<link href='{{ asset("/froala/css/froala_editor.min.css") }}' rel='stylesheet' type='text/css' />
<link href='{{ asset("/froala/css/froala_style.min.css") }}' rel='stylesheet' type='text/css' />

<input type="hidden" id="ADMIN_ACTIONS_URL" value="{{ env('ADMIN_ACTIONS_URL') }}">
<!-- Modal for confirm single delete - start -->
<div class="modal fade" id="confirmModalSingleDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
            </div>
            <div class="modal-body">
                <p></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary sendRequestSingleDelete" data-dismiss="modal">Yes</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal for confirm single delete - end -->
<div class="container">
    <div class="row">
        <div class="col-md-11">
            <h3>ADD PRODUCT</h3>
            {{-- Add form - START --}}
            {{ Form::open(["url" => "admin/products/addproduct", 'id' => "addProductForm", 'novalidate']) }}
            <div class="form-group">
                <label class="control-label col-sm-2" for="name">Name:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="description">Description:</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="description" name="description" placeholder="Enter description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="category">Category:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="category" name="category" placeholder="Enter category">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="subcategory">Sub-category:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="subcategory" name="subcategory" placeholder="Enter sub-category">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="best_tag">Best tag:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="best_tag" name="best_tag" placeholder="Enter best tag">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="tags">Tags:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tags" name="tags" placeholder="Enter tags (format: tag1, tag2, tag3)">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="price">Price:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="deal_price">Deal price:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="deal_price" name="deal_price" placeholder="Enter deal price">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="status">Status:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="status" name="status">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="on_home_page">On Home Page?:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="on_home_page" name="on_home_page">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="real_website">Real Website:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="real_website" name="real_website" placeholder="Enter Real Website">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="reviews">Reviews:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="reviews" name="reviews" placeholder="Enter reviews">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="size">Size:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="size" name="size" placeholder="Enter size">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="flash_deal">Flash Deal?:</label>
                <div class="col-sm-10">
                    <select class="form-control" id="flash_deal" name="flash_deal">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="shipment_time">Shipment time:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="shipment_time" name="shipment_time" placeholder="Enter shipment time">
                </div>
            </div>
            {{-- <!-- bootstrap-fileinput plugin - START --> --}}
            <div class="form-group">
                <label class="control-label col-sm-2" for="images">Images :</label>
                <div class="col-sm-10">
                    {{--<input id="image-upload" type="file" class="file" data-preview-file-type="text" multiple>--}}
                    <input id="image-upload" name="image-upload" type="file" multiple>
                </div>
            </div>
            {{-- <!-- bootstrap-fileinput plugin - END --> --}}
            <input type="hidden" class="form-control" id="images_folder" name="images_folder" value="{{ uniqid() }}">
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i>&nbsp;
                        Add product
                    </button>
                </div>
            </div>
            {{ Form::close() }}
            {{-- Add form - END --}}
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-11">
            {{-- Products table - START --}}
            <h3>PRODUCTS</h3>
            <div class="table-wrapper">
                <div class="table-scroll" style="overflow-x: scroll;">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <div class="btn-group">
                                        <button id="actionsMenuButton" type="button" class="btn btn-default dropdown-toggle btn-text-left btn-menu"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                        title="CheckBox Actions">
                                        <i id="actionsMenuIcon" class="fa fa-check"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a id="deleteMultipleProducts" href="#">Delete selected</a>
                                        </li>
                                    </ul>
                                </div>
                            </th>
                            @foreach ($columns as $column)
                            <th style="white-space: nowrap;">{{ $column }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">
                                <input class="checkboxItem" type="checkbox" value="{{ $product->id}}">
                            </td>
                            @foreach ($product as $key => $product_detail)
                            @if ($key == "tags")
                            @if (json_decode($product_detail, true))
                            <td style="white-space: nowrap;"
                            title="{{ implode(", ", json_decode($product_detail, true)) }}"
                            >
                            @if (strlen($product_detail) > 48)
                            {{ substr(implode(", ", json_decode($product_detail, true)), 0, 48) }}
                            @else
                            {{ implode(", ", json_decode($product_detail, true)) }}
                            @endif
                        </td>
                        @else
                        <td style="white-space: nowrap;" title="{{ $product_detail }}">
                            @if (strlen($product_detail) > 48)
                            {{ substr($product_detail, 0, 48) }}...
                            @else
                            {{ $product_detail }}
                            @endif
                        </td>
                        @endif
                        @elseif ($key == "status" && $product_detail == "0")
                        <td style="white-space: nowrap;">Inactive</td>
                        @elseif ($key == "status" && $product_detail == "1")
                        <td style="white-space: nowrap;">Active</td>
                        @elseif ($key == "on_home_page" && $product_detail == "0")
                        <td style="white-space: nowrap;">No</td>
                        @elseif ($key == "on_home_page" && $product_detail == "1")
                        <td style="white-space: nowrap;">Yes</td>
                        @elseif ($key == "flash_deal" && $product_detail == "0")
                        <td style="white-space: nowrap;">No</td>
                        @elseif ($key == "flash_deal" && $product_detail == "1")
                        <td style="white-space: nowrap;">Yes</td>
                        @elseif ($key == "real_website")
                        <td style="white-space: nowrap;">
                            <a href="{{ $product_detail }}" target="_blank" title="{{ $product_detail }}">
                                @if (strlen($product_detail) > 48)
                                {{ substr($product_detail, 0, 48) }}...
                                @else
                                {{ $product_detail }}
                                @endif
                            </a>
                        </td>
                        @elseif ($key == "remember_token" || $key == "images_folder")
                        @else
                        <td style="white-space: nowrap;" title="{{ $product_detail }}">
                            @if (strlen($product_detail) > 48)
                            {{ substr($product_detail, 0, 48) }}...
                            @else
                            {{ $product_detail }}
                            @endif
                        </td>
                        @endif
                        @endforeach
                        <td style="white-space: nowrap;">
                            <span>
                                <a href="#ProductDetails" {{-- TEMP --}}
                                data-url="{{ url("admin/products/productdetails/" . $product->id) }}">
                                Details
                            </a>
                        </span>
                        <span> | </span>
                        <span>
                            <a href="#EditProduct" {{-- TEMP --}}
                            data-url="{{ url("admin/products/editproduct/" . $product->id) }}">
                            Edit
                        </a>
                    </span>
                    <span> | </span>
                    <span>
                        <a class="deleteProduct" href="#DeleteProduct"
                        data-url="{{ url("admin/products/deleteproduct/" . $product->id) }},{{  $product->images_folder }}">
                        Delete
                    </a>
                </span>
                <span> | </span>
                @if ($product->status == "0")
                <span>
                    <a href="#MakeProductInactive"
                    data-url="{{ url("admin/products/makeproductactive/" . $product->id) }}">
                    Make Active
                </a>
            </span>
            @else
            <span>
                <a href="#MakeProductActive"
                data-url="{{ url("admin/products/makeproductinactive/" . $product->id) }}">
                Make Inactive
            </a>
        </span>
        @endif
        <span> | </span>
        @if ($product->on_home_page == "0")
        <span>
            <a href="#PutProductOnFirstPage"
            data-url="{{ url("admin/products/putproductonfirstpage/" . $product->id) }}">
            Add On First Page
        </a>
    </span>
    @else
    <span>
        <a href="#RemoveProductFromFirstPage"
        data-url="{{ url("admin/products/removeproductonfromfirstpage/" . $product->id) }}">
        Remove From First Page
    </a>
</span>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
{{-- Products table - END --}}
</div>
</div>
</div>

    
<script>
    $(document).ready(function () {
        function confirmActionDeleteProduct (modalId, message) {
            $('#' + modalId).find('.modal-body p').text(message)
            $('#' + modalId).modal('show')
        }
        var deleteUrl,
        buttonParent;
        $('.deleteProduct').on('click', function () {
            deleteUrl = $(this).data('url');
            buttonParent = $(this).parent().parent().parent();
            confirmActionDeleteProduct('confirmModalSingleDelete', 'Are you sure you want to delete this product?');
        });
        $('.sendRequestSingleDelete').on('click', function () {
            $.ajax({
                type: 'GET',
                url: deleteUrl,
                success: function (response) {
                    if (JSON.parse(response)['status'] === 'success') {
                        buttonParent.remove();
                    } else {
                        console.log(JSON.parse(response));
                    }
                },
                error: function () {}
            });
        });
        var images_folder = $('#images_folder').val();
        var csrf_token = $('meta[name="csrf-token"]').attr('content');
        var fileinput = $('#image-upload');
        fileinput.fileinput({
            uploadUrl: "{{ route('uploadProductImages') }}",
            uploadExtraData: function(previewId, index) {
                return {
                    'key': index,
                    'images_folder': images_folder,
                    '_token': csrf_token,
                };
            },
            maxFilePreviewSize: 25600,
            browseOnZoneClick: true,
            uploadLabel: 'Upload all',
            removeLabel: 'Remove all',
            browseLabel: 'Browse ...',
            showUpload: false,
            showRemove: false,
            showBrowse: false,
            overwriteInitial: false,
            showAjaxErrorDetails: false,
            showCaption: false,
            uploadAsync: true,
            previewZoomButtonClasses: {
                prev: 'btn btn-navigate fa fa-chevron-left',
                next: 'btn btn-navigate fa fa-chevron-right',
                toggleheader: 'btn btn-kv btn-default btn-outline-secondary',
                fullscreen: 'btn btn-kv btn-default btn-outline-secondary',
                borderless: 'btn btn-kv btn-default btn-outline-secondary',
                close: 'btn btn-kv btn-default btn-outline-secondary'
            },
            layoutTemplates: {
                main1:
                "    <div class=\'input-group {class}\'>\n" +
                "       <div class=\'input-group-btn\'>\n" +
                "           {cancel}\n" +
                "           {browse}\n" +
                "           {remove}\n" +
                "       </div>\n" +
                "    </div>" +
                "   {preview}\n",
                caption:
                "    <div class='file-caption form-control {class}' tabindex='500'>\n" +
                "       <span></span>\n" +
                "       <input class='file-caption-name' onkeydown='return false;' onpaste='return false;'>\n" +
                "    </div>",
                actions:
                '    <div class="file-actions">\n' +
                '        <div class="file-footer-buttons">\n' +
                '           {delete} {zoom}' +
                '        </div>\n' +
                '    <div class="clearfix"></div>\n' +
                '</div>',
            }
        }).on('filebatchselected', function () {
            fileinput.fileinput('upload');
        });
    });
</script>
@endsection
