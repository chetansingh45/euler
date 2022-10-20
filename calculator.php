<?php 
    $page_title = 'Calculator Section';
    include 'includes/header.php'; 
    include 'php/helper/db/db.php';
    use DB\DB;
    $DB = new DB();
    $defaultProduct = []
;?>
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
  padding:40px;
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

.cal-left .cal-slider{
  -webkit-appearance: none;
    min-width: 100%;
    height: 0;
    background: #000;
    border: 1px solid #000;;
    padding: 0;
    margin: 40px 0;
}

.slider-point{
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
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.3 );
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
        <h5 class="hero-sub-title mb-2">EMI CALCULATOR</h5>
        <h2 class="hero-title text-primary pb-2 pb-md-3">A Payment Method As Smooth As Your Drive</h2>
      </div>
      <div class="col-md-6">
        <div class="cal-left">
          
          <div class="cal-left-inner">
            <div class="row">
                <div class="col-12 pb-5">
                  <label for="cars"><b>Choose a Model:</b></label>
                  <select name="cars" onchange="setVechicle(this)" class="vechicle" >
                    <?php 
                       $selectProducts = $DB->db("SELECT * FROM product_sku");
                       $i=0;
                       while ($row = mysqli_fetch_assoc($selectProducts)){ 
                         if($i==0){
                           $defaultProduct = $row;
                         }
                         $i++;
                    ?>
                       <option  data-id="<?php echo $row['id']?>" data-name="<?php echo $row['name']?>" data-sku_name="<?php echo $row['sku_name']?>" data-image_url="<?php echo $row['image_url']?>" data-selling_price="<?php echo $row['selling_price']?>" value="<?php echo $row['id']?>"><?php echo $row['sku_name']?></option>
                    <?php } ?>
                  </select>
                  <hr>
                </div>
              <div class="col-6">
                <h4><b >DOWN PAYMENT [₹]</b></h4>
              </div>
              <div class="col-6">
                <input type="text" class="" onkeyup="calculate()" value="10000" id="downPayment" placeholder="10000">
              </div>
              <div class="col-12">
                <input class="cal-slider" oninput="setDownPayment(this.value)" id="downPaymentRange" type="range" min="10000" max="100000" value="10000" >
              </div>


              <div class="col-6">
                <h4><b>LOAN AMOUNT [₹]</b></h4>
              </div>
              <div class="col-6">
                <input type="text" class="" onkeyup="calculate()" value="1000" id="loanAmount" placeholder="0">
              </div>
              <div class="col-12">
                <input class="cal-slider" oninput="setLoanAmount(this.value)" type="range" min="1" max="250000" value="1000" >
              </div>
            </div>
          </div>
          <div class="cal-left-inner">
            <div class="row">
              <div class="col-6">
                <h4><b>INTEREST RATE (%) [P.A]</b></h4>
              </div>
              <div class="col-6">
                <input type="text" class="" value="1" onkeyup="calculate()"  id="interestRate" placeholder="0">
              </div>
              <div class="col-12">
                <input class="cal-slider" value="1" oninput="setIntrestRate(this.value)"  type="range" min="1" max="36" value="0">
              </div>
            </div>
          </div>
          <div class="cal-left-inner">
            <div class="row">
              <div class="col-6">
                <h4><b>TENURE  [Years]</b></h4>
              </div>
              <div class="col-6">
                <input type="text" value="1" class="" onkeyup="calculate()" id="years" placeholder="0">
              </div>
              <div class="col-12">
                <input class="cal-slider" value="1" oninput="setYears(this.value)" type="range" min="1" max="36" value="0">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="cal-right">
          <div class="cal-right-inner">
            <div class="row justify-content-center align-items-center mx-auto">
              <div class="col-6">
                <p>Price</p>
                <h2>&#x20b9;<b id="vechiclePrice">100,000</b></h2>
                <p>Down Payment</p>
                <h2>&#x20b9;<b id = "vechicleDownPayment">10,000</b></h2>
              </div>
              <div class="col-6">
                <p>Loan Amount</p>
                <h2> &#x20b9;<b id="vechicleLoanAmount">0000</b></h2>
                <p>EMI Amount</b></p>
                <h2> &#x20b9;<b id="vechicleEmi">0000</b></h2>
              </div>
              <div class="col-12">
                <hr>
                <img width="250px" class="mx-auto d-block" height="200px" width="300px" id="vechicleImage" src="images/auto.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php';?>
<script>
  var price=0;
  var image='';
  var sku_name='';

  function calculate(){
    var years = $('#years').val();
    var interestRate = $('#interestRate').val();
    var loanAmount = $('#loanAmount').val();
    
    var emi = (parseInt(loanAmount) + ((loanAmount * interestRate * years)/100))/(12*years)
    $("#vechicleEmi").html(Math.round(emi))
  }

  function setIntrestRate(interestRate){
    $('#interestRate').val(interestRate)
    calculate()
  }
  function setLoanAmount(loanAmount){
    $('#loanAmount').val(loanAmount)
    $("#vechicleLoanAmount").html(loanAmount)
    calculate()
  }
  function setYears(years){
    $("#years").val(years)
    calculate()
  }
  function setDownPayment(downPaymentdown){
    $("#downPayment").val(downPaymentdown)
    $("#vechicleDownPayment").html(downPaymentdown)
   
    var p=$("#vechiclePrice").html();
    var fianlAmount = p - downPaymentdown;

    // price = $("#vechiclePrice").val();
    // console.log(price);
    // var fianlAmount = price - downPaymentdown;
     $("#loanAmount").val(fianlAmount)
    // $("#vechicleLoanAmount").val(fianlAmount)
    calculate()
  }
  
  function setVechicle(data){
      
       sku_name = $(data).find(':selected').data('sku_name')
       price = $(data).find(':selected').data('selling_price')
       image = $(data).find(':selected').data('image_url')
        $("#vechiclePrice").html(price)
        $("#vechicleImage").attr('src',image)
        var downPaymentdown= $("#downPayment").val()
        $("#loanAmount").val(price-downPaymentdown)

       
  }

  function setDefaultProduct(){
    price = "<?php echo $defaultProduct['selling_price']?>"
    sku = "<?php echo $defaultProduct['sku_name']?>"
    image = "<?php echo $defaultProduct['image_url']?>"

    $("#vechiclePrice").html(price)
    $("#vechicleImage").attr('src',image)
    var downPaymentdown= $("#downPayment").val()
    console.log(price)
    $("#loanAmount").val(price-downPaymentdown)
  }
  
  setDefaultProduct()
</script>
