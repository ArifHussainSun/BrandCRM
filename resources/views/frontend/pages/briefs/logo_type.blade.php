@extends('frontend.layouts.brief.master')
@section('container')
@push('customStyles')

@endpush


<form class="step-form" action="{{route('front.personalinfo')}}">

<section class="step-container">
			<div class="step-center top-mob">
				<div class="container">
					<div class="step-heading">
						<h1>Which Logo Type Are You Looking For?</h1>
					</div>
					<div class="step-input-area max-900">
						<div class="row">
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Emblem" id="myCheckbox1">
								<label class="step-label step-pt-20" for="myCheckbox1">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/1.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Emblem</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Illustrated" id="myCheckbox2">
								<label class="step-label step-pt-20" for="myCheckbox2">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/2.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Illustrated</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Silhouette" id="myCheckbox3">
								<label class="step-label step-pt-20" for="myCheckbox3">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/3.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Silhouette</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Abstract" id="myCheckbox4">
								<label class="step-label step-pt-20" for="myCheckbox4">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/4.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Abstract</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Font Based" id="myCheckbox5">
								<label class="step-label step-pt-20" for="myCheckbox5">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/5.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Font Based</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Calligraphic" id="myCheckbox6">
								<label class="step-label step-pt-20" for="myCheckbox6">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/6.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Calligraphic</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Initials" id="myCheckbox7">
								<label class="step-label step-pt-20" for="myCheckbox7">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/7.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Initials</h3>
								</label>
							</div>
							<div class="col-lg-3 col-md-4 col-6">
								<input type="checkbox" name = "logo_type[]" class="step-selective" value="Mascot" id="myCheckbox8">
								<label class="step-label step-pt-20" for="myCheckbox8">
								    <div class="step-img-holder">
								        <img src="{{ asset('frontend/assets/brief/images/steps/step4/8.jpg')}}" alt="">
								    </div>
									<h3 class="step-label-heading">Mascot</h3>
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

	<section class="step-footer">
		<div class="step-footer-loader" data-load-from-per="70" data-load-per="90"></div>
		<div class="container">
			<div class="step-form-submit-area">
				<input type="hidden" name="id" value="<?php echo (isset($_GET['id']) ? ($_GET['id'] > 0 ? $_GET['id'] : (!empty($id) ? $id : '')) : ''); ?>">
				<input type="hidden" name="cname" value="<?php echo (isset($_GET['cname']) ? ($_GET['cname'] > 0 ? $_GET['cname'] : (!empty($cname) ? $cname : '')) : ''); ?>">
				<input type="hidden" name="sname" value="<?php echo (isset($_GET['sname']) ? ($_GET['sname'] > 0 ? $_GET['sname'] : (!empty($sname) ? $sname : '')) : ''); ?>">
				<input type="hidden" name="logo_type[]" value="<?php echo (isset($_GET['logo_type[]']) ? ($_GET['logo_type[]'] > 0 ? $_GET['logo_type[]'] : (!empty($logo_type) ? $logo_type : '')) : ''); ?>">
				@foreach($industries as $ind)
				<input type="hidden" name="industry[]" value="{{$ind}}">
				@endforeach
				@foreach($logostyle as $ls)
				<input type="hidden" name="logo_style[]" value="{{$ls}}">
				@endforeach
				@foreach($logocolor as $lc)
				<input type="hidden" name="logo_color[]" value="{{$lc}}">
				@endforeach
				<button type="submit" class="step-form-submit">Skip >></button>
			</div>
		</div>
	</section>
</form>
@endsection