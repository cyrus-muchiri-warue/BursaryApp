@extends('template\global\app')
@section('title')
<title>Student|Dashboard</title>
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
            <a href="{{route('applications.index')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
              <p class="text">My Applications</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
              <p>My Profile</p>
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
<form action="{{route('applications.update',$application[0]->id)}}" method="post">
@csrf
@method('put')
	<div class="row">
		
		<div class="col-md-3">
		<div class="form-group form-floating-label">
			<select class="form-control input-border-bottom" id="selectFloatingLabel" name="institution" required="">
				<option value="" class="hidden">&nbsp;</option>

				@foreach($institutions as $institution)
				<option value="{{$institution->id}}">{{$institution->name}}</option>
				@endforeach
				
				
			</select>
			<label for="selectFloatingLabel" class="placeholder">Select Institution</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="yearofstudy" value="{{$application[0]->yearofstudy}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="" >
			<label for="inputFloatingLabel" class="placeholder">Enter Year of study</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="academiclevel" value="{{$application[0]->academiclevel}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter Academic Level</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="admission"  value="{{$application[0]->admission}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter Admission Number</label>
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-check">
			<label>Gender</label><br>
			<label class="form-radio-label">
				<input class="form-radio-input" type="radio" name="gender" value="{{$application[0]->gender}}" checked>
				<span class="form-radio-sign">Male</span>
			</label>
			<label class="form-radio-label ml-3">
				<input class="form-radio-input" type="radio" name="gender" value="{{$application[0]->gender}}">
				<span class="form-radio-sign">Female</span>
			</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="dob" value="{{$application[0]->dob}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter date of birth</label>
		</div>
		<div class="form-check">
			<label>Parental</label><br>
			<label class="form-radio-label block ml-3">
				<input class="form-radio-input " type="radio" name="parentals" value="Both Parent Alive"  >
				<span class="form-radio-sign">Both Parent Alive</span>
			</label>
			<label class="form-radio-label block ml-3">
				<input class="form-radio-input" type="radio" name="parentals" value="Single Parent" checked>
				<span class="form-radio-sign">Single Parent</span>
			</label>
			<label class="form-radio-label block ml-3">
				<input class="form-radio-input" type="radio" name="parentals" value="Orphan">
				<span class="form-radio-sign">Orphan</span>
			</label>
		</div>
		<div class="form-check">
			<label>Are you disabled?</label><br>
			
			<label class="form-radio-label block ml-3">
				<input class="form-radio-input" type="radio" name="ability" value="1" @if($application[0]->ability==1) checked @endif>
				<span class="form-radio-sign">Yes</span>
			</label>
			<label class="form-radio-label block ml-3">
				<input class="form-radio-input" type="radio" name="ability" value="0"  @if($application[0]->ability==0) checked @endif>
				<span class="form-radio-sign">No</span>
			</label>
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group form-floating-label">
			<input name="billed" value="{{$application[0]->billed}}"id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter total fee billed</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="paid" value="{{$application[0]->paid}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter paid</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="outstanding" value="{{$application[0]->outstanding}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter outstanding fee</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="occupation" value="{{$application[0]->occupation}}" id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label for="inputFloatingLabel" class="placeholder">Enter parent/Gaurdian occupation</label>
		</div>
		</div>
		<div class="col-md-3">
		<div class="form-group form-floating-label">
			<select class="form-control input-border-bottom" id="selectFloatingLabel" name="constituency" value="{{$application[0]->constituency}}" required="">
				<option value="" class="hidden">&nbsp;</option>
				<option value="kiajai">kianjai</option>
				<option value="kiajai">Nchiiru</option>
				<option value="kiajai">kianjai</option>
				<option value="kiajai">miathene</option>
				<option value="kiajai">ngundune</option>
			</select>
			<label for="selectFloatingLabel" class="placeholder">Select Constituency</label>
		</div>
		<div class="form-group form-floating-label">
			<select name="ward" value="{{$application[0]->ward}}"class="form-control input-border-bottom" id="selectFloatingLabel" required="">
				<option value="" class="hidden">&nbsp;</option>
				<option value="kiajai-a">kianjai-A</option>
				<option value="kiajai-b">Nchiiru-B</option>
				<option value="kiajai-c">kianjai-C</option>
				<option value="kiajai-d">miathene-D</option>
				<option value="kiajai-e">ngundune-E</option>
			</select>
			<label for="selectFloatingLabel" class="placeholder">Select Ward</label>
		</div>
		<div class="form-group form-floating-label">
			<input name="village" value="{{$application[0]->village}}"id="inputFloatingLabel" type="text" class="form-control input-border-bottom" required="">
			<label  for="inputFloatingLabel" class="placeholder">Enter Village Name</label>
		</div>
		</div>
	</div>
	<button class="btn btn-primary btn-border btn-round">Submit</button>
	<a href="{{route('applications.index')}}"class="btn btn-primary btn-border btn-round">Cancel</a>
</form>
@endsection
