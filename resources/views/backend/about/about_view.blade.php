@extends('dashboard')

@section('admin')

@section('title')
portofolio | A propos
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

  <!-- Content Wrapper. Contains page content -->

	  <div class="container">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-md-12">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">A Propos  </h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
                                        <th>Contact</th>
                                        <th>Email</th>
                                        <th>Social Media</th>

										
										<th style="text-align: center !important;">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @php
                                        $count = $abouts;
                                    @endphp
                                    @foreach($abouts as $item)

									<tr>
                                    <td>{{$item->phone}}</td>
									<td>{{$item->email}}</td>
                                    <td>
                                        <p>Instagram : {{$item->instagram_link}} </p>
                                        <p>Facebook : {{$item->facebook_link}}</p>
                                        <p>Gitlab : {{$item->gitlab_link}}</p>
                                    </td>
									<td style="text-align: center !important;">
                                         <a href="{{route('about.edit',$item->id)}}" class="btn btn-info" style="margin-right: 5px;" ><i class="fa fa-edit"></i></a>
                                         
                                        </td>
									</tr>
                                    @endforeach
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>  <!-- /.col-md-6 1 end -->
            @if (count($count)<1)
            <div class="col-12" style="display: block;">
                <div class="box">
                    <div class="box-header">						
                            <h4 class="box-title">Ajouter </h4>
                        </div>
                        <div class="box-body"> 
                        <form action="{{route('about.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf	
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5> Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" id="image" name="about_img" class="form-control">
        
                                            <img src="" alt="image" id="showImg">
        
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
                                                En tant que travailleur en Freelance proposants les services (Programmation web, Marketing digital & Infographie), mon parcours diversifié m'a permis d'appliquer mes talents dans différents domaines (E-commerce, Industrie, BTP, Immobilier, etc..) faisant preuve d'adaptabilité et de polyvalence.
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
                                    <input type="text" name="exp_count" class="form-control">
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
                                        <input type="text" name="proj_count" class="form-control">
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
                                        <input type="text" name="hcust_count" class="form-control">
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
                                        <input type="text" name="ucust_count" class="form-control">
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
             
            @endif
		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
	  </div>

  <!-- /.content-wrapper -->


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