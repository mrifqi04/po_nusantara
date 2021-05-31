@extends('layouts.backend')

@section('content')
    <div class="page-wrapper">
				<div class="container-fluid">
					<div class="row">
                        <div class="col-md-12">
                            							
							<div class="card shadow-sm ctm-border-radius">
								<div class="card-body align-center">
									<h4 class="card-title float-left mb-0 mt-2">List Users</h4>									
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
														<th>ID</th>
														<th>Identitas User</th>														
														<th>Kontak User</th>
														<th>Roles</th>
														<th>Actions</th>
													</tr>
												</thead>
												<tbody>
                          						@foreach($users as $i => $item)
													<tr>
														<td>{{ $i+1 }}</td>
                            							<td>{{ $item->id }}</td>
														<td>
															{{ $item->name }} <br>
															{{ $item->email }}
														</td>														
														<td>
															{{ $item->alamat }} <br>
															{{ $item->no_telp }}
														</td>
														<td>{{ $item->role->role }}</td>
														<td class="text-left" align="center">
															<div class="table-action">
															{{ link_to_route('users.edit','Edit', $item->id, ['class' => 'btn btn-sm btn-primary']) }}
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
																			'url' => ['/admin/devices', $item->id],
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
@endsection
