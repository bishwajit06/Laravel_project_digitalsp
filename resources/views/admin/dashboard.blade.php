@extends('layouts.backend.master')
@section('title','Dashboard | Digital Space')
@push('css')

@endpush
@section('content')
<div class="row g-3 mb-3">
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100 ecommerce-card-min-width">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2 d-flex align-items-center">Weekly Sales<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Calculated according to last week's sales"><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row">
          <div class="col">
            <p class="font-sans-serif lh-1 mb-1 fs-4">$47K</p><span class="badge badge-soft-success rounded-pill fs--2">+3.5%</span>
          </div>
          <div class="col-auto ps-0">
            <div class="echart-bar-weekly-sales h-100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2">Total Order</h6>
      </div>
      <div class="card-body d-flex flex-column justify-content-end">
        <div class="row justify-content-between">
          <div class="col-auto align-self-end">
            <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1">58.4K</div><span class="badge rounded-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up me-1"></span>13.6%</span>
          </div>
          <div class="col-auto ps-0 mt-n4">
            <div class="echart-default-total-order" data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","week 6","week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}' data-echart-responsive="true"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100">
      <div class="card-body">
        <div class="row h-100 justify-content-between g-0">
          <div class="col-5 col-sm-6 col-xxl pe-2">
            <h6 class="mt-1">Market Share</h6>
            <div class="fs--2 mt-3">
              <div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="fw-semi-bold">Samsung</span></div>
                <div class="d-xxl-none">33%</div>
              </div>
              <div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="fw-semi-bold">Huawei</span></div>
                <div class="d-xxl-none">29%</div>
              </div>
              <div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center"><span class="dot bg-300"></span><span class="fw-semi-bold">Apple</span></div>
                <div class="d-xxl-none">20%</div>
              </div>
            </div>
          </div>
          <div class="col-auto position-relative">
            <div class="echart-market-share"></div>
            <div class="position-absolute top-50 start-50 translate-middle text-dark fs-2">26M</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-xxl-3">
    <div class="card h-md-100">
      <div class="card-header d-flex flex-between-center pb-0">
        <h6 class="mb-0">Weather</h6>
        <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-weather-update" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
          <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-weather-update"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
            <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
          </div>
        </div>
      </div>
      <div class="card-body pt-2">
        <div class="row g-0 h-100 align-items-center">
          <div class="col">
            <div class="d-flex align-items-center"><img class="me-3" src="assets/img/icons/weather-icon.png" alt="" height="60" />
              <div>
                <h6 class="mb-2">New York City</h6>
                <div class="fs--2 fw-semi-bold">
                  <div class="text-warning">Sunny</div>Precipitation: 50%
                </div>
              </div>
            </div>
          </div>
          <div class="col-auto text-center ps-2">
            <div class="fs-4 fw-normal font-sans-serif text-primary mb-1 lh-1">31&deg;</div>
            <div class="fs--1 text-800">32&deg; / 25&deg;</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-lg-6 pe-lg-2 mb-3">
    <div class="card h-lg-100 overflow-hidden">
      <div class="card-header bg-light">
        <div class="row align-items-center">
          <div class="col">
            <h6 class="mb-0">Running Projects</h6>
          </div>
          <div class="col-auto text-center pe-card"><select class="form-select form-select-sm">
              <option>Working Time</option>
              <option>Estimated Time</option>
              <option>Billable Time</option>
            </select></div>
        </div>
      </div>
      <div class="card-body p-0">
        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
          <div class="col ps-card py-1 position-static">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-name rounded-circle bg-soft-primary text-dark"><span class="fs-0 text-primary">F</span></div>
              </div>
              <div class="flex-1">
                <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link" href="#!">Falcon</a><span class="badge rounded-pill ms-2 bg-200 text-primary">38%</span></h6>
              </div>
            </div>
          </div>
          <div class="col py-1">
            <div class="row flex-end-center g-0">
              <div class="col-auto pe-2">
                <div class="fs--1 fw-semi-bold">12:50:00</div>
              </div>
              <div class="col-5 pe-card ps-2">
                <div class="progress bg-200 me-2" style="height: 5px;">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
          <div class="col ps-card py-1 position-static">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-name rounded-circle bg-soft-success text-dark"><span class="fs-0 text-success">R</span></div>
              </div>
              <div class="flex-1">
                <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link" href="#!">Reign</a><span class="badge rounded-pill ms-2 bg-200 text-primary">79%</span></h6>
              </div>
            </div>
          </div>
          <div class="col py-1">
            <div class="row flex-end-center g-0">
              <div class="col-auto pe-2">
                <div class="fs--1 fw-semi-bold">25:20:00</div>
              </div>
              <div class="col-5 pe-card ps-2">
                <div class="progress bg-200 me-2" style="height: 5px;">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 79%" aria-valuenow="79" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
          <div class="col ps-card py-1 position-static">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-name rounded-circle bg-soft-info text-dark"><span class="fs-0 text-info">B</span></div>
              </div>
              <div class="flex-1">
                <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link" href="#!">Boots4</a><span class="badge rounded-pill ms-2 bg-200 text-primary">90%</span></h6>
              </div>
            </div>
          </div>
          <div class="col py-1">
            <div class="row flex-end-center g-0">
              <div class="col-auto pe-2">
                <div class="fs--1 fw-semi-bold">58:20:00</div>
              </div>
              <div class="col-5 pe-card ps-2">
                <div class="progress bg-200 me-2" style="height: 5px;">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0 align-items-center py-2 position-relative border-bottom border-200">
          <div class="col ps-card py-1 position-static">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-name rounded-circle bg-soft-warning text-dark"><span class="fs-0 text-warning">R</span></div>
              </div>
              <div class="flex-1">
                <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link" href="#!">Raven</a><span class="badge rounded-pill ms-2 bg-200 text-primary">40%</span></h6>
              </div>
            </div>
          </div>
          <div class="col py-1">
            <div class="row flex-end-center g-0">
              <div class="col-auto pe-2">
                <div class="fs--1 fw-semi-bold">21:20:00</div>
              </div>
              <div class="col-5 pe-card ps-2">
                <div class="progress bg-200 me-2" style="height: 5px;">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row g-0 align-items-center py-2 position-relative">
          <div class="col ps-card py-1 position-static">
            <div class="d-flex align-items-center">
              <div class="avatar avatar-xl me-3">
                <div class="avatar-name rounded-circle bg-soft-danger text-dark"><span class="fs-0 text-danger">S</span></div>
              </div>
              <div class="flex-1">
                <h6 class="mb-0 d-flex align-items-center"><a class="text-800 stretched-link" href="#!">Slick</a><span class="badge rounded-pill ms-2 bg-200 text-primary">70%</span></h6>
              </div>
            </div>
          </div>
          <div class="col py-1">
            <div class="row flex-end-center g-0">
              <div class="col-auto pe-2">
                <div class="fs--1 fw-semi-bold">31:20:00</div>
              </div>
              <div class="col-5 pe-card ps-2">
                <div class="progress bg-200 me-2" style="height: 5px;">
                  <div class="progress-bar rounded-pill" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer bg-light p-0"><a class="btn btn-sm btn-link d-block w-100 py-2" href="#!">Show all projects<span class="fas fa-chevron-right ms-1 fs--2"></span></a></div>
    </div>
  </div>
  <div class="col-lg-6 ps-lg-2 mb-3">
    <div class="card h-lg-100">
      <div class="card-header">
        <div class="row flex-between-center">
          <div class="col-auto">
            <h6 class="mb-0">Total Sales</h6>
          </div>
          <div class="col-auto d-flex"><select class="form-select form-select-sm select-month me-2">
              <option value="0">January</option>
              <option value="1">February</option>
              <option value="2">March</option>
              <option value="3">April</option>
              <option value="4">May</option>
              <option value="5">Jun</option>
              <option value="6">July</option>
              <option value="7">August</option>
              <option value="8">September</option>
              <option value="9">October</option>
              <option value="10">November</option>
              <option value="11">December</option>
            </select>
            <div class="dropdown font-sans-serif btn-reveal-trigger"><button class="btn btn-link text-600 btn-sm dropdown-toggle dropdown-caret-none btn-reveal" type="button" id="dropdown-total-sales" data-bs-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs--2"></span></button>
              <div class="dropdown-menu dropdown-menu-end border py-2" aria-labelledby="dropdown-total-sales"><a class="dropdown-item" href="#!">View</a><a class="dropdown-item" href="#!">Export</a>
                <div class="dropdown-divider"></div><a class="dropdown-item text-danger" href="#!">Remove</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body h-100 pe-0">
        <!-- Find the JS file for the following chart at: src\js\charts\echarts\total-sales.js-->
        <!-- If you are not using gulp based workflow, you can find the transpiled code at: public\assets\js\theme.js-->
        <div class="echart-line-total-sales h-100" data-echart-responsive="true"></div>
      </div>
    </div>
  </div>
