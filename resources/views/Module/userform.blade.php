@extends('theme.default')

@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Donation Form</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration Details </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="quickForm" action="adddetails" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputName">Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter Full Name">
                    <span style="color: red">@error('name'){{$message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputAddress">Address</label>
                    <input type="textarea" name="address" class="form-control" id="exampleInputAddress" placeholder="Enter Address">
                     <span style="color: red">@error('address'){{$message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                     <span style="color: red">@error('email'){{$message}}@enderror</span>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Contact Number</label>
                    <input type="text" name="contactnumber" class="form-control" id="exampleInputContactNumber" placeholder="Contact Details">
                     <span style="color: red">@error('contactnumber'){{$message}}@enderror</span>
                  </div>
                   <div class="form-group" >
                  <label>Select your blood group</label>
                  <select class="form-control select2" name="bloodgroup" style="width: 100%;" id="bloodgroup">
                     <option value="">-- Select Blood Group --</option>
                     @foreach($user as $member)
                    <option value="{{$member['id']}}">{{$member['name']}}</option>
                 @endforeach
                  </select>
                    <span style="color: red">@error('bloodgroup'){{$message}}@enderror</span>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onclick="demo();">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection