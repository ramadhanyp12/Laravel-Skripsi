@extends('layouts.auth')

@section('title')
    Store
@endsection

@section('content')
    <!-- Page Content -->
    <div class="page-content page-auth" id="register">
      <div class="section-store-auth" data-aos="fade-up">
        <div class="container">
          <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-4">
              <h2>Daftarkan Akun Anda</h2>
              <form class="mt-3" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                  <label>Nama Panjang</label>
                  <input
                    v-model="name"
                    id="name"
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    autofocus
                  >
                  @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Nama Kota</label>
                  <input
                    v-model="regencies"
                    id="regencies"
                    type="text"
                    class="form-control @error('regencies') is-invalid @enderror"
                    name="regencies"
                    value="{{ old('regencies') }}"
                    required
                    autocomplete="regencies"
                    autofocus
                  >
                  @error('regencies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Nama Provinsi</label>
                  <input
                    v-model="provincies"
                    id="provincies"
                    type="text"
                    class="form-control @error('provincies') is-invalid @enderror"
                    name="provincies"
                    value="{{ old('provincies') }}"
                    required
                    autocomplete="provincies"
                    autofocus
                  >
                  @error('provincies')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Alamat Email</label>
                  <input
                    v-model="email"
                    @change="checkForEmailAvailability()"
                    id="email"
                    type="email"
                    class="form-control @error('email') is-invalid @enderror"
                    :class="{ 'is-invalid': this.email_unavailable }"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autocomplete="email"
                  >
                  @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input
                    id="password"
                    type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    name="password"
                    required
                    autocomplete="new-password"
                  >
                  @error('password')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="form-group">
                  <label>Konfirmasi Password</label>
                  <input
                      id="password-confirm"
                      type="password"
                      class="form-control"
                      name="password_confirmation"
                      required
                      autocomplete="new-password"
                  >
                </div>
                @error('password-confirmation')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                @enderror
                <button
                  type="submit"
                  class="btn btn-success btn-block mt-4"
                  :disabled="this.email_unavailable"
                >Daftar Sekarang</button>
                <a href="{{ route('login') }}" class="btn btn-signup btn-block mt-sm-4">
                  Kembali ke Login
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection

@push('addon-script')
    <script src="vendor/vue/vue.js"></script>
    <script src="https://unpkg.com/vue-toasted"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
      Vue.use(Toasted);
      var register = new Vue({
        el: "#register",
        mounted() {
          AOS.init();
        },
        methods: {
            checkForEmailAvailability: function () {
                var self = this;
                axios.get('{{ route('api-register-check') }}', {
                        params: {
                            email: this.email
                        }
                    })
                    .then(function (response) {
                        if(response.data == 'Available') {
                            self.$toasted.show(
                                "Email anda tersedia! Silahkan lanjut langkah selanjutnya!", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = false;
                        } else {
                            self.$toasted.error(
                                "Maaf, tampaknya email sudah terdaftar pada sistem kami.", {
                                    position: "top-center",
                                    className: "rounded",
                                    duration: 1000,
                                }
                            );
                            self.email_unavailable = true;
                        }
                        // handle success
                        console.log(response.data);
                    })
            }
        },
        data() {
            return {
                // name: "Angga Hazza Sett",
                // email: "kamujagoan@bwa.id",
                email_unavailable: false
            }
        },
      });
    </script>
@endpush