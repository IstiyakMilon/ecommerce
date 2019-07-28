@extends('admin_layout')

@section('admin_content')
	
<!-- start: Content -->
<div id="content" class="span10">
			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Product</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
					</div>
					<div class="box-content">
						@if(Session::has('message'))
							<div class="alert alert-success">
							{{ Session::get('message')}}
							{{ Session::put('message', null)}}
							</div>
						@endif
						<form class="form-horizontal" action="{{url('/save-product')}}" method="POST" enctype="multipart/form-data">
              @csrf
						  <fieldset>
							<!-- <div class="control-group">
							  <label class="control-label" for="typeahead">Auto complete </label>
							   <div class="controls">
								<input type="text" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" data-source='["Alabama","Alaska","Arizona","Arkansas","California","Colorado","Connecticut","Delaware","Florida","Georgia","Hawaii","Idaho","Illinois","Indiana","Iowa","Kansas","Kentucky","Louisiana","Maine","Maryland","Massachusetts","Michigan","Minnesota","Mississippi","Missouri","Montana","Nebraska","Nevada","New Hampshire","New Jersey","New Mexico","New York","North Dakota","North Carolina","Ohio","Oklahoma","Oregon","Pennsylvania","Rhode Island","South Carolina","South Dakota","Tennessee","Texas","Utah","Vermont","Virginia","Washington","West Virginia","Wisconsin","Wyoming"]'>
								<p class="help-block">Start typing to activate auto complete!</p>
							  </div> 
              </div> -->
              <div class="control-group">
								<label class="control-label" for="selectError3">Category Name</label>
								<div class="controls">
								  <select id="selectError3" name="category_id">
									<option disabled selected> Select Category</option>
                  <?php
                  $all_publieshed_category = DB::table('tbl_category')->where('publication_status', 1)->get();
                  ?>
							    @foreach($all_publieshed_category as $category)
                  <option value="{{$category->category_id}}">{{ $category->category_name}}</option>
                  @endforeach
								  </select>
								</div>
                </div>
                <div class="control-group">
								<label class="control-label" for="selectError3">Brand Name</label>
								<div class="controls">
								  <select id="selectError3" name="brand_id">
									<option disabled selected> Select Brand</option>
                  <?php
                  $all_publieshed_brand = DB::table('tbl_brand')->where('publication_status', 1)->get();
                  ?>
                  @foreach($all_publieshed_brand as $brand)
                  <option value="{{$brand->brand_id}}">{{ $brand->brand_name}}</option>
                  @endforeach
								  </select>
								</div>
							  </div>
							<div class="control-group">
							  <label class="control-label" for="date01">Product Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_name" required>
							  </div>
							</div>        
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Short Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_short_description" rows="3" required=""></textarea>
							  </div>
              </div>
              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Product Long Description</label>
							  <div class="controls">
								<textarea class="cleditor" name="product_long_description" rows="3" required=""></textarea>
							  </div>
              </div>
              <div class="control-group">
							  <label class="control-label" for="date01">Product Price</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_price" required>
							  </div>
              </div>
              <div class="control-group">
							  <label class="control-label" for="fileInput" >Image</label>
							  <div class="controls">
								<input class="input-file uniform_on" id="fileInput" type="file" name="product_image">
							  </div>
              </div> 
              <div class="control-group">
							  <label class="control-label" for="date01">Product Size</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_size">
							  </div>
              </div>
              <div class="control-group">
							  <label class="control-label" for="date01">Product Color</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="product_color" required>
							  </div>
              </div>
              <div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Publication Status</label>
							  <div class="controls">
								<input type="checkbox" name="publication_status" value="1">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Product</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

			
    

	</div><!--/.fluid-container-->
@endsection