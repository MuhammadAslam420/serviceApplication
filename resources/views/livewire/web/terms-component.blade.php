<div>
    <div class="bg-img">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg1">
        <img src="{{ asset('assets/imgs/work-bg-03.png') }}" alt="img" class="bgimg2">
    </div>
    
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Terms & Condition</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Terms & Condition</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->
    
    <div class="content">
        <div class="container">
            <div class="row">
                                
                <!-- Terms & Conditions -->
                <div class="col-md-12">
                    <div class="terms-content">
                       {!! $term->description !!}
                    </div>
                </div>
                <!-- /Terms & Conditions -->
                
            </div>
        </div>
    </div>
</div>
