<?php
$page_title = 'Saving Calculator';
include 'includes/header.php';
include 'php/helper/db/db.php';

use DB\DB;

$DB = new DB();; ?>
<style>
  .cal select {
    width: 20%;
    padding: 5px 20px 5px 10px;
    height: 35px;
    border: none;
    border-bottom: 1.3px solid #000000;
    outline: none;
    background: url(images/cal-right.png) no-repeat right center transparent;
    color: #000;
  }

  .cal-right {
    padding: 40px;
    background-color: var(--light-blue);
  }

  .cal-right p {
    margin-bottom: 10px;
  }

  .cal-right h2 {
    margin-bottom: 10px;
    font-size: 20px;
  }

  .cal-left h4 {
    font-size: 20px;
  }

  @media(max-width:575px) {
    .cal-left h4 {
      font-size: 16px;
    }
  }

  .cal-left input {
    height: 40px;
    padding: 5px 10px;
    border: 2px solid #DBDBDB;
    color: #0088A0;
    font-weight: bold;
    font-size: 17px;
    width: 100%;
    outline: none;
  }

  @media(max-width:575px) {
    .cal-left input {
      height: 30px
    }
  }

  .cal-left .cal-slider {
    -webkit-appearance: none;
    min-width: 100%;
    height: 0;
    background: #000;
    border: 1px solid #000;
    ;
    padding: 0;
    margin: 40px 0;
  }

  .slider-point {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #A7CB00;
    position: absolute;
    top: -5px;
    -moz-transition: left 0.3s;
    -webkit-transition: left 0.3s;
    transition: left 0.3s;
  }

  .cal-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: var(--primary);
    cursor: pointer;
    -moz-transition: background .15s ease-in-out;
    -webkit-transition: background .15s ease-in-out;
    transition: background .15s ease-in-out;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.3);
  }

  .cal-slider::-webkit-slider-thumb:hover {
    background: #81dcf3;
  }
</style>
<!-- Banner -->
<section class="hero-banner overflow-hidden" style="background-image: url(images/telematics-bg.jpg);">
  <div class="container">
    <div class="row">
      <div class="col-12 text-center wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
        <div>
          <h5 class="hero-title text-white mb-2">Euler Shepherd</h5>
          <h2 class="hero-sub-title text-primary">Fleet control at your fingertips</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Calculator -->
<section class="sec-space cal">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <h5 class="hero-sub-title mb-2">SAVING CALCULATOR</h5>
        <h2 class="hero-title text-primary pb-2 pb-md-3">A Payment Method As Smooth As Your Drive</h2>
      </div>
      <div class="col-md-6">
        <div class="cal-left">
          <div class="cal-left-inner">
            <div class="row">
              <div class="col-6">
                <h4><b>Fule Price(Diesel)(Rs/liter) [₹]</b></h4>
              </div>
              <div class="col-6">
                <input type="number" min="50" max="150" class="" onkeyup="calculate()"value="75"  id="fuel_price" name="fuel_price" placeholder="0">
              </div>
              <div class="col-12">
                <input class="cal-slider"  oninput="setFulePrice(this.value)"  type="range" min="50" max="150" value="75">
              </div>
            </div>
          </div>
          <br />
          
          <div class="cal-left-inner">
            <div class="row">
              <div class="col-6">
                <h4><b>Daily Running Distance (Kms)</b></h4>
              </div>
              <div class="col-6">
                <input type="number" class="" min="5" max="500" value="25" onkeyup="calculate()" id="distance" placeholder="0">
              </div>
              <div class="col-12">
                <input class="cal-slider"  oninput="setDistance(this.value)"  type="range" min="1" max="500" value="25">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 mt-4">
        <div class="cal-right">
          <div class="cal-right-inner">
          <div class="row justify-content-center align-items-center mx-auto">
              <div class="col-6">
                <h2>&#x20b9;<b id="monthlySaving">100,000</b></h2>
                <p class="">Fuel Saving <small> Monthly Basis</small></p>

                <h2>&#x20b9;<b id = "totalMonthlySaving">10,000</b></h2>
                <p>Total Monthly Saving <small>(Fuel + Maintenance)</small></p>
                
              </div>
              <div class="col-6">
                <h2> &#x20b9;<b id="overAllSaving">0000</b></h2>
                <p>Total Saving in 5yrs <small><br>(Fuel + Maintenance + Investment + Subsidy)</small></p>
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>

  function calculate() {
    
      var fuel_price = $('#fuel_price').val();
      var distance = $('#distance').val();
     
      var totalCostOnDiesel = 0;
      var totalCostOnEletricity = 0;

      totalCostOnDiesel = fuel_price * distance / 25;
      totalCostOnEletricity = 72 * distance / 120;

      var dailySaving = totalCostOnDiesel - totalCostOnEletricity
      var totalMonthlyFuelSaving = dailySaving * 30;

      var totalMonthlySaving = totalMonthlyFuelSaving + ((distance * 1.5) - (distance * 0.33)) * 30;

      var overAllSaving = totalMonthlySaving * 60;

    $("#monthlySaving").html(Math.round(totalMonthlyFuelSaving));
    $("#totalMonthlySaving").html(Math.round(totalMonthlySaving));
    $("#overAllSaving").html(Math.round(overAllSaving));

  }

 function setFulePrice(price){
    $("#fuel_price").val(price)
    calculate()
 }
 function setDistance(distance){
    $("#distance").val(distance)
    calculate()
 }

 setTimeout(function(){
    calculate()
 },1000)
 

</script>
<?php include 'includes/footer.php'; ?>