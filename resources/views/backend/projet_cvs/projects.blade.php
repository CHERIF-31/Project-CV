@extends('backend.layouts.app')

@section('content')

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
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
          <h3 class="card-title">Projects</h3>

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
                          Project Name
                      </th>
                      <th style="width: 20%">
                          Domaine
                      </th>
                      <th style="width: 20%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
              @foreach ($cvs as $cv)
                  <tr>
                      <td>
                          {{ $loop->iteration }}
                      </td>
                      <td>
                          <a>
                              {{Auth::user()->name}}
                          </a>
                          <br/>
                          <small>
                              {{$cv->created_at}}
                          </small>
                      </td>
                      <td>
                          {{$cv->domaine}}
                      </td>

                      <td class="project-state">
                          <span class="badge badge-success">{{$cv->status}}</span>
                      </td>
                      <td class="project-actions text-right">
                        <form method="POST" action="{{route('cvs.destroy', $cv->id)}}">
                            @csrf
                            @method('DELETE')
                          <a class="btn btn-primary btn-sm" href="{{route('cvs.show', $cv->id)}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          <a class="btn btn-info btn-sm" href="{{route('cvs.edit', $cv->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                          <button class="btn btn-danger btn-sm" type="submit">
                              <i class="fas fa-trash">
                              </i>
                                  Delete
                          </button>
                        </form>
                      </td>
                  </tr>
              @endforeach
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
@endsection