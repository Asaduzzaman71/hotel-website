		@extends('admin.master')
			@section('content')

			
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Forms</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2>
						  <i class="halflings-icon edit"></i>
						  <span class="break">Add category</span>
					    </h2>
						
					</div>
			<P class="alert-success">
				<?php
					$messege=Session::get('messege');
					if($messege){
						echo $messege;
						Session::put('messege',NULL);
						}
					?>	
				</P>
           

				
				<div class="box-content">

			
		
		   <form class="form-horizontal" action="{{route('Category.update',['category'=>$category])}}" method="POST">

                @method('PATCH')
							
					<fieldset>
						
							<div class="control-group">
							  <label class="control-label" for="date01">Category Name</label>
							  <div class="controls">
							<input type="text" class="input-xlarge" name="category_name" value="{{$category->category_name}}">
								 {{$errors->first('category_name')}}
								
							  </div>
							 
							</div>

							        
						<div class="control-group">
							  <label class="control-label" for="date01">Number of rooms</label>
							  <div class="controls">
								<input type="number" class="input-xlarge" name="category_based_no_of_rooms" value="{{$category->category_based_no_of_rooms}}">
								 {{$errors->first('category_based_no_of_rooms')}}
								
							  </div>
							 
						</div>
						<div class="control-group hidden-phone">
							 <label class="control-label" for="textarea2">Category Description</label>
							  <div class="controls">
								<textarea id="summary-ckeditor" name="category_description" row="3">
									{{$category->category_description}}
								</textarea>
									{{$errors->first('category_description')}}
							 </div>
							  
						</div>

							

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Edit category</button>
								
							</div>
						  </fieldset>
						  @csrf
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->

		@endsection