</div>
<div class="row g-0">
  <div class="col-lg-6 col-xl-7 col-xxl-8 mb-3 pe-lg-2 mb-3">
    <div class="card h-lg-100">
      <div class="card-body d-flex align-items-center">
        <div class="w-100">
          <h6 class="mb-3 text-800">Using Storage <strong class="text-dark">1775.06 MB </strong>of 2 GB</h6>
          <div class="progress mb-3 rounded-3" style="height: 10px;">
            <div class="progress-bar bg-progress-gradient border-end border-white border-2" role="progressbar" style="width: 43.72%" aria-valuenow="43.72" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-info border-end border-white border-2" role="progressbar" style="width: 18.76%" aria-valuenow="18.76" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-success border-end border-white border-2" role="progressbar" style="width: 9.38%" aria-valuenow="9.38" aria-valuemin="0" aria-valuemax="100"></div>
            <div class="progress-bar bg-200" role="progressbar" style="width: 28.14%" aria-valuenow="28.14" aria-valuemin="0" aria-valuemax="100"></div>
          </div>
          <div class="row fs--1 fw-semi-bold text-500 g-0">
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-primary"></span><span>Regular</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(895MB)</span></div>
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-info"></span><span>System</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(379MB)</span></div>
            <div class="col-auto d-flex align-items-center pe-3"><span class="dot bg-success"></span><span>Shared</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(192MB)</span></div>
            <div class="col-auto d-flex align-items-center"><span class="dot bg-200"></span><span>Free</span><span class="d-none d-md-inline-block d-lg-none d-xxl-inline-block">(576MB)</span></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 col-xl-5 col-xxl-4 mb-3 ps-lg-2">
    <div class="card h-lg-100">
      <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);"></div>
      <!--/.bg-holder-->
      <div class="card-body position-relative">
        <h5 class="text-warning">Running out of your space?</h5>
        <p class="fs--1 mb-0">Your storage will be running out soon. Get more space and powerful productivity features.</p><a class="btn btn-link fs--1 text-warning mt-lg-3 ps-0" href="#!">Upgrade storage<span class="fas fa-chevron-right ms-1" data-fa-transform="shrink-4 down-1"></span></a>
      </div>
    </div>
  </div>
</div>
@endsection()

@push('js')

@endpush