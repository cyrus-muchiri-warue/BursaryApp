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
								<p>Bursary</p>
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

	
	
@endsection
