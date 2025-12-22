 <header class="header-with-topbar">

     <!-- end header top bar -->
     <!-- start navigation -->
     <nav class="navbar navbar-expand-lg header-light bg-white disable-fixed">
         <div class="container-fluid">
             <div class="col-auto col-lg-5 menu-order position-static">
                 <button class="navbar-toggler float-start" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle navigation">
                     <span class="navbar-toggler-line"></span>
                     <span class="navbar-toggler-line"></span>
                     <span class="navbar-toggler-line"></span>
                     <span class="navbar-toggler-line"></span>
                 </button>
                 <div class="collapse navbar-collapse" id="navbarNav">
                     <ul class="navbar-nav alt-font">
                         <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                         <li class="nav-item"><a href="{{ route('shop') }}" class="nav-link">Shop</a></li>

                         <li class="nav-item dropdown submenu">
                             <a href="{{ route('category') }}" class="nav-link">Categories</a>
                             <i class="fa-solid fa-angle-down dropdown-toggle" id="navbarDropdownMenuLink2" role="button" data-bs-toggle="dropdown" aria-expanded="false"></i>
                             <div class="dropdown-menu submenu-content" aria-labelledby="navbarDropdownMenuLink2">
                                 <div class="mega-menu m-auto">
                                     <div class="row md-m-0">
                                         <div class="col-12 col-lg-9">
                                             <div class="row row-cols-1 row-cols-lg-4 align-items-center justify-content-center">

                                                 @php
                                                 $chunks = isset($menuCategories) && $menuCategories->count() ? $menuCategories->chunk(ceil($menuCategories->count()/4)) : collect();
                                                 $placeholder = 'https://placehold.co/190x140';
                                                 @endphp
                                                 @foreach($chunks as $chunk)
                                                 <div class="col mb-20px md-mb-10px text-start text-lg-center">
                                                     <a href="demo-jewellery-store-categories.html" class="d-none d-lg-block">
                                                     </a>
                                                     @foreach($chunk as $cat)
                                                     <img src="{{ $cat->image ? asset('storage/'.$cat->image) : $placeholder }}" class="border-radius-4px mb-5px" alt="">

                                                     <a href="{{ route('shop', ['category' => $cat->slug]) }}" class="btn btn-hover-animation fw-500 text-uppercase-inherit justify-content-center pt-0 pb-0 text-start text-lg-center d-block mb-2">
                                                         <span>
                                                             <span class="btn-text text-dark-gray fs-17 flex-shrink-0">{{ $cat->name }}</span>
                                                             <span class="btn-icon"><i class="fa-solid fa-arrow-right icon-very-small w-auto"></i></span>
                                                         </span>
                                                     </a>
                                                     @endforeach
                                                 </div>
                                                 @endforeach
                                             </div>
                                         </div>

                                     </div>
                                 </div>
                             </div>
                         </li>

                         <li class="nav-item"><a href="{{ route('about-us') }}" class="nav-link">About</a></li>
                         <li class="nav-item"><a href="{{ route('contact-us') }}" class="nav-link">Contact Us</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-2 justify-content-end justify-content-lg-center">
                 <a class="navbar-brand" href="demo-jewellery-store.html">
                     <img src="{{ asset('asset/images/demo-jewellery-store-logo-black.png') }}" data-at2x="{{ asset('asset/images/demo-jewellery-store-logo-black@2x.png') }}" alt="" class="default-logo">
                     <img src="{{ asset('asset/images/demo-jewellery-store-logo-black.png') }}" data-at2x="{{ asset('asset/images/demo-jewellery-store-logo-black@2x.png') }}" alt="" class="alt-logo">
                     <img src="{{ asset('asset/images/demo-jewellery-store-logo-black.png') }}" data-at2x="{{ asset('asset/images/demo-jewellery-store-logo-black@2x.png') }}" alt="" class="mobile-logo">
                 </a>
             </div>
             <div class="col-auto col-lg-5 d-flex justify-content-end ms-auto pe-0">
                 <a href="tel:+919876543210" class="call-icon">
                     <i class="fa-solid fa-phone text-black"></i>
                 </a>
                 <style>
                     .call-icon {
                         width: 40px;
                         height: 40px;
                         display: flex;
                         align-items: center;
                         margin-top: 1rem;

                         justify-content: center;
                     }

                     @media (max-width: 767px) {
                         .call-icon {
                             margin-top: 1.2rem;
                             /* mt-4 */
                         }
                     }
                 </style>

             </div>

         </div>
     </nav>
 </header>