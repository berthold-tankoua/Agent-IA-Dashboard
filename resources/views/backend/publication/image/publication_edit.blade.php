@extends('main_master')

@section('content')

@section('title')
AgentIA | Editer Publication
@endsection
<!-- Menu -->
	@include('components.sidebar')
<!-- / Menu -->
<!-- Layout container -->
<div class="layout-page">
	<!-- Navbar -->
  @include('components.header')
	<!-- / Navbar -->

	<!-- Content wrapper -->
	<div class="content-wrapper">
	<!-- Content -->
	<div class="container-xxl flex-grow-1 container-p-y">
	 <form action="{{ route('publication.update') }}" method="POST" enctype="multipart/form-data">
         @csrf
		    <input type="hidden" name="id" value="{{$publication->id}}">
            <input type="hidden" name="old_img" value="{{$publication->media_url}}">
			<input type="hidden" name="extension" value="{{$publication->extension}}">
		<div class="card">
			<div class="card-header d-flex align-items-center justify-content-between">
				<h5 class="mb-0">Editer| Publication Image</h5>
				<small class="text-body-secondary float-end">Les champs marqués par (*) sont obligatoires</small>
			</div>
			<div class="card-body">
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Titre</label>
					<div class="col-sm-10">
					<input type="text" name="title" value="{{$publication->title}}" class="form-control" id="basic-default-name" required placeholder="saisir le titre" />
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Media</label>
					<div class="col-sm-10">
											<div class="mb-4">
							<label for="formFile" class="form-label">Inserer une Image </label>
							<input class="form-control" name="media[]" type="file" accept="image/*" required id="formFile" />
						</div>
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Prompt <span class="text-danger">(optionnel)</span></label>
					<div class="col-sm-10">
					<input type="text" name="prompt" value="{{$publication->prompt}}" class="form-control" id="basic-default-name" placeholder="Exemple: Redige un text attractif pour la creation de site web" />
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
					<div class="col-sm-10">
					<textarea rows="5" required
						id="basic-default-message"
						name="description"

						class="form-control"
						placeholder="Saisir votre message"

						aria-describedby="basic-icon-default-message2">{{$publication->description}}</textarea>
					</div>
				</div>

			</div>
		</div>
		<br>
		<div class="add_item">

		</div> <!-- /.add_item -->
		<div class="card">
			<div class="card-body">
				<h5 class="fw-medium">Validation</h5>
				<div class="row justify-content-center">
					<div class="col-sm-6">
						<div class="mb-4">
                        <label for="defaultSelect" class="form-label">Reseau social</label>
                        <select id="defaultSelect" name="social_media" class="form-select">
                            <option value="{{$publication->social_media}}" selected>{{$publication->social_media}}</option>
                            <option>Choisir le reseau social</option>
                            <option value="all">Tous les reseaux</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Tiktok">Tiktok</option>
                            <option value="Twitter">Twitter</option>
                            <option value="LinkedIn">LinkedIn</option>
                        </select>
                        </div>
					</div>
                    <div class="col-md-6">
						<div class="mb-4">
                        <label for="publish_at" class="form-label">Date de publication</label>
                          <input type="text" class="form-control" id="publish_at" name="publish_at" value="{{$publication->publish_at}}" placeholder="Choisir date et heure" >
                        </div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-sm-10">
					<button type="submit" class="btn btn-primary">Mettre a jour les informations</button>
					</div>
				</div>
			</div>
        </div>
	</form>
	<div style="visibility: hidden;">

	<div class="extra_item_to_add" id="extra_item_to_add">

		<div class="delete_extra_item_to_add" id="delete_extra_item_to_add">
			<div class="card">

			<div class="card-body">
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Titre</label>
					<div class="col-sm-10">
					<input type="text" name="title[]" class="form-control" required id="basic-default-name" placeholder="saisir le titre" />
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Media</label>
					<div class="col-sm-10">
					<div class="mb-4">
						<label for="formFile" class="form-label">Inserer une Image ou Video</label>
						<input class="form-control" required name="media[]" type="file" id="formFile" />
					</div>
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-name">Prompt <span class="text-danger">(optionnel)</span></label>
					<div class="col-sm-10">
					<input type="text" name="prompt[]" class="form-control" id="basic-default-name" placeholder="Exemple: Redige un text attractif pour la creation de site web" />
					</div>
				</div>
				<div class="row mb-6">
					<label class="col-sm-2 col-form-label" for="basic-default-message">Description</label>
					<div class="col-sm-10">
					<textarea rows="5"
						id="basic-default-message"
						required
						name="description[]"
						class="form-control"
						placeholder="Saisir votre message"

						aria-describedby="basic-icon-default-message2"></textarea>
					</div>
				</div>
				<div class="row mb-6">
					<div class="col-md-5 d-flex">
					<span class="me-3 btn btn-success btn-md addeventmore" >
                            <i class="fa fa-plus-circle"  style="font-size: 30px"></i>
                        </span>
                        <span class="ml-3 btn btn-danger btn-md removeeventmore">
                            <i class="fa fa-minus-circle"  style="font-size: 30px"></i>
                        </span>
					</div>
				</div>
			</div>
		</div>
		</div>

	</div>

</div>
	</div>
	<!-- / Content -->

	<div class="content-backdrop fade"></div>
	</div>
	<!-- Content wrapper -->
</div>

<!-- / Layout page -->
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
@endsection
