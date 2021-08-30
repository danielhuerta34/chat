@extends('layouts.master')

@section('content')

<style>
li.nav-item.active {
	background: #343a40;
}

li.nav-item:hover {
	background-color: #343a40;
}
</style>
<section class="content mt-4">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $users[0]["total"] }}</h3>

                <p>Usuarios</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('users') }}" class="small-box-footer">More info <i class="fa fa-info-circle"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $chat[0]["total"] }}</h3>

                <p>Mensajes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('chat') }}" class="small-box-footer">More info <i class="fa fa-info-circle"></i></a>
            </div>
          </div>
          <!-- ./col -->
        
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>


<!-- Main content -->
<div class="content">
	<div class="container-fluid">
		
	</div><!-- /.container-fluid -->
</div>
<!-- /.content -->
<script src="{{asset('js/jquery.min.js')}}"></script>
@endsection