	@extends('admin.master')
			@section('content')
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Category list</h2>
						
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
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Category id</th>
								  <th>Room category</th>
								  <th>No of rooms</th>
								  <th>Category description</th>
								   <th>Actions</th>
							  </tr>
						  </thead>   
						  <tbody>
						  	@foreach($categories as $category)
							<tr>
								<td><a href="{{route('Category.show',['category'=>$category])}}">{{$category->id}}</a></td>
								<td class="center">{{$category->category_name}}</td>
								<td class="center">{{$category->category_based_no_of_rooms}}</td>
								<td class="center">{{$category->category_description}}</td>
								
							
								<td class="center">

									<a class="btn btn-info" href="{{route('Category.edit',['id' => $category->id])}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" onclick="return confirm('Are you sure to delete!')" href="{{URL::to('/delete_category/'.$category->id)}}">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							@endforeach
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
@endsection