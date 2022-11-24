@extends('admin.layouts.main')

@section('content')
    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Slider Tables</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page">Slider Tables</li>
            </ol>
        </div>

        <div class="row">
        <div class="col-lg-12 mb-4">
            <!-- Simple Tables -->
            <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold " style="color:  #344f63">All Slider </h6>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>SN</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @if (count($sliders)>0)
                        @foreach ($sliders as $key=>$slider)
                            <tr>
                                <td><a href="#">{{ $key+1 }}</a></td> {{-- $key+1 to increment the $key --}}
                                <td><img src="{{ Storage::url($slider->image) }}" alt=".." width="100"></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{$slider->id}}">
                                        Delete 
                                    </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action=" {{ route('slider.destroy', [$slider->id]) }} " method="POST">
                                                @csrf
                                                @method('DELETE') 
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" data-dismiss="submit">Delete</button>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </td> 
                            </tr>
                        @endforeach
                    @else 
                        <td>No slider created yet</td>
                    @endif
                    
                </tbody>
                </table>

            </div>
            <div class="card-footer"></div>
            </div>
        </div>
        </div>
        <!--Row-->
    </div>

    <!---Container Fluid-->

    <script type="text/javascript">
        function confirmDelete(){
            console.log("massarh");
            let a = confirm('Are you sure you want to delete?');
            console.log(a);
            return a;
        }
    </script>
@endsection