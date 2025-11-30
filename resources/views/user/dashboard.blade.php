@extends('main_master')

@section('content')

@section('title')
AgentIA | Accueil
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
		<div class="row">
            <div class="col-xxl-8 mb-6 order-0">
                <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">Bienvenue {{Auth::user()->name}}! 🎉</h5>
                        <p class="mb-6">
                        Bienvenue sur votre tableau de bord ! Ici, vous pouvez créer, programmer et suivre vos publications sur tous vos réseaux sociaux en un seul endroit.
                        </p>
                        <p>🚀 Commencez dès maintenant à partager vos idées avec le monde !</p>
                    </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-6">
                        <img
                        src="{{asset('frontend/assets/img/illustrations/man-with-laptop.png')}}"
                        height="175"
                        alt="View Badge User" />
                    </div>
                    </div>
                </div>
                </div>
            </div>
		</div>
        <div class="card mb-4">
            <h5 class="card-header">Notifications</h5>
            @php
             $notification = App\Models\Notification::where('user_id',Auth::user()->id)->where('status','Attente')->first();
            @endphp
            <div class="card-body">
                @if ($notification)
                    <p>📢 Vous avez une nouvelle notification importante ! <a href="{{ route('notification.view') }}">Consulter</a></p>
                @else
                    <p class="text-muted">Aucune notification pour l’instant.</p>
                @endif
            </div>
        </div>
        <div class="card">
                <h5 class="card-header">Publications</h5>
                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Media</th>
                        <th>Categorie</th>
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
                        <td>
                            <p>{{$item->extension}} @if(empty($item->prompt)) simple @else IA @endif</p>
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
