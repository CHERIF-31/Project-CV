@extends('backend.layouts.app')

@section('content')
<!-- Site wrapper -->
<div class="wrapper">


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Project Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form method="POST" action="{{route('cvs.update',$cvs->id)}}">
    @csrf
    @method('PUT')
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputDescription">Description</label>
                <textarea id="inputDescription" name="presentation" class="form-control  @error('presentation') is-invalid @enderror" rows="4">{{$cvs->presentation}}</textarea>
                @error('presentation')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Domaine</label>
              <select id="inputStatus" name="domaine" class="form-control custom-select @error('domaine') is-invalid @enderror">
                <option value="Informatique" {{ $cvs->domaine == 'Informatique' ? 'selected' : '' }}>Informatique</option>
                <option value="Sience sentifique" {{ $cvs->domaine == 'Sience sentifique' ? 'selected' : '' }}>Sience sentifique</option>
                <option value="Phyqique" {{ $cvs->domaine == 'Phyqique' ? 'selected' : '' }}>Phyqique</option>
                <option value="Mathematique" {{ $cvs->domaine == 'Mathematique' ? 'selected' : '' }}>Mathematique</option>
              </select>
                @error('domaine')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Fichier de cv</label>
                <input type="file"  name="photo" id="inputClientCompany" class="form-control" >
              </div>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Place</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label for="inputEstimatedBudget">Pays</label>
                <input type="text" id="inputEstimatedBudget" name="pays" value="{{$cvs->pays}}" class="form-control  @error('pays') is-invalid @enderror">
                @error('pays')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Ville</label>
                <input type="text" id="inputSpentBudget" name="ville" value="{{$cvs->ville}}" class="form-control @error('ville') is-invalid @enderror">
                @error('ville')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Adresse</label>
                <input type="text" id="inputEstimatedDuration" name="adresse" value="{{$cvs->adresse}}" class="form-control @error('adresse') is-invalid @enderror">
                @error('adresse')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Job time</label>
                <select id="inputStatus" name="temps_jop" class="form-control custom-select">
                  <option value="Part time" {{$cvs->temps_jop == 'Part time' ? 'selected' : ''}}>Part time</option>
                  <option value="Full time" {{$cvs->temps_jop == 'Full time' ? 'selected' : ''}}>Full time</option>
                </select>
              </div>   
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <a href="{{route('home')}}" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Save Changes" class="btn btn-success float-right">
          <br><br>
        </div>
      </div>
    </section>
    </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection

