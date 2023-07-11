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
              <div class="card-header bg-green">
                <h3 class="card-title">Form Bahan Baku</h3>
              </div>
              <!-- /.card-header -->
             
              <form action="/bahanbakustore" method="post" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="row">


                    <div class="col-6">
                      <img id="avatar" src="<?php echo (isset($data->keeperfoto[0]->url)?$data->keeperfoto[0]->url:""); ?>" class="avatar"> </img>
                 

                    <div class="form-group" style="margin-top:25px;">
                   <!-- <label for="exampleInputFile">Foto</label>-->
                    <div class="input-group"  style="max-width:300px;margin:auto;">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="foto" name="foto" >
                          <label class="custom-file-label" for="exampleInputFile"><?php echo (isset($data->keeperfoto[0]->nama)?$data->keeperfoto[0]->nama:"Choose File"); ?></label>
                          <input type="hidden" id="fotolabel" name="fotolabel" value="<?php echo (isset($data->keeperfoto[0]->nama)?$data->keeperfoto[0]->nama:""); ?>">
                          <input type="hidden" id="id_foto" name="id_foto" value="<?php echo (isset($data->keeperfoto[0]->id)?$data->keeperfoto[0]->id:""); ?>">
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
                      <label for="exampleInputEmail1">Nama Bahan Baku </label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Bahan Baku" value="<?php echo (isset($data->nama)?$data->nama:""); ?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Stok</label>
                      <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" value="<?php echo (isset($data->stok)?$data->stok:""); ?>" required>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Satuan </label>
                      <input type="text" class="form-control" name="satuan" id="satuan" placeholder="Satuan" value="<?php echo (isset($data->satuan)?$data->satuan:""); ?>" required>
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

