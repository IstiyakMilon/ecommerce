@extends('admin_layout');

@section('admin_content')

			<!-- start: Content -->
			<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			@if(Session::has('message'))
					<div class="alert alert-success">
					{{ Session::get('message')}}
					{{ Session::put('message', null)}}
					</div>
			@endif
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
									<th>Slider ID</th>
									<th>Slider Image</th>
                  <th>Publication Status</th>
									<th>Action</th>
							  </tr>
						  </thead>
							@foreach( $all_slider as $v_slider)   
						  <tbody>
							<tr>
								<td>{{ $v_slider->slider_id}}</td>
								<td><img src="{{URL::to($v_slider->slider_image)}}" style="height:240px; width:360px;"></td>
								<td class="center">
								  @if($v_slider->publication_status==1)
									<span class="label label-success">Active {{$v_slider->publication_status}}</span>
									@else
									<span class="label label-danger">Inactive {{$v_slider->publication_status}}</span>
									@endif
								</td>
								<td class="center">
								  @if($v_slider->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive-slider/'.$v_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active-slider/'.$v_slider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$v_slider->slider_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr> 
							
						  </tbody>
							@endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
    

	</div><!--/.fluid-container-->
@endsection