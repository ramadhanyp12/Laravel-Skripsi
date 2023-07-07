@extends('layouts.dashboard')

@section('title')
    Account Settings
@endsection

@section('content')
    <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">My Account</h2>
                <p class="dashboard-subtitle">
                  lihat apa yang kamu buat hari ini!
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form id="locations" action="{{ route('dashboard-settings-redirect',
                    'dashboard-settings-account') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Your Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  name="name"
                                  value="{{ $user->name }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Your Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  name="email"
                                  value="{{ $user->email }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="address">Address</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="address"
                                  name="address"
                                  value="{{ $user->address }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="provincies">Nama Provinsi</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="provincies"
                                  name="provincies"
                                  value="{{ Auth::user()->provincies }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="regencies">Nama Kota</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="regencies"
                                  name="regencies"
                                  value="{{ Auth::user()->regencies }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="zip_code">Postal Code</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="zip_code"
                                  name="zip_code"
                                  value="{{ Auth::user()->zip_code }}"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="phone_number">Mobile</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="phone_number"
                                  name="phone_number"
                                  value="{{ Auth::user()->phone_number }}"
                                />
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Save Now
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection