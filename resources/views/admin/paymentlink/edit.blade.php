@extends('admin.layouts.main')
@section('container')

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">UPDATE PAYMENTS LINK GENERATOR</h4>
                    @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                        Session::forget('success');
                        @endphp
                    </div>
                    @endif
                    <form id="paymentlink_form">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <strong><label for="heading_two" class="col-sm-3 col-form-label">Item Name</label></strong>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Enter Item Name here" value="{{ !empty($paymentlink->item_name) ? $paymentlink->item_name :'' }}">
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('item_name'))
                                    <span class="text-danger">{{ $errors->first('item_name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <strong><label for="name" class="col-sm-4 col-form-label">Customer (IF EXISTING)</label></strong>
                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" name="id" id="id" value="{{ !empty($paymentlink->id) ? $paymentlink->id :'' }}">
                                    <select class="form-control select2" name="customer_id" id="customer_id">
                                        <option selected disabled value="0">Select Customer</option>
                                        @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" {{$paymentlink->customer_id  == $customer->id ? 'selected' : ''}}>{{ $customer->first_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="validation-error text-danger d-none"></span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            

                            <div class="col-sm-3">
                                <strong><label for="short_address" class="col-sm-3 col-form-label">Price</label></strong>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" placeholder="Enter Price here" name="price" id="price" value="{{ !empty($paymentlink->price) ? $paymentlink->price :'' }}">
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('price'))
                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <strong><label for="short_address" class="col-sm-3 col-form-label">Discount</label></strong>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" placeholder="Enter Discount here" name="discount" id="discount" value="{{ !empty($paymentlink->discount) ? $paymentlink->discount :'' }}">
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('discount'))
                                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-sm-3">
                                <strong><label for="short_address" class="col-sm-5 col-form-label">Discount Type</label></strong>
                                <div class="col-sm-12">
                                    <select name="discount_type" class="form-control select2">
                                        <option value="percent" {{ $paymentlink->discount_type == "percent" ? "selected" : "" }}>Percentage (%)</option>
                                        <option value="flat" {{ $paymentlink->discount_type == "flat" ? "selected" : "" }}>Flat (direct)</option>
                                    </select>
                                    <span class="validation-error text-danger d-none"></span>

                                    @if ($errors->has('discount_type'))
                                    <span class="text-danger">{{ $errors->first('discount_type') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <strong><label for="short_address" class="col-sm-3 col-form-label">Currency</label></strong>
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="currency" id="currency">
                                        <option disabled>Select Currency</option>
                                        @foreach($currency as $curr)
                                        <option value="{{ $curr->id }}" {{ $paymentlink->currency == $curr->id  ? "selected" : "" }}>{{ $curr->currency_name }} ({{ $curr->currency_symbol }})</option>
                                        @endforeach
                                    </select>
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('currency'))
                                        <span class="text-danger">{{ $errors->first('currency') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12">
                                <strong><label for="item_description" class="col-sm-3 col-form-label">Item Description</label></strong>
                                <div class="col-sm-12">
                                    <textarea  class="form-control" row="4" placeholder="Enter Item Description here" name="item_description" id="item_description">{{ !empty($paymentlink->item_description) ? $paymentlink->item_description :'' }}</textarea>
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('item_description'))
                                        <span class="text-danger">{{ $errors->first('item_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong><label for="short_address" class="col-sm-3 col-form-label">Category</label></strong>
                                <div class="col-sm-12">
                                    <select class="form-control select2" name="category_id">
                                        @if(!empty($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $paymentlink->category_id == $category->id  ? "selected" : "" }}>{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="validation-error text-danger d-none"></span>

                                    @if ($errors->has('category_id'))
                                        <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <strong><label for="short_address" class="col-sm-12 col-form-label">Payment Gateway</label></strong>
                                <div class="col-sm-12">
                                    <select name="payment_gateway" class="form-control select2">
                                        <option selected disabled>Select Payment Gateway</option>
                                        @if(!empty($paymentGateways))
                                            @foreach($paymentGateways as $gateway)
                                                @php
                                                    $gateway_name = str_replace("payment_gateway_", "", $gateway->key_name);
                                                    $gateway_name = str_replace("_", " ", $gateway_name);
                                                    $gateway_name = Str::upper($gateway_name);
                                                @endphp
                                                <option value="{{$gateway->key_name}}" {{$paymentlink->payment_gateway == $gateway->key_name ? "selected" : ""}}>{{ $gateway_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('payment_gateway'))
                                        <span class="text-danger">{{ $errors->first('payment_gateway') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <strong><label for="short_address" class="col-sm-12 col-form-label">Sale Type</label></strong>
                                <div class="col-sm-12 d-flex">
                                    @if(!empty($saletypes))
                                        @foreach($saletypes as $sale_type)
                                            <div class="col-sm-4">
                                                <label>
                                                    <input type="radio" class="form-check-input" name="sale_type" value="{{ !empty($paymentlink->sale_type_id) ? $sale_type->id  :'' }}" {{ (!empty($paymentlink->sale_type_id) && ($paymentlink->sale_type_id == $sale_type->id) ?'checked' : "" ) }}> {{ $sale_type->name }}
                                                    <span class="validation-error text-danger d-none"></span>
                                                </label>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if ($errors->has('sale_type'))
                                        <span class="text-danger">{{ $errors->first('sale_type') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            {{-- <div class="col-sm-4">
                                <strong><label for="short_address" class="col-sm-12 col-form-label">Payment Type</label></strong>
                                <div class="col-sm-12">
                                    <select name="payment_type" class="form-control select2">
                                        <option selected disabled>Select Payment Type</option>
                                        <option value="straight" selected>Straight</option>
                                    </select>

                                    @if ($errors->has('payment_type'))
                                        <span class="text-danger">{{ $errors->first('payment_type') }}</span>
                                    @endif
                                </div>
                            </div> --}}
                            <input type="hidden" name="payment_type" value="straight"> 
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <strong><label for="short_address" class="col-sm-3 col-form-label">Comment</label></strong>
                                <div class="col-sm-12">
                                    <textarea type="text" row="4" class="form-control" placeholder="Enter Comment here" name="comment"  id="comment">{{ !empty($paymentlink->comment) ? $paymentlink->comment :'' }}</textarea>
                                    <span class="validation-error text-danger d-none"></span>
                                    @if ($errors->has('comment'))
                                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div><br />

                        <div class="row">
                            <div class="col-sm-12">
                                <input type="hidden" class="form-control" name="token" id="token">
                                <div class="col-sm-12" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary w-md update">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal fade linkdetailsModal bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="linkdetailsModal" aria-modal="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="myLargeModalLabel">Payment Link Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="table-responsive">
                                        <table class="table align-middle table-nowrap">
                                            <thead>
                                         
                                                <tr>
                                                    <td colspan="1">
                                                        <h6 class="text-right">Item name:</h6>
                                                    </td>
                                                    <td>
                                                        <h6 id="item_name-m" class="text-capitalize badge badge-soft-success font-size-14"></h6>
                                                    </td>
                                                </tr>
    
                                            </thead>
                                            <tbody>
    
                                                <tr>
                                                    <td colspan="1">
                                                        <h6 class="m-0 text-right">Price:</h6>
                                                    </td>
                                                    <td>
                                                        <h6 id="price-m" class="text-capitalize badge badge-soft-info font-size-14"></h6>
                                                    </td>

                                                    <td>
                                                        <h6>Discount:</h6>
                                                    </td>
                                                    <td>
                                                    <h6 id="discount-m" class="text-capitalize badge badge-soft-danger font-size-14"></h6>
                                                    </td>
                                                    <td>
                                                        <h6>Discount Type:</h6>
                                                    </td>
                                                    <th scope="row">
                                                        <div>
                                                        <h6 id="discount_type-m" class="text-capitalize badge badge-soft-danger font-size-14"></h6>
                                                        </div>
                                                    </th>
                                                </tr>
    
                                                <tr>
                                                    <td colspan="1">
                                                        <h6 class="m-0 text-right">Item Description:</h6>
                                                    </td>
                                                    <td>
                                                    <h6 id="item_description-m" class="text-capitalize"></h6>
                                                    </td>
                                                </tr>
                                                
                                                <tr>
                                                    <td colspan="1">
                                                        <h6 class="m-0 text-right">Category:</h6>
                                                    </td>
                                                    <td>
                                                    <h6 id="category_id-m" class="text-capitalize badge badge-soft-success font-size-14"></h6>
                                                    </td>
                                                    <td colspan="1">
                                                        <h6>Sale Type:</h6>
                                                    </td>
                                                    <td>
                                                    <h6 id="sale_type_id-m" class="text-capitalize badge badge-soft-success font-size-14"></h6>
                                                    </td>
    
                                                    <td colspan="1">
                                                        <h6>Payment Gateway:</h6>
                                                    </td>
                                                    <td>
                                                    <h6 id="payment_gateway-m" class="text-capitalize badge badge-soft-success font-size-14"></h6>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td colspan="1">
                                                        <h6 class="m-0 text-right">Link:</h6>
                                                    </td>
                                                    <td colspan="4" id="copied">
                                                    <h6 id="link-m"></h6>
                                                    </td>
                                                    
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('payment-link-generator.add') }}" class="btn btn-primary w-md waves-effect waves-light">Generate Another</a>
                                    <a href="{{ route('payment.list') }}" class="btn btn-success w-md waves-effect waves-light">Payment List</a>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
@push('customScripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
<script>
    $(document).ready(function() {
    $('#item_description').summernote({
      placeholder: 'Enter Content here',
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
<script>
    $(".update").click(function(e){

    e.preventDefault();
   
        var form = $("#paymentlink_form").serializeArray();
              
              $.ajax({
              type: "POST",
              url: "{{ route('payment-link-generator.store.update') }}",
              headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
              data: form,
              success: function(data){
                   $('.validation-error').html('');
                   $("#paymentlink_form")[0].reset();
                   $('.linkdetailsModal').modal('show');
                           
                    $('#item_name-m').html(data.paymentlink.item_name);
                    $('#price-m').html(data.paymentlink.countrycurrencies.currency_symbol+data.paymentlink.price);
                    $('#discount_type-m').html(data.paymentlink.discount_type);
                    $('#discount-m').html(data.paymentlink.discount);
                    $('#item_description-m').html(data.paymentlink.item_description);
                    $('#category_id-m').html(data.paymentlink.categories.name);
                    $('#sale_type_id-m').html(data.paymentlink.payment_sale_type.name);
                    $('#payment_gateway-m').html((data.paymentlink.payment_gateway).replace(/_/g, " ").replace('payment gateway',''));
                  
                    $('#link-m').html('<input type="text" class="form-control" id="link" name="link" value="'+data.link+'" readonly style="width: 100%;display: initial;"><button class="btn btn-primary btn-copy"><i class="far fa-copy"></i></button>');
                  
                    },
                      error: function (err) {
                        $('.validation-error').html('');
                        
                    $.each(err.responseJSON.errors, function (key, value) {
                        $("#" + key).next().html(value[0]);
                        $("#" + key).next().removeClass('d-none');
                   
                    });
                },
            }); 
       
    });
</script>
<script>
    $(document).on('click','.btn-copy',function(){
    $(".copied").html('');
    /* Get the text field */
    var copyText = document.getElementById('link');
   
    const unsecuredCopyToClipboard = (text) => { const textArea = document.createElement("textarea"); textArea.value=text; document.body.appendChild(textArea); textArea.focus();textArea.select(); try{document.execCommand('copy')}catch(err){console.error('Unable to copy to clipboard',err)}document.body.removeChild(textArea)};
    if (window.isSecureContext && navigator.clipboard) {
    /* Select the text field */
    copyText.select();
    
    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);
  } else {
    unsecuredCopyToClipboard(copyText.value);
  }

  $('<td><h6 class="mt-0 mx-4 text-success font-size-14 copied">Copied!</h6></td>').insertAfter("#copied");
  $(".copied").delay(3000).fadeOut(400);
});
</script>
@endpush
