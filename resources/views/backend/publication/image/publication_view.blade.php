@extends('main_master')

@section('content')

@section('title')
AgentIA | Image
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
        <div class="card">
            <h5 class="card-header">Publications</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image/Video</th>
                        <th>Titre</th>
                        <th>A publié le</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($publications as $item)

                    <tr>

                        <td>
                         <a href="{{ asset($item->media_url) }}">Afficher & Lire</a>
                        </td>

                        <td >
                        <h5 style="font-weight: bold;font-size:12px">{{$item->title}}</h5>

                        </td>
                        <td>
                            <p>{{ \Carbon\Carbon::parse($item->publish_at)->format('d/m/Y H:i') }}</p>
                        </td>
                        <td>
                        @if ($item->status=='Publié')
                             <span class="badge bg-label-primary me-1">{{$item->status}}</span>
                        @else
                            <span class="badge bg-label-danger me-1">{{$item->status}}</span>
                        @endif

                        </td>
                        <td>
                            <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="icon-base bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('publication.detail',$item->id) }}"
                                ><i class="icon-base bx bx-show me-1"></i> Voir Plus</a
                            >
                            <a class="dropdown-item" href="{{ route('publication.edit',$item->id) }}"
                                ><i class="icon-base bx bx-edit-alt me-1"></i> Editer</a
                            >
                            <a class="dropdown-item" id="delete" href="{{ route('publication.delete',$item->id) }}"
                                ><i class="icon-base bx bx-trash me-1"></i> Supprimer</a
                            >
                            </div>
                        </div>
                        </td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
	</div>
	<!-- / Content -->

	<div class="content-backdrop fade"></div>
	</div>
	<!-- Content wrapper -->
</div>
<!-- / Layout page -->

@endsection
