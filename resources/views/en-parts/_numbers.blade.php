<section class="ftco-counter img" id="section-counter" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
            <div class="row">
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex">

          <div class="text d-flex align-items-center">
          @foreach($companies as $company)
            <strong class="number" data-number="{{(int)$company->yearsOfExperienced}}">0</strong>
          </div>
          <div class="text-2 mr-2">
              <span>Years of <br>Experienced</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="{{(int)$company->projectSuccessful}}">0</strong>
          </div>
          <div class="text-2 mr-2">
              <span>Project <br>Successful</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="{{(int)$company->professionalExpert}}">0</strong>
          </div>
          <div class="text-2 mr-2">
              <span>Professional <br>Expert</span>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 d-flex justify-content-center counter-wrap ftco-animate">
        <div class="block-18 d-flex">
          <div class="text d-flex align-items-center">
            <strong class="number" data-number="{{(int)$company->happyCustomers}}">0</strong>
          </div>
          <div class="text-2 mr-2">
              <span>Happy <br>Customers</span>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    </div>
</section>
