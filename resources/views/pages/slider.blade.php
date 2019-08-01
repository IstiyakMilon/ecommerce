
@section('slider')
<section id="slider"><!--slider-->
		<div class="container">
		  <?php
            $all_publieshed_slider = DB::table('tbl_slider')->where('publication_status', 1)->get();

      ?>
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
						@foreach($all_publieshed_slider->take(9) as $slider)
							<li data-target="#slider-carousel" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : ''}}"></li>
							@endforeach
							<!-- <li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li> -->
						</ol>
						
						<div class="carousel-inner">
						@foreach($all_publieshed_slider->take(9) as $slider)
							<div class="item @if($loop->first) active @endif">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								
								<div class="col-sm-6">
									<img src="{{asset($slider->slider_image)}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
								
							</div>
							@endforeach
						</div>
						<!--	<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('frontend/images/home/girl2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/home/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="{{asset('frontend/images/home/girl3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{asset('frontend/images/home/pricing.png')}}" class="pricing" alt="" />
								</div>
						  </div>
						-->
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
				</div>
			</div>
			
		</div>
	</section><!--/slider-->
@endsection