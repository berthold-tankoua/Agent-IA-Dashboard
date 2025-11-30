@extends('main_master')

@section('content')

@section('title')
AgentIA | Accueil
@endsection

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
		<div class="col-md-12 mb-6 order-0">
			<div class="card">
			<div class="d-flex align-items-start row">
				<div class="col-md-8">
				<div class="card-body">
					<h5 class="card-title text-primary mb-3">Bienvenue sur ShopixUp | AgentIA</h5>
					<p class="mb-6">
					✨ Accédez à vos outils d’intelligence artificielle, conçus pour vous simplifier la vie. Connectez-vous à votre compte pour bénéficier d’un panel d’outils intelligents qui vous assistent dans vos tâches quotidiennes, automatisent vos processus, et boostent votre productivité. Que vous soyez entrepreneur, marketeur, développeur ou créateur de contenu, notre assistant IA s’adapte à vos besoins.
					</p><hr>
					<p>Votre tableau de bord vous donne un accès centralisé à tous vos outils IA. Connectez-vous dès maintenant pour libérer tout le potentiel de l’intelligence artificielle.</p>
					<a href="{{ route('user.login') }}" class="btn btn-sm btn-outline-primary">Se connecter</a>
				</div>

				</div>
				<div class="col-md-4 text-center text-sm-left">
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

	</div>
	<!-- / Content -->


	<div class="content-backdrop fade"></div>
	</div>
	<!-- Content wrapper -->
</div>
<!-- / Layout page -->

@endsection
