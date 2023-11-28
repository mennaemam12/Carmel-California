<html>
  <head>
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="template/images/favicon.png" />
    <style>
      @media (min-width: 1025px) {
        .h-custom {
          height: 100vh !important;
        }
      }
      @media (min-width: 300px) {
        .h6,
        h6 {
          font-size: 2rem;
        }
      }

      @media (min-width: 500px) {
        .h6,
        h6 {
          font-size: 1rem;
        }
      }

      .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: 0.75em;
        padding-right: 0.75em;
      }

      .card-registration .select-arrow {
        top: 13px;
      }

      .bg-grey {
        background-color: #eae8e8;
      }

      @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
          border-top-right-radius: 16px;
          border-bottom-right-radius: 16px;
        }
      }

      @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
          border-bottom-left-radius: 16px;
          border-bottom-right-radius: 16px;
        }
      }

      li a {
        text-decoration: none;
        color: #2d2f31;
      }

      span {
        padding: 30px;
        color: white;
        font-size: 1.2em;
        font-variant: small-caps;
        cursor: pointer;
        display: block;
      }

      span::after {
        float: right;
        right: 10%;
        content: "+";
      }

      .slide,
      .slide2,
      .slide3,
      .slide4,
      .slide5,
      .slide6,
      .slide7 {
        clear: both;
        width: 100%;
        height: 0px;
        overflow: hidden;
        text-align: left;
        transition: height 0.5s ease;
        padding-left: 0;
      }

      .slide li,
      .slide2 li,
      .slide3 li,
      .slide4 li,
      .slide5 li,
      .slide6 li,
      .slide7 li {
        list-style: none;
        height: 80px;
      }

      #touch,
      #touch2,
      #touch3,
      #touch4,
      #touch5,
      #touch6,
      #touch7 {
        position: absolute;
        opacity: 0;
        height: 0px;
      }

      #touch:checked + .slide,
      #touch2:checked + .slide2,
      #touch5:checked + .slide5,
      #touch6:checked + .slide6,
      #touch7:checked + .slide7 {
        height: 900px;
        transition: height 0.5s ease;
        overflow: hidden;
      }

      #touch3:checked + .slide3 {
        height: 1175px;
        transition: height 0.5s ease;
        overflow: hidden;
      }
      #touch4:checked + .slide4 {
        height: 1220px;
        transition: height 0.5s ease;
        overflow: hidden;
      }

      .img-fluid {
        width: 80px;
        height: 55px;
      }

      .error{
        color: red;
        float:right;
        position:relative;
        top:15px;
        display:none;
      }
    </style>


  <?php
  include 'models/Ingredient.php';
  $ing = new Ingredient();
  $ingredients = $ing->getIngredients();
  $base = array();
  $protein = array();
  $addons = array();
  $dressing = array();
  $toppings = array();
  $cheeses = array();
  $fruits = array();
  foreach($ingredients as $ingredient){
    $category = $ingredient->Category;
    switch($category){
      case 'Base':
        $base[] = $ingredient;
        break;
      case 'Vegetable':
        $toppings[] = $ingredient;
        break;
      case 'Protein':
        $protein[] = $ingredient;
        break;
      case 'Dressing':
        $dressing[] = $ingredient;
        break;
      case 'Fruit':
        $fruits[] = $ingredient;
        break;  
      case 'Add Ons':
        $addons[] = $ingredient;
        break;
      case 'Cheese':
        $cheeses[] = $ingredient;
        break;  
    }
  }
  $counter = 1;
  ?>



  </head>
  <section class="h-100 h-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12">
          <div
            class="card card-registration card-registration-2"
            style="border-radius: 15px"
          >
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div
                      class="d-flex justify-content-between align-items-center mb-5"
                    >
                      <h1 class="fw-bold mb-0 text-black">Customize Your Salad</h1>
                    </div>

                    <!--BASE DROP DOWN SECTION-->
                    <div>
                      <label for="touch" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Base</h2>
                        <h4 class="fw-bold mb-0 text-muted">Choose 1</h4></label
                      >
                      <input type="checkbox" id="touch" width="600px" />

                      <ul class="slide">
                        <?php foreach($GLOBALS['base'] as $b):?>
                        <hr class="my-4" />
                        <li>
                          <div
                            class="row mb-4 d-flex justify-content-between align-items-center"
                          >
                            <div class="col-md-2 col-lg-2 col-xl-2">
                              <img
                                src="public/images/salad-ingredients/<?php echo $b->Name?>.jpg"
                                class="img-fluid rounded-3"
                                alt="Mix Greens"
                                height="51px"
                              />
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                              <h6 class="text-muted">Base</h6>
                              <h6 class="text-black mb-0"><?php echo $b->Name?></h6>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                              <!-- NO QUANTITY -->
                              <button id="<?php echo $b->Name;
                                echo $GLOBALS['counter']; ?>" class="btn btn-link px-2">
                                <i class="fas fa-plus"></i>
                              </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                              <h6 class="mb-0">LE <?php echo $b->Price?>.00</h6>
                            </div>
                          </div>
                        </li>
                        <?php $counter = 1; endforeach; ?>
                      </ul>
                      
                      <hr class="my-4" />
                    </div>

                    <!---TOPPINGS SECTION-->
                    <div>
                      <label for="touch2" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Toppings</h2>
                        <h4 class="fw-bold mb-0 text-muted">Choose 4</h4>
                        </label
                      >
                      <div id='toppingserror' class="error"></div>
                      <input type="checkbox" id="touch2" width="600px" />
                      <ul class="slide2">
                        <hr class="my-4" />
                        <?php foreach($GLOBALS['toppings'] as $top):?>
                        <li>
                          <div
                            class="row mb-4 d-flex justify-content-between align-items-center"
                          >
                            <div class="col-md-2 col-lg-2 col-xl-2">
                              <img
                                src="public/images/salad-ingredients/<?php echo $top->Name?>.jpg"
                                class="img-fluid rounded-3"
                                alt="Cucumber"
                              />
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                              <h6 class="text-muted">Vegetable</h6>
                              <h6 class="text-black mb-0"><?php echo $top->Name?></h6>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                              <button
                                  class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                  restriction(this.parentNode.querySelector('input[type=number]'),'topping');"
                                >
                                  <i class="fas fa-minus"></i>
                                </button>

                                <input
                                id="topping<?php echo $counter++;?>"
                                  min="0"
                                  name="<?php echo $top->Name?>"
                                  value="0"
                                  type="number"
                                  max="3"
                                  class="form-control form-control-sm"
                                />

                                <button
                                  class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                  restriction(this.parentNode.querySelector('input[type=number]'),'topping');"
                                >
                                  <i class="fas fa-plus"></i>
                                </button>
                                <p id='toppingmax' style='color:red; text-align:left; font-size:small'></p>
                              </div>

                            
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">LE <?php echo $top->Price?>.00/1</h6>
                            </div>
                          </div>
                        </li>
                        <?php endforeach;
                        $counter = 1;?>
                      </ul>
                     <hr class="my-4" />
                    </div>

                    <!--DRESSING SECTION-->
                    <div>
                      <label for="touch3" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Dressing</h2>
                        <h4 class="fw-bold mb-0 text-muted">Choose 1</h4>
                        <div id='dressingserror' class="error"></div></label
                      >
                      <input type="checkbox" id="touch3" width="600px" />
                      <ul class="slide3">
                        <hr class="my-4" />
                        <?php foreach ($GLOBALS['dressing'] as $dress): ?>
                          <li>
                            <div
                              class="row mb-4 d-flex justify-content-between align-items-center"
                            >
                              <div class="col-md-2 col-lg-2 col-xl-2">
                                <img
                                  src="public/images/salad-ingredients/<?php echo $dress->Name?>.jpg"
                                  class="img-fluid rounded-3"
                                  alt="Cucumber"
                                />
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-3">
                                <h6 class="text-muted">Dressing</h6>
                                <h6 class="text-black mb-0"><?php echo $dress->Name?></h6>
                              </div>
                              <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button
                                  class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                  restriction(this.parentNode.querySelector('input[type=number]'),'dressing');"
                                >
                                  <i class="fas fa-minus"></i>
                                </button>

                                <input
                                  id="dressing<?php echo $counter++; ?>"
                                  min="0"
                                  name="<?php echo $dress->Name?>"
                                  value="0"
                                  type="number"
                                  max="3"
                                  class="form-control form-control-sm"
                                />

                                <button
                                  class="btn btn-link px-2"
                                  onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                  restriction(this.parentNode.querySelector('input[type=number]'),'dressing');"
                                >
                                  <i class="fas fa-plus"></i>
                                </button>
                              </div>
                              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h6 class="mb-0">LE <?php echo $dress->Price ?>.00/1</h6>
                              </div>
                            </div>
                          </li>
                        <?php endforeach; $counter=1; ?>
                      </ul>
                     <hr class="my-4" />
                    </div>
                    
                    <!--PROTEIN SECTION-->
                    <div>
                      <label for="touch4" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Protein</h2>
                        <h4 class="fw-bold mb-0 text-muted">Choose 1</h4>
                        <div id='proteinserror' class="error"></div></label
                      >
                      <input type="checkbox" id="touch4" width="600px" />
                      <ul class="slide4">
                        <hr class="my-4" />
                        <?php foreach ($GLOBALS['protein'] as $prot): ?>
                            <li>
                              <div
                                class="row mb-4 d-flex justify-content-between align-items-center"
                              >
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img
                                    src="public/images/salad-ingredients/<?php echo $prot->Name?>.jpg"
                                    class="img-fluid rounded-3"
                                    alt="Cucumber"
                                  />
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                  <h6 class="text-muted">Protein</h6>
                                  <h6 class="text-black mb-0"><?php echo $prot->Name?></h6>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'protein')"
                                  >
                                    <i class="fas fa-minus"></i>
                                  </button>

                                  <input
                                    id="protein<?php echo $counter++; ?>"
                                    min="0"
                                    name="<?php echo $prot->Name?>"
                                    value="0"
                                    type="number"
                                    max="3"
                                    class="form-control form-control-sm"
                                  />

                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'protein')"
                                  >
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  <h6 class="mb-0">LE <?php echo $prot->Price?>.00/1</h6>
                                </div>
                              </div>
                            </li>
                        <?php endforeach; $counter=1; ?>
                      </ul>
                     <hr class="my-4" />
                    </div>

                    <!--ADD ONS SECTION-->
                    <div>
                      <label for="touch5" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Add Ons</h2>
                        <h4 class="fw-bold mb-0 text-muted">Up To 3</h4>
                        <div id='additionserror' class="error"></div></label
                      >
                      <input type="checkbox" id="touch5" width="600px" />
                      <ul class="slide5">
                        <hr class="my-4" />
                        <?php foreach ($GLOBALS['addons'] as $add): ?>
                            <li>
                              <div
                                class="row mb-4 d-flex justify-content-between align-items-center"
                              >
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img
                                    src="public/images/salad-ingredients/<?php echo $add->Name?>.jpg"
                                    class="img-fluid rounded-3"
                                    alt="Cucumber"
                                  />
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                  <h6 class="text-muted">Add On</h6>
                                  <h6 class="text-black mb-0"><?php echo $add->Name?></h6>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'addition')"
                                  >
                                    <i class="fas fa-minus"></i>
                                  </button>

                                  <input
                                    id="addition<?php echo $counter++; ?>"
                                    min="0"
                                    name="<?php echo $add->Name?>"
                                    value="0"
                                    type="number"
                                    max="3"
                                    class="form-control form-control-sm"
                                  />

                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'addition')"
                                  >
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  <h6 class="mb-0">LE <?php echo $add->Price?>.00/1</h6>
                                </div>
                              </div>
                            </li>
                        <?php endforeach; $counter=1; ?>
                      </ul>
                     <hr class="my-4" />
                    </div>
                    

                    <!--FRUITS SECTION-->
                    <div>
                      <label for="touch6" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Fruits</h2>
                        <h4 class="fw-bold mb-0 text-muted">Up to 2</h4>
                        <div id='fruitserror' class="error"></div></label
                      >
                      <input type="checkbox" id="touch6" width="600px" />
                      <ul class="slide6">
                        <hr class="my-4" />
                        <?php foreach ($GLOBALS['fruits'] as $fruit): ?>
                            <li>
                              <div
                                class="row mb-4 d-flex justify-content-between align-items-center"
                              >
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                  <img
                                    src="public/images/salad-ingredients/<?php echo $fruit->Name ?>.jpg"
                                    class="img-fluid rounded-3"
                                    alt="Cucumber"
                                  />
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                  <h6 class="text-muted">Fruit</h6>
                                  <h6 class="text-black mb-0"><?php echo $fruit->Name?></h6>
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'fruit')"
                                  >
                                    <i class="fas fa-minus"></i>
                                  </button>

                                  <input
                                    id="fruit<?php echo $counter++;?>"
                                    min="0"
                                    name="<?php echo $fruit->Name?>"
                                    value="0"
                                    type="number"
                                    max="3"
                                    class="form-control form-control-sm"
                                  />

                                  <button
                                    class="btn btn-link px-2"
                                    onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                    restriction(this.parentNode.querySelector('input[type=number]'),'fruit')"
                                  >
                                    <i class="fas fa-plus"></i>
                                  </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                  <h6 class="mb-0">LE <?php echo $fruit->Price?>.00/1</h6>
                                </div>
                              </div>
                            </li>
                        <?php  endforeach; $counter=1; ?>
                      </ul>
                     <hr class="my-4" />
                    </div>
                    

                    <!--CHEESE SECTION-->
                    <div>
                      <label for="touch7" style="width: 600px; cursor: pointer"
                        ><h2 class="fw-bold mb-0 text-black">Cheese</h2>
                        <h4 class="fw-bold mb-0 text-muted">Up to 2</h4>
                        <div id='cheeseserror' class="error"></div></label
                      >
                      <input type="checkbox" id="touch7" width="600px" />
                      <ul class="slide7">
                        <hr class="my-4" />
                        <?php foreach ($GLOBALS['cheeses'] as $cheese): ?>
                              <li>
                                <div
                                  class="row mb-4 d-flex justify-content-between align-items-center"
                                >
                                  <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                      src="public/images/salad-ingredients/<?php echo $cheese->Name?>.jpg"
                                      class="img-fluid rounded-3"
                                      alt="Cucumber"
                                    />
                                  </div>
                                  <div class="col-md-3 col-lg-3 col-xl-3">
                                    <h6 class="text-muted">Cheese</h6>
                                    <h6 class="text-black mb-0"><?php echo $cheese->Name?></h6>
                                  </div>
                                  <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button
                                      class="btn btn-link px-2"
                                      onclick="this.parentNode.querySelector('input[type=number]').stepDown();
                                        restriction(this.parentNode.querySelector('input[type=number]'),'cheese')"
                                    >
                                      <i class="fas fa-minus"></i>
                                    </button>

                                    <input
                                      id="cheese<?php echo $counter++;?>"
                                      min="0"
                                      name="<?php echo $cheese->Name ?>"
                                      value="0"
                                      type="number"
                                      max="3"
                                      class="form-control form-control-sm"
                                    />

                                    <button
                                      class="btn btn-link px-2"
                                      onclick="this.parentNode.querySelector('input[type=number]').stepUp();
                                        restriction(this.parentNode.querySelector('input[type=number]'),'cheese')"
                                    >
                                      <i class="fas fa-plus"></i>
                                    </button>
                                  </div>
                                  <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h6 class="mb-0">LE <?php echo $cheese->Price ?>.00/1</h6>
                                  </div>
                                </div>
                              </li>
                        <?php  endforeach; $counter=1; ?>
                      </ul>
                     <hr class="my-4" />
                    </div>

                    <div class="pt-5">
                      <h6 class="mb-0">
                        <a href="#!" class="text-body"
                          ><i class="fas fa-long-arrow-alt-left me-2"></i>Back
                          to shop</a
                        >
                      </h6>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Order Summary</h3>
                    <hr class="my-4" />

                    <div class="d-flex justify-content-between mb-4">
                      <h5 class="text-uppercase">Base</h5>
                      <h5>getTotal()</h5>
                    </div>

                    <h5 class="text-uppercase mb-3">Shipping</h5>
                    

                    <div class="mb-4 pb-2">
                      <select class="select">
                        <option value="1">Standard-Delivery- €5.00</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                        <option value="4">Four</option>
                      </select>
                    </div>

                    <h5 class="text-uppercase mb-3">Give code</h5>

                    <div class="mb-5">
                      <div class="form-outline">
                        <input
                          type="text"
                          id="form3Examplea2"0
                          class="form-control form-control-lg"
                        />
                        <label class="form-label" for="form3Examplea2"
                          >Enter your code</label
                        >
                      </div>
                    </div>

                    <hr class="my-4" />

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>€ 137.00</h5>
                    </div>

                    <button
                      type="button"
                      class="btn btn-dark btn-block btn-lg"
                      data-mdb-ripple-color="dark"
                    >
                      Register
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function getTotal(){
      var inputs = document.querySelectorAll('input[type="number"]');
      var chosen = Array.from(inputs).filter(function(input){
        return input.value > 1;
      })

      
    }

    function restriction(input, type){
      document.getElementById(type+'serror').innerHTML="";
      var inputs = document.querySelectorAll("input[type='number'][id*="+type+"]");
      var chosen = Array.from(inputs).filter(function(input){
        return input.value > 0;
      })
      
      if(chosen.length>input.max){
        document.getElementById(type+'serror').innerHTML=`You can only choose up to ${input.max} ${type}s`;
        document.getElementById(type+'serror').style.display='block';
        input.value = 0;
      }

    }

  </script>
</html>
