@extends('template.admin.app')
@section('title')
<title>CDF|Dashboard</title>
@endsection
@section('sidebar')
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">cdf official</span>
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
            <a href="{{route('cdf.applications.index')}}" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
            </svg>
              <p class="text">Applications</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
              <p>Institution</p>
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
        <!--content goes here-->
@if(count($allocations)>0)
<div class="card">
<div class="card-header flex justify-between">
	<div class="card-title">Allocation Details</div>
		<div>
			<form action="{{route('applications.allocations.destroy',[$allocations[0]->application->id,$allocations[0]->id])}}" method="post" id="delete-form-{{$allocations[0]->id}}" >
			@method('DELETE')
 			@csrf
			</form>
		
			<a href=""class="btn " onclick="if(confirm('Are you sure you want to delete?'))
			{
				event.preventDefault();
				
				document.getElementById('delete-form-{{$allocations[0]->id}}').submit();
			}else{
				event.preventDefault();
			}
			">delete</a>
									

     <a href="{{route('applications.allocations.edit',[$allocations[0]->application->id,$allocations[0]->id])}}" class="btn">
				edit
			</a>        
		</div>
							
</div>
              <!-- /.card-header -->
 <div class="card-body p-0">
      <table class="table table-striped">
       <thead>
				  <tr>
            <th scope="col">No.</th>
              <th scope="col">score</th>
              <th scope="col">status</th>
              <th scope="col">application_id</th>
              <th scope="col">amountAwarded</th>
              <th scope="col">description</th>
              <th scope="col">chequeNumber</th>
					  </tr>
        </thead>
      <tbody>
        @if($allocations[0]->application->score>0)
				  <tr>
          <td>1</td> 
          <td>{{$allocations[0]->application->score*10}}%</td> 
          <td>@php $message= $allocations[0]->status>0? 'Approved': "Rejected"; 
              echo $message;
              @endphp</td> 
          <td>{{$allocations[0]->application->id}}</td> 
          <td>{{$allocations[0]->amountAwarded}}</td> 
          <td>Your application was processed successfully</td> 
          <td>{{$allocations[0]->chequeNumber}}</td> 
          </tr>

        @else{
          <tr>
          <td>1</td> 
          <td>{{$allocations[0]->application->score*10}}%</td> 
          <td>@php $message= $allocations[0]->status>0? 'Approved': "Rejected"; 
              echo $message;
              @endphp</td> 
          <td>{{$allocations[0]->application->id}}</td> 
          <td>{{$allocations[0]->amountAwarded}}</td> 
          <td>Sorry,You did not Qualify for Bursary  allocation</td> 
          <td>{{$allocations[0]->chequeNumber}}</td> 
          </tr>
        }
        @endif
                 
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
			@else
			<div>
							<div class="card p-3">
								<div class="d-flex align-items-center px-2">
									<span class="stamp stamp-md bg-warning mr-3">
									<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
									</svg>
								</span>
									<div>
										<h5 class="mb-1"><b><a href="#"> <small>feedback</small></a></b></h5>
										<p class="text-muted">You application was received successully,and is Currently being Processed.</p>
									</div>
								</div>
							</div>

							</div>

			@endif

        <!--end content goes here-->
       
         
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection
