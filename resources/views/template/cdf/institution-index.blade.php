@extends('template\global\app')
@section('title')
<title>CDF|Dashboard</title>
@endsection

@section('sidebar')
<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('dashboard/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
						</div>
			<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{Auth::user()->name}}
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						
						
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Bursary kenya</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('cdf.applications.index')}}">
											<span class="sub-item">Application History</span>
										</a>
									</li>
									
									<li>
										<a href="{{route('applications.create')}}">
											<span class="sub-item">Make Application</span>
										</a>
									</li>
									<li>
										<a href="{{route('institutions.index')}}">
											<span class="sub-item">Institution</span>
										</a>
									</li>
									
								</ul>
							</div>
						
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Institution</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{route('institutions.index')}}">
											<span class="sub-item">All institutions</span>
										</a>
									</li>
									
									<li>
										<a href="{{route('institutions.create')}}">
											<span class="sub-item">Add institution</span>
										</a>
									</li>
									
									
								</ul>
							</div>
						
								</ul>
							</div>
						</li>
						
						
						
					</ul>
				</div>
			</div>
		</div>
@endsection
@section('main-section')


<div class="card ">
								<div class="card-header">
									<h4 class="card-title">My Applications</h4>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<div id="basic-datatables_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="basic-datatables_length"><label>Show <select name="basic-datatables_length" aria-controls="basic-datatables" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="basic-datatables_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="basic-datatables"></label></div></div></div><div class="row"><div class="col-sm-12"><table id="basic-datatables" class="display table table-striped table-hover dataTable" role="grid" aria-describedby="basic-datatables_info">
											<thead>
												<tr role="row">
													<th class="sorting_asc" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 134.719px;">No.</th>
													<th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103.812px;">Institution Name</th>
													<th class="sorting" tabindex="0" aria-controls="basic-datatables" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 34.2969px;">institution Code</th>
													</tr>
											</thead>
											<tfoot>
												<tr>
													
													<th rowspan="1" colspan="1">No.</th>
													<th rowspan="1" colspan="1">Institution Name</th>
													<th rowspan="1" colspan="1">Institution code</th>
													
												</tr>
											</tfoot>
											<tbody>
										@foreach($institutions as $institution)
										
											<tr role="row" class="odd">
													<td class="sorting_1">{{$loop->index+1}}</td>
													<td>{{$institution->name}}</td>
													<td>{{$institution->user_id}}</td>
													
													
													
											</tr>
										
										@endforeach
												</tbody>
										</table>
									</div>
								</div>
								<div class="row">
									
										<div class="col-sm-12 col-md-7">
										
										</div>
									</div>
								</div>
								</div>
								</div>
							</div>
						
					
@endsection