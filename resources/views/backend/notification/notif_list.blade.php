@extends('main_master')

@section('content')

@section('title')
AgentIA | Notifications
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
                        <th>PostID</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ($notifications as $item)

                    <tr>

                        <td >
                        <h5 style="font-weight: bold;font-size:12px">{{$item->post_id}}</h5>

                        </td>
                        <td>
                            <p>{{$item->description}}</p>
                        </td>
                        <td>
                        @if ($item->status=='Vue')
                             <span class="badge bg-label-primary me-1">{{$item->status}}</span>
                        @else
                            <span class="badge bg-label-danger me-1">{{$item->status}}</span>
                        @endif

                        </td>
                        <td>
                            <a class="dropdown-item" href="{{ route('publication.detail',$item->post_id) }}"
                                ><i class="icon-base bx bx-show me-1"></i> Voir Plus</a>

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
