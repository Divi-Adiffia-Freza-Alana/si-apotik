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
                <h3 class="card-title">Form Barang</h3>
              </div>
              <!-- /.card-header -->
             
              <form action="/barangstore" method="post" enctype="multipart/form-data">
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
                      <label for="exampleInputEmail1">Nama Barang </label>
                      <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Barang" value="<?php echo (isset($data->nama)?$data->nama:""); ?>" required>
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select id="category" name="category" class="form-control selectcategory" style="width: 100%;">
                      <option value=<?php echo (isset($data->category[0]->id)?$data->category[0]->id:"")?> selected><?php echo (isset($data->category[0]->nama)?$data->category[0]->nama:"")?></option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Harga</label>
                      <input type="text" class="form-control" name="harga" id="harga" placeholder="harga" value="<?php echo (isset($data->harga)?$data->harga:""); ?>" required>
                    </div>
             
  
                  </div>
                  <div class="col-md-12">
                    <!-- textarea -->
                    <div class="form-group">
                      <label>Keterangan </label>
                      <textarea class="form-control" rows="3" placeholder="Enter ..."  id="keterangan" name="keterangan"><?php echo (isset($data->keterangan)?$data->keterangan:""); ?></textarea>
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

