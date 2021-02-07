@extends('layouts/app')
@section('content')
 <!-- Page Wrapper -->
 <div id="wrapper">
    @include('include/sidebar')


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        @include('include/topbar')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Create Issue</h1>
          <p class="mb-4">Create ticket for : {{ $project->project }}</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">New Issue Data</h6>
            </div>
            <div class="card-body">
                <div class="sbp-preview">
                    <div class="sbp-preview-content">
                        <form action="/issue/{{ $project->id }}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group row">
                                <label for="os" class="col-md-4 col-form-label text-md-right">{{ __('OS') }}</label>

                                <div class="col-md-6">
                                    <select id="os" name="os" class="form-control @error('os') is-invalid @enderror" required autocomplete="" autofocus >
                                        <option value="Windows">Windows</option>
                                        <option value="Linux">Linux</option>
                                        <option value="Mac">Mac</option>
                                        <option value="Android">Android</option>
                                        <option value="IOS">IOS</option>
                                        <option value="Other">Other</option>
                                      </select>

                                    @error('os')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="risk" class="col-md-4 col-form-label text-md-right">{{ __('Risk') }}</label>

                                    <div class="col-md-6">
                                        <select id="risk" name="risk" class="form-control @error('risk') is-invalid @enderror" required autocomplete="" autofocus >
                                            <option value="Low">Low</option>
                                            <option value="Medium">Medium</option>
                                            <option value="High">High</option>
                                          </select>

                                    @error('risk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="issue" class="col-md-4 col-form-label text-md-right">{{ __('Issue Type') }}</label>

                                    <div class="col-md-6">
                                        <select id="issue" name="issue" class="form-control @error('issue') is-invalid @enderror" required autocomplete="" autofocus >
                                            <option value="Runtime Error">Runtime Error</option>
                                            <option value="Logic Error">Logic Error</option>
                                            <option value="General Issue">General Issue</option>
                                            <option value="Other">Other</option>
                                          </select>

                                    @error('issue')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Issue Title') }}</label>

                                <div class="col-md-6">
                                    <input type="text" id="title" name="title" class="form-control @error('issue') is-invalid @enderror" required autocomplete="" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea  type="text" rows="8" cols="50" class="form-control @error('dexcription') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="Project Description" autofocus></textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create Issue') }}
                                    </button>
                                </div>
                                <div class="col-sm-4">
                                    <a href="/projects" class="btn btn-info">  {{ __('Back') }}</a>
                                    </div>
                                </div>
                            </div>
                            </form>

                    </div>  </div>

                </div>


              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->
@endsection
