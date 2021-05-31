@extends('layouts.backend')

@section('content')
    <div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <div class="col-md-12">
                            							
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Services</h4>
									<ul class="nav nav-tabs float-right border-0 tab-list-emp">
										<li class="nav-item pl-3">
											<button class="btn btn-theme text-white ctm-border-radius button-1" data-toggle="modal" data-target="#add-Service">Add New</button>
										</li>
									</ul>									
								</div>
							</div>
                            @if (session()->has('msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif
							<div class="ctm-border-radius shadow-sm card">
								<div class="card-body">
									<!--Content table-->
									<div class="table-back employee-office-table">
										<div class="table-responsive">
											<table id="data-table" class="table custom-table table-hover table-hover">
												<thead>
													<tr>
														<th>No</th>														
														<th>Nama Service</th>																												
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($services as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>                            							
														<td>{{ $item->nama_service }}</td>														
														<td class="text-left" align="center">
															<div class="table-action">
															{{ link_to_route('services.edit','Edit', $item->id, ['class' => 'btn btn-sm btn-primary']) }}
															<button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteConfirm{{$item->id}}"><span class="lnr lnr-trash">Delete</span></button>
															<div class="modal fade" id="deleteConfirm{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
																<div class="modal-dialog modal-sm">
																	<div class="modal-content">
																		<div class="modal-header">
																			<h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
																		</div>
																		<div class="modal-body">
																			Are you sure want to delete  this record?
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																			{!! Form::open([
																			'method' => 'DELETE',
																			'url' => ['/admin/services', $item->id],
																			'style' => 'display:inline'
																			]) !!}
																			{!! Form::button('Delete', array(
																					'type' => 'submit',
																					'class' => 'btn btn-danger btn-sm',
																					'title' => 'Confirm Delete'
																			)) !!}
																			{!! Form::close() !!}
																		</div>
																	</div>
																</div>
															</div>
														</div>
														</td>
													</tr>
												@endforeach
												</tbody>
											</table>
										</div>
									</div>
									<!-- /Content Table -->
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<!--/Content-->     
			<div class="modal fade" id="add-Service" role="document">
				<div class="modal-dialog modal-dialog-centered">
					<div class="modal-content">
						<!-- Modal body -->
						<div class="modal-body style-add-modal">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title mb-3">Add New Service</h4>
							@if ($errors->any())
							<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
										aria-hidden="true">×</span></button>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</div>
							@endif
	
							{!! Form::open(['url' => '/admin/services', 'method' => 'post']) !!}
	
							@include ('admin.service.form', ['formMode' => 'create'])
	
							{!! Form::close() !!}
						</div>
					</div>
				</div>
			</div>   
@endsection
