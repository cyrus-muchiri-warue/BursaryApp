@extends('template.admin.app')
@section('title')
<title>Student|Dashboard</title>
@endsection
@section('sidebar')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">student portal 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('admin/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
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
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
@endsection
@section('main-section')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
		  <form action="{{route('applications.store')}}" method="post">
		  @csrf
			  <div class="row">
				  <div class="col-md-3">
				  <div class="form-group">
						<label for="exampleSelectBorder">select institution </label>
						<select name='institution_id' class="custom-select form-control-border" id="exampleSelectBorder">
							<option hidden value=""></option>
							@foreach($institutions as $institution)
							<option value="{{$institution->id}}">{{$institution->name}}</option>
							@endforeach
						</select>
                	</div>
					<!--yearofstudy-->
					<div class="form-group">
						<label for="exampleInputBorder">Enter year of study </label>
						<input name="yearofstudy"  type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder=".form-control-border">
					</div>
					<!--yearofstudy-->
					<!--academiclevel-->
					<div class="form-group">
                  <label for="exampleSelectBorder">select academic level </label>
                  <select name='academiclevel' class="custom-select form-control-border" id="exampleSelectBorder">
                    <option value='1'>primary</option>
                    <option value='2'>high school</option>
                    <option value='3'>college & tvet</option>
                    <option value='4'>univeristy</option>
                  </select>
                </div>
					<!--academiclevel-->
					<!--admission-->
					<div class="form-group">
						<label for="exampleInputBorder">admission </label>
						<input name="admission"  type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="ct201/0014/16">
					</div>
					<!--admission-->


				  </div>
				  <div class="col-md-3">
				  		<div class="form-group">
								<label for="gender">select gender</label>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" value="1">
								<label class="form-check-label">Male</label>
								</div>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" value="2" checked="">
								<label class="form-check-label">female</label>
								</div>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="gender" value="3" checked="">
								<label class="form-check-label">others</label>
								</div>
								
                      </div>
					  	<div class="form-group">
							<label for="exampleInputBorder">Enter Date of Birth </label>
							<input name='dob' type="text" class="form-control form-control-border" id="exampleInputBorder" placeholder="23/03/1997">
						</div>
						<div class="form-group">
								<label for="gender">select parental</label>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="parentals" value="1">
								<label class="form-check-label">orphan</label>
								</div>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="parentals" value="2" checked="">
								<label class="form-check-label">single parent</label>
								</div>
								<div class="form-check">
								<input class="form-check-input" type="radio" name="parentals" value="3" >
								<label class="form-check-label">both parent alive</label>
								</div>
                      </div>
					  <div class="form-group">
								<label for="gender">Are you disabled?</label>
								<div class="form-check">
								<input name='ability' class="form-check-input" type="radio" name="ability" value="1">
								<label class="form-check-label">Yes</label>
								</div>
								<div class="form-check">
								<input name='ability' class="form-check-input" type="radio" name="ability" value="2" checked="">
								<label class="form-check-label">No</label>
								</div>
								
                      </div>

				  </div>
				  <div class="col-md-3">
					<div class="form-group">
						<label for="exampleInputBorder">Enter amount Billed </label>
						<input type="text" class="form-control form-control-border" id="exampleInputBorder" name='billed' placeholder="12000">
					</div>
					<div class="form-group">
						<label for="exampleInputBorder">Enter amount Paid </label>
						<input type="text" class="form-control form-control-border" id="exampleInputBorder"  name='paid' placeholder="12000">
					</div>
					
					<div class="form-group">
						<label for="exampleInputBorder">Enter parent(s)/Gaurdian Occupation gross income per year</label>
						<input type="text" class="form-control form-control-border" id="exampleInputBorder" name='gross' placeholder="45000">
					</div>

				  </div>
				  <div class="col-md-3">
						<div class="form-group">
								<label for="exampleSelectBorder">select constitunecy </label>
								<select name='constituency' class="custom-select form-control-border" id="exampleSelectBorder">
								<option hidden value=""></option>
								@foreach($institutions as $institution)
								<option value="{{$institution->name}}">{{$institution->name}}</option>
								@endforeach
									
								</select>
						</div>
						<div class="form-group">
						<label for="exampleSelectBorder">select ward </label>
						<select name='ward' class="custom-select form-control-border" id="exampleSelectBorder">
						<option hidden value=""></option>
						@foreach($institutions as $institution)
						<option value="{{$institution->name}}">{{$institution->name}}</option>
						@endforeach
							
						</select>
                	</div>
					<div class="form-group">
                  <label for="exampleInputBorder">Enter village</code></label>
                  <input type="text" name='village' class="form-control form-control-border" id="exampleInputBorder" placeholder="kiajai">
                </div>
					  
				   </div>
			  </div>
				<button class="btn btn-gray-200 btn-border btn-round">Submit</button>
				<a href="{{route('applications.index')}}"class="btn btn-gray-200 btn-border btn-round">Cancel</a>
		  </form>
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection