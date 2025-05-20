@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('BSIT3A Student Management') }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
        <div class="row">

                  @if (session('status'))
                      <div class="alert alert-success">{{session('status')}}</div>
                  @endif

                <div class="col-6 m-auto">
                  <div class="card card-secondary">
                   <div class="card-header">
                     <h3 class="card-title">Add new Student</h3>
                   </div>

                     <form  action="{{ route('employee.store') }}" method="POST">
                      @csrf
                       <div class="col-m-12">
                        <div class="row m-4">
                         <div class="col">
                            <label
                               for="exampleInputEmail1">First Name
                            </label>
                               <input type="text" class="form-control g-2" id="fname" name="fname" placeholder="Enter your Firstname" require>
                               @error('fname') <span class="text-danger">{{$message}}</span> @enderror
                              </div>
                  
                        <div class="col">
                          <label for="exampleInputPassword1">Last Name</label>
                          <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter your Last Name">
                          @error('lname') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        </div>
                          
                    <div class="row m-4">
                        <div class="col">
                          <label for="exampleInputEmail1">Address</label>
                          <input type="text" class="form-control" id="address" name="address" placeholder="Enter Your Address">
                          @error('address') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                          

                        <div class="col">
                          <label for="exampleInputPassword1">Phone</label>
                          <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter Your Phone Number">
                          @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="text-center mb-4">
                  <button type="submit" class="btn btn-success">Submit Form</a>
                </div>

           
              </form>


                </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="content">
        <div class="container-fluid">
        <div class="row">

       
                <div class="card-head">
                     
                </div>

                <div class="card-body">

                    

                    <table class="table table-bordered table-stiped fs-1 text-black">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Address</th>
                                <th>Phone</th>
                            </tr>
                        </thead>

                        <tbody  >
                            @foreach ($employees as $items)
                            <tr>
                                
                                <td class="">{{$items->id}}</td>
                                <td>{{$items->fname}}</td>
                                <td>{{$items->lname}}</td>
                                <td>{{$items->address}}</td>
                                <td>{{$items->phone}}</td>
                                <td> 
                                    <span class="badge bg-success"><a href="{{  route('employee.edit',$items->id)}}" class="btn btn-success mx-3  "><h5>Edit</h5></a></span>
                                </td>
                                <td> 
                                    
                                <span class="badge bg-danger"><a href="{{  route('employee.delete',$items->id)}}" class="m-3 p-lg-5"><h5>Delete</h5></a></span>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                    

                
             

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
</div>
    <!-- /.content -->
@endsection