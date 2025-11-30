@extends('dashboard')

@section('admin')

@section('title')
Portofolio | Categorie
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Content Wrapper. Contains page content -->

	  <div class="container-full">
		<!-- Main content -->
		<section class="content">
            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header">						
                            <h4 class="box-title">Edit Category </h4>
                        </div>
                        <div class="box-body">
                            <form action="{{route('category.update')}}" method="POST" enctype="multipart/form-data">
                                
                                @csrf			

                                <input type="hidden" name="id" value="{{$category->id}}">	

                                <div class="form-group">
                                    <h5>Categorie <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                        @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="form-group">
                                    <h5> Image <span class="text-danger">*</span></h5>
                                    <input type="hidden" name="old_img" value="{{$category->image}}">	
                                    <div class="controls">
                                        <input type="file" id="image" name="image" class="form-control">

                                        <img src="{{ $category->image }}" alt="" id="showImg">

                                        @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="controls">
                                        <textarea id="texteditor3" name="desc"  class="form-control" required >
                                            Breve Description
                                        </textarea>     
                                    </div>
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Mettre a jour">
                                </div>

                            </form>
                            <!-- /.form -->
                        </div>
                        <!-- /.box-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	</div>
    <!-- /.content-wrapper -->

    <!--=================================
    JS SCRIPT TO PREVIEW SLIDER
    ==================================-->

    <script type="text/javascript">

        $(document).ready(function() {

            $('#image').change(function(e) {

                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $("#showImg").attr("src", e.target.result).width(80).height(80);
                }

                reader.readAsDataURL(e.target.files[0]);

            });

        });

    </script>

@endsection