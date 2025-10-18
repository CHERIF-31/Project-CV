@extends('backend.layouts.app')

@section('content')

<!-- Site wrapper -->
<div class="wrapper">
@include('flash.susses')
@include('flash.supprime')
@include('flash.modifier')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Entreprise</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Domaine</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Entreprise</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          #
                      </th>
                      <th style="width: 20%">
                          Domaine Name
                      </th>
                      <th style="width: 10%">
                         Members
                      </th>
                      <th>
                          Project Progress
                      </th>
                      <th style="width: 20%" class="text-center">
                          Status
                      </th>
                      <th style="width: 30%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach($entreprise as $entr)
                  <tr>
                      <td>
                          {{$loop->iteration}}
                      </td>
                      <td>
                          <a>
                              {{$entr->domaine}}
                          </a>
                          <br/>
                          <small>
                              {{$entr->created_at}}
                          </small>
                      </td>
                      <td>
                        {{$entr->nombre}}
                      </td>
                      <td class="project_progress">
                          <div class="progress progress-sm">
                              <div class="progress-bar bg-green" role="progressbar" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100" style="width: 57%">
                              </div>
                          </div>
                          <small>
                              57% Complete
                          </small>
                      </td>
                      <td class="project-state">
                          <span class="badge badge-success">{{$entr->status}}</span>
                      </td>
                      <td class="project-actions text-right">
                        <form action="{{route('entreprise.destroy',$entr->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                          <a class="btn btn-primary btn-sm" href="#">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{route('entreprise.edit',$entr->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <button type="submit" class="btn btn-danger btn-sm">
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </button>
                          </form>
                      </td>
                      @endforeach
                  </tr>

              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!--aside class="control-sidebar control-sidebar-dark">
    <-- Control sidebar content goes here >
  </aside-->
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection()
