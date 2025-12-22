   <footer class="footer-dark bg-seashell-white pb-0 cover-background" style="background-image: url('{{ asset('asset/images/demo-jewellery-store-footer-bg.jpg') }}');">
       <div class="container">
           <div class="row justify-content-center mb-4 sm-mb-35px">
               <!-- start footer column -->
               <div class="col-6 col-lg-3 last-paragraph-no-margin order-sm-1 md-mb-50px xs-mb-30px">
                   <a href="demo-jewellery-store.html" class="footer-logo d-inline-block mb-20px"><img src="{{ asset('asset/images/demo-jewellery-store-logo-black.png') }}" data-at2x="{{ asset('asset/images/demo-jewellery-store-logo-black@2x.png') }}" alt=""></a>
                   <span class="lh-22 alt-font fw-500 text-dark-gray d-block w-80 lg-w-100 mb-15px">Please reach out to when you need support.</span>
                   <div class="fs-16 text-brown"><i class="feather icon-feather-phone-call icon-small me-10px xs-me-5px text-dark-gray"></i><a href="tel:+1 352 308 8999">+1 352 308 8999</a></div>
                   <div class="fs-16"><i class="feather icon-feather-mail icon-small me-10px xs-me-5px text-dark-gray"></i><a href="mailto:hello@grayfoxgifts.com">hello@grayfoxgifts.com</a></div>
               </div>
               <!-- end footer column -->
               <!-- start footer column -->
               <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                   <span class="alt-font fw-500 text-dark-gray d-block mb-5px">
                       Categories
                   </span>

                   <ul class="fs-16">
                       @forelse($featuredCategories as $category)
                       <li>
                           <a  href="{{ route('shop', ['category' => $category->slug]) }}">
                               {{ $category?->name }}
                           </a>
                       </li>
                       @empty
                       <li class="text-muted">No categories available</li>
                       @endforelse
                   </ul>
               </div>



               <!-- end footer column -->
               <!-- start footer column -->
               <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                   <span class="alt-font fw-500 text-dark-gray d-block mb-5px">
                       Brands
                   </span>

                   <ul class="fs-16">
                       @forelse($brands as $brand)
                       <li>
                           <a  href="{{ route('shop', ['brand' => $brand->slug]) }}">
                               {{ $brand->name }}
                           </a>
                       </li>
                       @empty
                       <li class="text-muted">No brands available</li>
                       @endforelse
                   </ul>
               </div>

               <!-- end footer column -->
               <!-- start footer column -->
               <div class="col-6 col-lg-2 col-sm-4 xs-mb-30px order-sm-3 order-lg-2">
                   <span class="alt-font fw-500 text-dark-gray d-block mb-5px">Information</span>
                   <ul class="fs-16">
                       <li><a href="demo-jewellery-store-about.html">About us</a></li>
                       <li><a href="demo-jewellery-store-contact.html">Careers</a></li>
                       <li><a href="#">Events</a></li>
                       <li><a href="#">Articles</a></li>
                       <li><a href="demo-jewellery-store-contact.html">Contact us</a></li>
                   </ul>
               </div>
               <!-- end footer column -->
               <!-- start footer column -->
               <div class="col-lg-3 col-sm-6 ps-30px sm-ps-15px md-mb-50px xs-mb-0 order-sm-2 order-lg-5 text-center text-sm-start">
                   <span class="alt-font fw-500 text-dark-gray d-block mb-10px">Connect with us</span>
                   <div class="elements-social social-icon-style-09">
                       <ul class="small-icon dark mb-20px">
                           <li><a class="facebook" href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f"></i><span></span></a></li>
                           <li><a class="instagram" href="http://www.instagram.com" target="_blank"><i class="fa-brands fa-instagram"></i><span></span></a></li>
                           <li><a class="twitter" href="http://www.twitter.com" target="_blank"><i class="fa-brands fa-twitter"></i><span></span></a></li>
                           <li><a class="dribbble" href="http://www.dribbble.com" target="_blank"><i class="fa-brands fa-dribbble"></i><span></span></a></li>
                       </ul>
                   </div>


               </div>
               <!-- end footer column -->
           </div>
           <div class="row justify-content-center align-items-center">
               <!-- start divider -->
               <div class="col-12">
                   <div class="divider-style-03 divider-style-03-01 border-color-transparent-dark-very-light"></div>
               </div>
               <!-- end divider -->
               <!-- start copyright -->
               <div class="col-md-6 pt-20px pb-20px sm-pt-0 fs-16 order-2 order-md-1 text-center text-md-start last-paragraph-no-margin">
                   <p>&copy; 2025 Gray Fox Gifts is Proudly Powered by <a href="https://www.techonika.com/" target="_blank" class="text-decoration-line-bottom text-dark-gray">Techonika</a></p>
               </div>
               <!-- end copyright -->
               <!-- start footer menu -->
               
               <!-- end footer menu -->
           </div>
       </div>
   </footer>