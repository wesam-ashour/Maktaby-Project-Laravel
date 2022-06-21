@extends('layouts.master')
@section('css')
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
                    <div class="my-auto">
						<div class="d-flex"><h4 class="content-title mb-0 my-auto">الميزات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ إضافة</span></div>
					</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row row-sm main-content-mail">

                <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
						<div class="card  box-shadow-0">
							<div class="card-header">
								<h4 class="card-title mb-1">تعديل الميزات</h4>
							</div>
							<div class="card-body pt-0">
								<form class="form-horizontal" method="POST" action="{{ url('update/services/' . $Services->id) }}">
                                    @csrf
									<div class="form-group">
										<input type="text" class="form-control" id="service_name" name="service_name" value="{{ $Services->service_name ? : old('service_name') }}" placeholder="إسم الميزة الجديدة">
                                        @error('service_name')
                                        <div class="alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
									<div class="form-group">
										<input type="text" class="form-control" id="description" name="description" value="{{ $Services->description ? : old('description') }}" placeholder="وصف الميزة الجديدة">
                                        @error('description')
                                        <div class="alert-danger">{{$message}}</div>
                                        @enderror
                                    </div>
									<div class="form-group mb-0 mt-3 justify-content-end">
										<div>
											<button type="submit" class="btn btn-primary">تعديل</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div><!-- container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Moment js -->
<script src="{{URL::asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<!--- Internal Check-all-mail js -->
<script src="{{URL::asset('assets/js/check-all-mail.js')}}"></script>
<!--Internal Apexchart js-->
<script src="{{URL::asset('assets/js/apexcharts.js')}}"></script>
@endsection
