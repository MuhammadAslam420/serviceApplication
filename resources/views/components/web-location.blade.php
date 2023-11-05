<footer class="footer footer-six">
    
    <div class="footer-top aos mt-0.5" data-aos="fade-up">
        <div class="section-heading ">
            <h2 class="flex justify-center">Services By Location</h2>
        </div>
        
        <div class="container">
            <div class="row">
                @for ($i = 0; $i < 6; $i++)
                <div class="col-lg-2 col-md-6">
                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        
                        <ul>
                            @for ($m = 0; $m < 10; $m++)
                                @php
                                    $index = $i * 10 + $m;
                                    if (isset($cities[$index])) {
                                        $city = $cities[$index]->city;
                                    } else {
                                        $city = '';
                                    }
                                @endphp
                                <li>
                                    <a href="{{ route('location',['city'=>$city]) }}" class="hover:text-indigo-600">{{ $city }}</a>
                                </li>
                            @endfor
                        </ul>
                    </div>
                    <!-- /Footer Widget -->
                </div>
                @endfor
            </div>
            
            
            
        </div>
    </div>
    <!-- /Footer Top -->

  

</footer>