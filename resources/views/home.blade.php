@extends('base')
@section('content')
    

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row mb-3">
            <div class="col-sm-12 mb-4 mb-xl-0">
              <h4 class="font-weight-bold text-dark">Bonjour, {{ Auth::user()->name }}</h4>
            </div>
          </div>
         User page!!
        </div>
        <!-- content-wrapper ends -->
        
      </div>
      <!-- main-panel ends -->
   
@endsection