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
            <h1>Post Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
              <li class="breadcrumb-item active">Post Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <form action="{{route('entreprise.store')}}" method="POST">
    @csrf
    <!-- Main content -->
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
                <textarea id="inputDescription" class="form-control @error('description') is-invalid @enderror" name="description" rows="4">{{old('description')}}</textarea>
                @error('description')
                  <span class="invalid-feefback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Domaine</label>
                <select id="inputStatus" name="domaine" class="form-control custom-select @error('domaine') is-invalid @enderror">
                  <option disabled {{old('domaine') ? '' : 'selected'}}>Select one</option>
                  <option value="Informatique" {{old('domaine')=='Informatique' ? 'selected' : ''}}>Informatique</option>
                  <option value="Sience sentifique" {{old('domaine')=='Sience sentifique' ? 'selected' : ''}}>Sience sentifique</option>
                  <option value="Phyqique" {{old('domaine')=='Phyqique' ? 'selected' : ''}}>Phyqique</option>
                  <option value="Mathematique" {{old('domaine')=='Mathematique' ? 'selected' : ''}}>Mathematique</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Nombre</label>
                <input type="number" id="inputProjectLeader" name="nombre" class="form-control  @error('nombre') is-invalid @enderror ">
                @error('nombre')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Price</label>
                <input type="number" id="inputProjectLeader" name="dollar" class="form-control  @error('dollar') is-invalid @enderror">
                @error('dollar')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Photo</label>
                <input type="file" id="inputClientCompany" name="photo" class="form-control  @error('photo') is-invalid @enderror">
                @error('photo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
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
                <input type="text" id="inputEstimatedBudget" name="pays" class="form-control @error('pays') is-invalid @enderror" value="{{old('pays')}}">
                @error('pays')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Ville</label>
                <input type="text" id="inputSpentBudget" name="ville" class="form-control @error('ville') is-invalid @enderror" value="{{old('ville')}}">
                @error('ville')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputEstimatedDuration">Adresse</label>
                <input type="text" id="inputEstimatedDuration" name="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{old('adresse')}}">
                @error('adresse')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
              </div>
              <div class="form-group">
                <label for="inputStatus">Job time</label>
                <select id="inputStatus" name="temps_jop" class="form-control custom-select @error('temps_jop') is-invalid @enderror">
                  <option selected disabled>Select one</option>
                  <option value="Part time" {{old('temps_jop') == 'Part time' ? 'selected' : ''}}>Part time</option>
                  <option value="Full time" {{old('temps_jop') == 'Full time' ? 'selected' : ''}}>Full time</option>
                </select>
                @error('temps_jop')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                  </span>
                @enderror
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
          <input type="submit" value="Create new Project" class="btn btn-success float-right">
        </div>
      </div>
    </section>
    </form>
    <br>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
@endsection