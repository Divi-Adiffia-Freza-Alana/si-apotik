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
                <h3 class="card-title">Form Suplier</h3>
              </div>
              <!-- /.card-header -->
             
              <form action="/suplierstore" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">


                    <div class="col-6">
                      <img id="avatar" src="<?php echo (isset($data->foto_url)?$data->foto_url:""); ?>" class="avatar"> </img>
                 

                    <div class="form-group" style="margin-top:25px;">
                   <!-- <label for="exampleInputFile">Foto</label>-->
                    <div class="input-group"  style="max-width:300px;margin:auto;">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto" >
                          <label class="custom-file-label" for="exampleInputFile"><?php echo (isset($data->foto)?$data->foto:"Choose File"); ?></label>
                          <input type="hidden" id="fotolabel" name="fotolabel" value="<?php echo (isset($data->foto)?$data->foto:""); ?>">
                        </div>
                        <!--<div class="input-group-append">
                          <span class="input-group-text">Upload</span>
                        </div>-->
                      </div>
                    </div>
                    </div>
                    <div class="col-6">
                      <br>
                    <input type="hidden" name="id" id="id" value="<?php echo (isset($data->id)?$data->id:""); ?>">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Suplier </label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Suplier" value="<?php echo (isset($data->nama)?$data->nama:""); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Telp </label>
                      <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No. Hp" value="<?php echo (isset($data->no_telp)?$data->no_telp:""); ?>" required>
                    </div>
         
                  
                   
  
                  </div>
                  <div class="col-md-12">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Alamat </label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..."  id="alamat" name="alamat"><?php echo (isset($data->alamat)?$data->alamat:""); ?></textarea>
                    </div>
                </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn bg-blue">Submit</button>
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

