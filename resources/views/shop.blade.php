@extends('layouts.app')

@section('content')
<div class="banner">
    <div class="row">
        <div class="col-md-10 offset-md-1 text-center">
              <!--  start text scroller -->
            

         <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="carousel-caption">
      <div class="banner-heading">Information Technology Training</div>
        
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-caption">
      <div class="banner-heading">Information Security Training</div>
        
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-caption">
      <div class="banner-heading">IT Audit Training</div>
        
      </div>
    </div>
    <div class="carousel-item">
      <div class="carousel-caption">
        <div class="banner-heading">Business Continuity Management Training</div>
       
      </div>
    </div>
    
  </div>

</div>



           <!--  end text scroller -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center mt-2">         

       

             
             <div class="input-group mb-3 input-group-lg">               
                <input type="text" class="form-control outline" placeholder="Search a course" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-addon1"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        </div>
    </div>
</div>
<div class="bg-call">
<div class="row mt-5 mb-2">
    <div class="col-md-4 offset-md-4 text-center">
        <div class="d-flex justify-content-center">
          <div class="about-left"> About</div><div class="about-right"> Us</div>
        </div>
        <div class="smline"></div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-md-10 offset-md-1 text-center mt-2 mb-4">
    ITSAC is a world-class institute that inspires, promotes and enables professional excellence. Our clients and students are working towards attaining or already possess internationally recognised and respected qualifications in the fields of Information Technology, Information Security, IT Audit and Business Continuity Management. ITSAC provides training courses for international Certifications that include CISA, CISM, CISSP, C|EH, ISO, CPT as well as in-house training programme as short courses.
    </div>

</div>
</div>

    <x-alert/>
   
    <div class="row mt-5 mb-2">
    <div class="col-md-4 offset-md-4 text-center">
        <div class="d-flex justify-content-center">
          <div class="about-left"> Top</div><div class="about-right">Courses</div>
        </div>
        <div class="smline"></div>
    </div>
</div>
<div class="page_section">
    <div class="row">
        
        <div class="col-md-10 offset-md-1">
        <div class="row d-flex">
        <div class="@if(count($cart)==0) col-md-12  @else col-md-9 @endif">
        <x-shop :products="$products" :cart="$cart"/>
        </div>
        @if(count($cart)>0)
        <div class="col-md-3">  
        <x-mycart :cart="$cart" :currency="$currency"/>
        </div>
        @endif
        </div>

        </div>
    </div>
</div>
  

  

</div>

@endsection