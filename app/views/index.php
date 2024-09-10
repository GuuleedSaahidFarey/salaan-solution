
<?php  include "../partials/links.php" ?>
<?php 

session_start();
if (!isset($_SESSION['my'])) {
  header("location:../../");
}
?>
<body class="g-sidenav-show  bg-gray-100">
 <?php include "../partials/sidepar.php" ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <div class="" id="navpar">
    <?php include "../partials/navpar.php" ?>
    </div>


    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="./sell.php">Sells</a></p>
                    <h5 class="font-weight-bolder mb-0">
                      <!-- $53,000 -->
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold"><a href="./solution.php">Solutions</a></p>
                    <h5 class="font-weight-bolder mb-0">
                      <!-- 2,300 -->
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <a href="./store.php">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Store</p>
                    <h5 class="font-weight-bolder mb-0">
                      <!-- 2,300 -->
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                    </a>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <a href="./users.php">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Users</p>
                    <h5 class="font-weight-bolder mb-0">
                      <!-- 2,300 --> 
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>
                    </a>
                  </div>
                </div>
                
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container-fluid py-4">            
      <div class="row">
        
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>selling table</h6>
            </div>
         <div class="col-12">
         <!-- <a class="btn bg-gradient-primary " id="addsell" href="">Register Data</a>
  <a class="btn bg-gradient-primary " id="dellAll" href="">Delete all</a> -->
 
         </div>
            <div class="input-group">
              <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="search" id="search" class="form-control" placeholder="search here...">
            </div>
          
    

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="sellTpl">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Device Name</th>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Model</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Size</th>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Person</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pyment Method</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    
                  </tbody>
                </table>
              </div>
            </div>
            <?php include "../partials/footer.php" ?>

          </div>
        </div>
  </div>
     
     
    </div>
</main>
<script src="../js/selling.js"></script>