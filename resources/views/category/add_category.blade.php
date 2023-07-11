@extends('include.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-sm-12">
            @if (Session::has('status'))
            
              <div class="alert alert-danger" role="alert">
              {{Session::get('message')}}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              </div>
             
            @endif
        
          </div>
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header bg-blue">
                <h3 class="card-title">Form Category</h3>
              </div>
              <!-- /.card-header -->
             
              <form action="/categorystore" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  
                  <div class="form-group col-md-6">
                    <label for="exampleInputEmail1">Nama Category </label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Menu" value="<?php echo (isset($data->nama)?$data->nama:""); ?>" required>
                  </div>
                  <div class="col-md-12">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Deskripsi </label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..."  id="keterangan" name="keterangan"><?php echo (isset($data->deskripsi)?$data->deskripsi:""); ?></textarea>
                    </div>
                </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn bg-green">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @stop

