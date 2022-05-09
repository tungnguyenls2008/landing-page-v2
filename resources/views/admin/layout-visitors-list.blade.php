@extends('layouts.admin')

@section('js_after')
    <script src="{{ asset('_admin/js/pages/layout/visitor-list.js') }}"></script>
@endsection

@section('content')
    <style>
        .big-col {
            width: 400px !important;
        }
    </style>
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                    <div class="d-flex align-items-baseline flex-wrap mr-5">
                        <!--begin::Page Title-->
                        <h5 class="text-dark font-weight-bold my-1 mr-5">{{ __('Visitors') }}</h5>
                        <!--end::Page Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">{{ __('Layout') }}</a>
                            </li>
                            <li class="breadcrumb-item text-muted">
                                <a href="javascript:;" class="text-muted">{{ __('Visitors') }}</a>
                            </li>
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->
        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b example example-compact">
                            <div class="card-header">
                                <h3 class="card-title">{{ __('Visitors') }}</h3>
                            </div>
                            <!--begin::Form-->

                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="form-group mb-8">
                                        <div class="alert alert-custom alert-default">
                                            <div class="alert-icon">
                                                <span class="svg-icon svg-icon-danger svg-icon-xl">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <circle fill="#000000" opacity="0.3" cx="12" cy="12"
                                                                    r="10"/>
                                                            <rect fill="#000000" x="11" y="7" width="2" height="8"
                                                                  rx="1"/>
                                                            <rect fill="#000000" x="11" y="16" width="2" height="2"
                                                                  rx="1"/>
                                                        </g>
                                                    </svg>
                                                </span>
                                            </div>
                                            <div class="alert-text">
                                                <strong>Whoops!</strong> There were some problems with your
                                                input.<br><br>
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if ($message = Session::get('success'))
                                    <div class="form-group mb-8">
                                        <div class="alert alert-custom alert-default">
                                            <div class="alert-icon">
                                                <span class="svg-icon svg-icon-success svg-icon-xl">
                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                         height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none"
                                                           fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path
                                                                d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                                                                fill="#000000" opacity="0.3"/>
                                                            <path
                                                                d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                                                                fill="#000000" fill-rule="nonzero"/>
                                                        </g>
                                                    </svg>
                                                    <!--end::Svg Icon-->
                                                </span>
                                            </div>
                                            <div class="alert-text">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="separator separator-dashed my-8"></div>

                                <table class="datatable table-hover datatable-bordered datatable-head-custom"
                                       id="kt_datatable_clients">
                                    <thead>
                                    <tr>
                                        <th title="Field #1">#</th>
                                        <th title="Field #2">IP address</th>
                                        <th title="Field #3" class="big-col">Location</th>
                                        <th title="Field #4">Device info</th>
                                        <th title="Field #7">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <?php
                                        $info = json_decode($item->device_info, true);
                                        ?>
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->ip_address }}
                                                <hr>
                                                at: {{ date('d-m-Y H:i:s',strtotime($item->created_at)) }}
                                            </td>
                                            <td class="big-col">{{ $item->location }}
                                                @if(isset($info['possible_addresses']))
                                                    <hr>
                                                    Shodan info:
                                                    <br>
                                                    <?php
                                                    $shodan=json_decode($info['possible_addresses'],true);
                                                    ?>
                                                hostname: {{$shodan['hostname']??null}}<br>
                                                provider: {{$shodan['org']??null}}<br>
                                                Country population: {{isset($shodan['country_population'])?number_format($shodan['country_population']):null}}<br>
                                                location: <a href="https://maps.google.com/?q={{$shodan['latitude']??null}},{{$shodan['longitude']??null}}" target="_blank">Show estimated location on map</a><br>
                                                    <hr>
                                                @endif
                                            </td>
                                            <td>
                                                {{--                                                User agent: {{$info['user_agent']??''}}--}}
                                                {{--                                                    <hr>--}}

                                                Browser: {{$info['browser']??''}}
                                                <hr>
                                                OS: {{$info['os']??''}}
                                                <hr>
                                                Device: {{$info['device_family']??''}} - {{$info['device_model']??''}}
                                                <hr>
                                                Note: {{ $item->note }}
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer">

                            </div>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add note</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <form class="form" action="{{ route('admin.layout.visitor-list.edit') }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="txt_order">Note:</label>
                                <input type="text" class="form-control"
                                       placeholder="{{ __('Note') }}"
                                       name="note" id="txt_order"/>
                                <div class="d-md-none mb-2"></div>
                            </div>
                            <input type="hidden" value="" name="id"/>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary font-weight-bold">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
