@extends('dashboard')

@section('admin')

@section('title')
Portofolio | Categorie
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

  <!-- Content Wrapper. Contains page content -->

	  <div class="container-fluid">
		<!-- Main content -->
		<section class="content">
		  <div class="row">

			<div class="col-7">
				<div class="box">
					<div class="box-header">						
						<h4 class="box-title">Categorie Liste <span class="badge badge-danger badge-pill">{{ count($categories) }}</span> </h4>
					</div>
					<div class="box-body">
						<div class="table-responsive">
							<table id="complex_header" class="table table-striped table-bordered display" style="width:100%">
								<thead>
									<tr>
										<th>Image</th>
										<th>Categorie</th>
										
										<th style="text-align: center !important;">Action</th>
									</tr>
								</thead>
								<tbody>
                                    @foreach($categories as $item)
									<tr>
										<td><img src="{{ asset($item->image) }}" alt="category image" style="width: 40px; height: 40px;"></td>
										<td>{{$item->name}}</td>
									
										<td style="text-align: center !important;">
                                         <a href="{{route('category.edit',$item->id)}}" class="btn btn-info" style="margin-right: 5px;" ><i class="fa fa-edit"></i></a>
                                         <a href="{{route('category.delete',$item->id)}}" id="delete" class="btn btn-danger" ><i class="fa fa-trash"></i></a>
                                        </td>
									</tr>
                                    @endforeach
								</tbody>

							</table>
						</div>
					</div>
				</div>
			</div>  <!-- /.col-12 1 end -->


            <!--========================================
            ADD CATEGORY SECTION 
            =========================================-->
            <div class="col-5">
                <div class="box">
                    <div class="box-header">						
                            <h4 class="box-title">Ajouter Categorie </h4>
                        </div>
                        <div class="box-body"> 
                        <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf				
                            <div class="form-group">
                                <h5>Nom <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="name" class="form-control">
                                    @error('name')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Image <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="file" id="image" name="image" class="form-control">

                                    <img src="" alt="" id="showImg">

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
                            <div class="form-group">                               
                                        <div class="controls">
                                            <fieldset>
                                                <input type="checkbox" id="checkbox_1" name="top" value="ok">
                                                <label for="checkbox_1">Top Categorie</label>
                                            </fieldset>
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
          <div class="row">

          </div>
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
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
        <script>
            CKEDITOR.replace('texteditor1');
            CKEDITOR.replace('texteditor2'); CKEDITOR.replace('texteditor3');
             CKEDITOR.replace('texteditor4');CKEDITOR.replace('texteditor5');
        </script>

@endsection