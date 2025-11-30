@extends('dashboard')

@section('admin')

@section('title')
portofolio | A propos 
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


  <!-- Content Wrapper. Contains page content -->

	  <div class="container">
		<!-- Main content -->
		<section class="content">
            <div class="row">
                <div class="col-12" style="display: block;">
                    <div class="box">
                        <div class="box-header">						
                                <h4 class="box-title">Ajouter </h4>
                            </div>
                            <div class="box-body"> 
                            <form action="{{route('about.update')}}" method="POST" enctype="multipart/form-data">
                                @csrf	
                                
                                <input type="hidden" name="id" value="{{$about->id}}">	
                                <input type="hidden" name="old_img" value="{{$about->about_img}}">	
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h5> Image <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" id="image" name="about_img" class="form-control">
            
                                                <img src="{{ asset($about->about_img) }}" alt="image" id="showImg">
            
                                                @error('about_img')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                        <h5>Telephone <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="phone" class="form-control" value="+237 694011998">
                                            @error('phone')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>      
                                        </div>
                                        <div class="col-md-4">
                                        <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="email" class="form-control" value="brtankoua@gmail.com">
                                            @error('email')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                            
                                        </div>
                                </div>		
                                <div class="row"> <!-- start 7th row  -->
                                    <div class="col-md-12" style="border-bottom: 2px solid black">
                                        <div class="form-group">
                                            <h5>PRESENTATION <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title1" class="form-control" value="Je me nomme Brecht Tankoua">
                                                @error('title1')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div><br>
                                            <div class="controls">
                                                <textarea id="texteditor1" name="desc1"  class="form-control" required >
                                                    {!!$about->desc1!!}
                                                </textarea>     
                                            </div>
                                        </div>
                                    </div><br>
                                </div> <!-- end 7th row  -->
                                <h3 class="mt-4">AUTRES</h3>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                    <div class="form-group">
                                    <h5>Nombre Experience <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="exp_count" class="form-control" value="{{$about->exp_count}}">
                                        @error('exp_count')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <h5>Projets <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="proj_count" class="form-control" value="{{$about->proj_count}}">
                                            @error('proj_count')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>      
                                        </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <h5>Client Satisfait <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="hcust_count" class="form-control" value="{{$about->hcust_count}}">
                                            @error('hcust_count')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                       </div>    
                                     </div>
                                     <div class="col-md-3">
                                        <div class="form-group">
                                        <h5>Client Non Satisfait <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="ucust_count" class="form-control" value="{{$about->ucust_count}}">
                                            @error('ucust_count')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                       </div>    
                                     </div>
                                </div>
                                <h3>RESEAUX SOCIAUX</h3>
                                <div class="row mt-4">
                                    <div class="col-md-3">
                                    <div class="form-group">
                                    <h5>Facebook link <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="flink" class="form-control" value="https://web.facebook.com/agencedigitals/">
                                        @error('flink')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    </div>
                                        </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <h5>Instagram link <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="ilink" class="form-control" value="https://www.instagram.com/bertholdtankoua/">
                                            @error('ilink')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>      
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                            <h5>Gitlab link <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="gitlink" class="form-control" value="https://gitlab.com/Brecht_tankoua">
                                                @error('gitlink')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>      
                                            </div>
                                        <div class="col-md-3">
                                        <div class="form-group">
                                        <h5>Linkeldin Link <span class="text-danger"></span></h5>
                                        <div class="controls">
                                            <input type="text" name="llink" class="form-control" value="https://www.linkedin.com/in/brecht-tankoua-80b311279/">
                                            @error('llink')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                            
                                        </div>
                                </div>	
                                
                                <div class="row"> <!-- 9th row  -->
    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <h5>Specification Title <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input type="text" name="spec_title[]" class="form-control">
                                            </div>
                                        </div>  
                                    </div>  <!-- col-md-5//  -->
    
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <h5>Specification Description <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                            <input type="text" name="spec_desc[]" class="form-control">
                                            </div>
                                        </div>  
                                    </div>  <!-- col-md-5//  -->
    
                                    <div class="col-md-2" style="margin-top: 27px !important;">
                                        <span class="btn btn-success btn-md addeventmore" >
                                            <i class="fa fa-plus-circle"></i>
                                        </span>
                                    </div>  <!-- col-md-2//  -->
    
                                </div> <!-- end 9th row  -->
    
                                <div class="add_item">
    
                                </div> <!-- /.add_item -->
                    
                                <hr>
                                <div style="visibility: hidden;">
    
                                    <div class="extra_item_to_add" id="extra_item_to_add">
                            
                                        <div class="delete_extra_item_to_add" id="delete_extra_item_to_add">
                            
                                            <div class="row"> <!-- 10th row  -->
                            
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Specification Title <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="spec_title[]" class="form-control">
                                                        </div>
                                                    </div>  
                                                </div>  <!-- col-md-5//  -->
                            
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <h5>Specification Description <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                        <input type="text" name="spec_desc[]" class="form-control">
                                                        </div>
                                                    </div>  
                                                </div>  <!-- col-md-5//  -->
                            
                                                <div class="col-md-2" style="margin-top: 27px !important;">
                                                    <span class="btn btn-success btn-md addeventmore" >
                                                        <i class="fa fa-plus-circle"></i>
                                                    </span>
                                                    <span class="btn btn-danger btn-md removeeventmore">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </span>
                                                </div>  <!-- col-md-2//  -->
                            
                                            </div> <!-- end 10th row  -->
                            
                                        </div>
                            
                                    </div>
                            
                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Ajouter">
                                </div>
                            </form>
                        </div>
                    </div> <!-- /.box -->
                </div>  <!-- /.col-12 2 end -->
    
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
        <!--===============================
    AJAX JS SCRIPT FOR ADD MULTIPLE SPECIFICATIONS 
    ================================-->

    <script type="text/javascript">
        $(document).ready(function() {
            var counter = 0;
            $(document).on('click', '.addeventmore', function() {
                var extra_item_to_add = $("#extra_item_to_add").html();
                $('.add_item').append(extra_item_to_add);
                counter++;    
            }); //End to add item 
            $(document).on('click', '.removeeventmore', function() {
                $(this).closest(".delete_extra_item_to_add").remove();
                counter--
            }); //End remove item 
        }); //End Initialize Jquery Script
    </script>
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('texteditor1');
        CKEDITOR.replace('texteditor2'); CKEDITOR.replace('texteditor3');
         CKEDITOR.replace('texteditor4');CKEDITOR.replace('texteditor5');
    </script>


@endsection