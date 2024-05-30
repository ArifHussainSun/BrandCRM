<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
  <title>Payment Link Generator</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- App favicon -->
  <link rel="shortcut icon" href="{{ (!empty($favicon->key_value) ? asset($favicon->key_value) : asset('backend/assets/images/default/no-image.jpg')) }}">
  <link href="{{ asset('backend/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>
  <!-- Bootstrap Css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('backend/assets/css/summernote/summernote-lite.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontend/assets/css/link-generator-style.css') }}">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
      .content-wrapper { margin-left:0px; }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" align="center">
      <h1>Payment Link Generator</h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="row">
          <div class="col-md-12">
            <div class="col-md-2"></div>
            <div class="col-md-8 col-xs-12">
                <div class="col align-self-center">
                    <div class="box box-primary">
                        <div class="box-header with-border"></div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{ route('payment.link.store') }}" method="post">
                            @csrf
                            <div class="box-body">
                                  <div class="col-md-6" style="padding-left: 0px;">
                                    <div class="form-group">
                                      <label>Item name:</label>
                                      <input type="text" class="form-control" name="item_name" placeholder="Enter Item Name" required>
                                    </div>
                                  </div>
                                  <div class="col-md-6" style="padding-right: 0px;">
                                      <div class="form-group">
                                          <label>Item Price:</label>
                                          <input type="number" class="form-control" min="0" name="price" placeholder="Enter Your Price" required>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label>Discount:</label>
                                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Your Price">
                                  </div>
                                  <div class="form-group">
                                      <label>Item Description:</label>
                                      <textarea class="form-control textarea" type="text" name="item_description" placeholder="Enter Item Description"></textarea>
                                  </div>
                                  
                                  <div class="col-md-6 col-xs-6">
                                    <div class="form-group">
                                        <label>Item Category:</label>
                                        <select name="category_id" class="form-control" required>
                                            @if(!empty($categories))
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                        </select>
                                      </div>    
                                  </div>
                                  
                                  
                                  <div class="col-md-6 col-xs-6">
                                      <div class="form-group"> 
                                          <label>Payment Gateway:</label> 
                                          <select name="payment_gateway" class="form-control" required> 
                                            @if(!empty($paymentGateways))
                                            @foreach($paymentGateways as $gateway)
                                                @php
                                                    $gateway_name = str_replace("payment_gateway_", "", $gateway->key_name);
                                                    $gateway_name = str_replace("_", " ", $gateway_name);
                                                    $gateway_name = Str::upper($gateway_name);
                                                @endphp
                                                <option value="{{$gateway->key_name}}" {{ $gateway->key_name == $defaultPaymentGateway->key_value ? "selected" : "" }}>{{ $gateway_name }}</option>
                                            @endforeach
                                            @endif
                                          </select> 
                                      </div>
                                  </div>
                                <div class="col-md-12 col-xs-12 no-padding">  
                                  <div class="col-md-6 col-xs-6">
                                      <div class="form-group">
                                          <label>Sale Type:</label>
                                          <div class="radio">
                                            @if(!empty($sale_types))
                                            @foreach($sale_types as $sale_type)
                                               
                                                    <label>
                                                        <input type="radio" class="form-check-input" name="sale_type" value="{{ $sale_type->id }}" {{ (!empty($sale_type->name) && $sale_type->name == "Fresh Sales" ? "checked" : "" ) }} required> {{ $sale_type->name }}
                                                    </label>
                                                
                                            @endforeach
                                            @endif
                                          </div>
                                      </div>
                                  </div>
                                  
                                </div>
                                
                                  <div class="col-md-12 col-xs-12">
                                    <input type="hidden" name="payment_type" value="straight">
                                    <input type="submit" class="btn btn-primary" value="Submit">
                                  </div>
                                  
                                </div>

                            </div>
                        </form>
                      </div>
                </div>
              </div>
            <div class="col-md-2"></div>
            </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<!-- JAVASCRIPT -->
<script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>

<!-- App js -->
<script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/parsleyjs/parsley.min.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/form-validation.init.js')}}"></script>

<script src="{{ asset('backend/assets/libs/summernote/summernote-lite.min.js') }}"></script>
  <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
   
    $(document).ready(function() {
    $('.textarea').summernote({
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
    
    $("#discount").keypress(function(event) {
        // Allow only backspace and delete
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.keyCode < 48 || event.keyCode > 57) {
                event.preventDefault(); 
            }   
        }
    });
    
    $("#discount").keyup(function(){
        var input_Val = $('#discount').val();
        var val = input_Val.replace(/\s/g, "");
        $(this).val(val);
      });
  </script>

</body>
</html>
