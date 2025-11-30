@extends('main_master')

@section('content')

@section('title')
AgentIA | Detail
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
            <div class="col-xxl-6 mb-6 order-0">
                <div class="card">
                <div class="d-flex align-items-start row">
                    <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary mb-3">{{$publication->title}}</h5>
                        <p class="mb-6">
                       {{$publication->description}}
                        </p>
                        @php
                        $notification = App\Models\Notification::where('post_id',$publication->id)->where('status','Attente')->first();
                        @endphp
                        @if($notification)
                        <div class="d-flex">
                          <a href="{{ route('notification.accept',$notification->id) }}" class="btn btn-primary">Valider la modification</a>
                          <a href="{{ route('notification.decline',$notification->id) }}" class="btn btn-danger ml-2">Rejeter la modification</a>
                        </div>
                        @endif
                    </div>
                    </div>
                    @if(!empty($publication->media_url))
                    @php
                    $path = $publication->media_url;
                    $ext  = strtolower(pathinfo($path, PATHINFO_EXTENSION));
                    @endphp
                    <div class="col-md-5">
                        @if ($publication->extension=='image')
                             <img src="{{ asset($publication->media_url) }}" style="width: 100%;max-height:300px">
                        @elseif($publication->extension=='video' && $ext =='mp.4')
                            <video src="{{ asset($publication->media_url) }}" style="width: 100%;max-height:300px"></video>
                        @else
                           <img src="{{ asset($publication->media_url) }}" style="width: 100%;max-height:300px">
                        @endif
                    </div>
                    @endif
                </div>
                </div>
            </div>
		</div>
        <div class="card mb-4">
             <h5 class="card-header">Informations</h5>
            <div class="card-body">
                                <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>

                        <th>Resau Social</th>
                        <th>Prompt</th>
                        <th>A publié le</th>
                        <th>Status</th>

                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                    <tr class="align-items-center">



                        <td >
                      <p> {{$publication->social_media}}</p>

                        </td>
                        <td><p style="width: 90%;overflow:hidden;white-space: normal;"> {{$publication->prompt}}</p></td>
                        <td>
                            <p>{{ \Carbon\Carbon::parse($publication->publish_at)->format('d/m/Y H:i') }}</p>
                        </td>
                        <td>
                        @if ($publication->status=='Publié')
                             <span class="badge bg-label-primary me-1">{{$publication->status}}</span>
                        @else
                            <span class="badge bg-label-danger me-1">{{$publication->status}}</span>
                        @endif

                        </td>

                    </tr>

                    </tbody>
                </table>
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
