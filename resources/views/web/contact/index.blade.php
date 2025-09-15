@extends('web.layout')
@section('title')
    Contact Us
@endsection
@section('main')
		<!-- Hero-area -->
		<div class="hero-area section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url({{ asset('web/img/page-background.jpg') }})"></div>

			<!-- /Backgound Image -->

			<div class="container">
				<div class="row">
					<div class="col-md-10 col-md-offset-1 text-center">
						<ul class="hero-area-tree">
							<li><a href="index.html">{{__("web.home")}}</a></li>
							<li>{{__("web.contact")}}</li>
						</ul>
						<h1 class="white-text">{{__("web.getInTouch")}}</h1>

					</div>
				</div>
			</div>

		</div>
		<!-- /Hero-area -->

		<!-- Contact -->
		<div id="contact" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- contact form -->
					<div class="col-md-6">
						<div class="contact-form">
							<h4>{{__("web.sendMsgDesc")}}</h4>
							@include('web.inc.message-ajax')
							<form id="contact-form">
								@csrf
								<input class="input" type="text" name="name" placeholder="{{__("web.name")}}">
								<input class="input" type="email" name="email" placeholder="{{__("web.email")}}">
								<input class="input" type="text" name="subject" placeholder="{{__("web.subject")}}">
								<textarea class="input" name="body" placeholder="{{__("web.enterMsg")}}"></textarea>
								<button id ="contact-form-btn" type="submit" class="main-button icon-button pull-right">{{__("web.sendMsgBtn")}}</button>
							</form>
						</div>
					</div>
					<!-- /contact form -->

					<!-- contact information -->
					<div class="col-md-5 col-md-offset-1">
						<h4>{{__("web.contactInfo")}}</h4>
						<ul class="contact-details">
							<li><i class="fa fa-envelope"></i>{{$setting->email}}</li>
							<li><i class="fa fa-phone"></i>{{$setting->phone}}</li>
						</ul>

					</div>
					<!-- contact information -->

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact -->

@endsection

@section('scripts')
		<script>
			$('#success-div').hide()
			$('#errors-div').hide()
			$("#contact-form-btn").click(function(e){
				$('#success-div').hide()
				$('#errors-div').hide()
				$('#success-div').empty()
				$('#errors-div').empty()
				e.preventDefault()
				let formData = new FormData($('#contact-form')[0]);
				$.ajax({
					type:"POST",
					url:"{{url('contact/message/send')}}",
					data: formData,
					contentType:false,
					processData :false,
					success:function (data)
					{
						$('#success-div').show()
						$('#success-div').text(data.success);
					},error :function(xhr,starus,error)
					{
						$('#errors-div').show()
						$.each(xhr.responseJSON.errors, function (key,item)
						{
							$('#errors-div').append("<p>"+item+"</p>")

						});

					}
			
				})	
			})	
		</script>
@endsection