  <!-- Navbar Start -->
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-6">
              <div class="search-form mt-3">
                  <form method="GET" action="{{ route('findProduct') }}">
                      @csrf
                      <div class="input-group">
                          <input type="text" name="findProduct" class="form-control" placeholder="Tìm kiếm...">
                          <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid bg-white sticky-top">
      <div class="container">
          <nav>
              <div class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                  <a href="index.html" class="navbar-brand">
                      <img class="img-fluid" src="/templateClient/img/logo.png" alt="Logo">
                  </a>
                  <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                      data-bs-target="#navbarCollapse">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                      <div class="navbar-nav ms-auto">
                          <a href="{{ route('home') }}" class="nav-item nav-link active">Nhà</a>
                          <a href="{{ route('about') }}" class="nav-item nav-link">Về chúng tớ</a>
                          <div class="nav-item dropdown">
                              <a href="{{ route('product') }}" class="nav-link dropdown-toggle" data-bs-toggle="">Loại
                                  sản phẩm</a>
                              <div class="dropdown-menu bg-light rounded-0 m-0">
                                  <div id="list-cats"></div>
                                  {{-- @foreach ($category as $key => $value)
                                      <a href="{{ route('getProductsCategory', ['ids' => $value->id]) }}"
                                          class="dropdown-item">{{ $value->type_name }}</a>
                                  @endforeach --}}
                                  {{-- <a href="{{ route('product') }}" class="dropdown-item">Tất cả sản phẩm</a> --}}
                              </div>
                          </div>
                          <a href="{{ route('store') }}" class="nav-item nav-link">Câu chuyện</a>
                          {{-- <div class="nav-item dropdown">
                              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                              <div class="dropdown-menu bg-light rounded-0 m-0">
                                  <a href="feature.html" class="dropdown-item">Features</a>
                                  <a href="blog.html" class="dropdown-item">Blog Article</a>
                                  <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                  <a href="404.html" class="dropdown-item">404 Page</a>
                              </div>
                          </div> --}}
                          <a href="{{ route('contact') }}" class="nav-item nav-link">Liên hệ</a>
                      </div>
                  </div>
                  <div class="nav-item dropdown">
                      <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                          @if (Auth::check())
                              <img class="rounded-circle me-lg-2" src="{!! asset('uploads/' . Auth::user()->image) !!}" alt=""
                                  style="width: 40px; height: 40px;">
                          @else
                              <img class="rounded-circle me-lg-2" src="{!! asset('uploads/defaultAdminImg.jpg') !!}" alt=""
                                  style="width: 40px; height: 40px;">
                          @endif
                          <span class="d-none d-lg-inline-flex text-sm">Chào
                              @if (Auth::check())
                                  {{ Auth::user()->user_name }}
                              @else
                                  {{ $user_name = 'người chưa đăng ký!' }}
                              @endif
                          </span>
                      </a>
                      @if (Auth::check())
                          <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0">
                              <a href="#" class="dropdown-item">My Profile</a>
                              <a href="#" class="dropdown-item">Settings</a>
                              <a href="{{ route('nguoidung.formLogin') }}" class="dropdown-item">Log out</a>
                          </div>
                      @else
                          <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0">
                              <a href="{{ route('nguoidung.formLogin') }}" class="dropdown-item">Log in</a>
                          </div>
                      @endif
                  </div>
                  <div class="d-flex align-items-baseline">
                      <a href="{{ route('shoppingCart') }}" class="d-flex align-items-end">
                          <i class="fa fa-shopping-cart fa-2x"></i>
                      </a>
                      <span class="badge bg-primary rounded-pill">{{ $cart->totalQuantity }}</span>
                  </div>
              </div>
          </nav>
      </div>
      @if (session('alert'))
          <section id="alertBox" class='alert alert-danger w-25 float-end'>{{ session('alert') }}</section>
      @endif
      @if (Session::has('notice'))
          <p class="alert alert-danger">{{ Session::get('mess') }}</p>
      @endif
  </div>

  <!-- Navbar End -->
  @section('js')
      <script>
          //alert chưa đăng nhập khi nhấn vào giỏ hàng
          $(document).ready(function() {
              // Hiển thị phần tử trong 3 giây
              $('#alertBox').fadeIn().delay(3000).fadeOut();
          });

          //lấy API
          $.get('http://127.0.0.1:8000/api/categoryApi', function(res) {
              console.log(res);
              let cats = res.Category;
              console.log(res.status_code);
              let _li = '';
              let url = '{{ route('getProductsCategory') }}' + '/';
              cats.forEach(function(item) {
                  _li += '<a href="' + url + item.id + '" class="list-group-item" style="width:200px">' + item
                      .type_name +
                      '</a>';
                  console.log(item);
              })
              $('#list-cats').html(_li);
          })
      </script>
  @endsection
