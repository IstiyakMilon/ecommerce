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
									<th>Product ID</th>
									<th>Product Name</th>
									<th>Product Description</th>
									<th>Product Image</th>
									<th>Product price</th>
									<th>Category Name</th>
									<th>Brand Name</th>
									<th>Publication Status</th> 
									<th>Action</th>
							  </tr>
						  </thead>
							@foreach( $all_product_data as $v_product)   
						  <tbody>
							<tr>
								<td>{{ $v_product->product_id}}</td>
								<td class="center">{{ $v_product->product_name}}</td>
								<td class="center">{{ $v_product->product_long_description}}</td>
								<td><img src="{{URL::to($v_product->product_image)}}" style="height:80px; width:80px;"></td>
								<td>{{ $v_product->product_price}} Tk</td>
								<td>{{ $v_product->category_name}}</td>
								<td>{{ $v_product->brand_name}}</td>
								<td class="center">
								  @if($v_product->publication_status==1)
									<span class="label label-success">Active {{$v_product->publication_status}}</span>
									@else
									<span class="label label-danger">Inactive {{$v_product->publication_status}}</span>
									@endif
								</td>
								<td class="center">
								  @if($v_product->publication_status==1)
									<a class="btn btn-danger" href="{{URL::to('/inactive_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_product/'.$v_product->product_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif
									<a class="btn btn-info" href="{{URL::to('/edit-product/'.$v_product->product_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$v_product->product_id)}}" id="delete">
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