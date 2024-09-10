
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
    <div class="col-sm-6">
      <!-- <button type="submit" id="printAll" class="btn btn-info" >Print</button> -->
    </div>

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6 id="tt">Payment table</h6>
            </div>
      <!-- <a class="btn bg-gradient-primary mt-3 w-20" id="addsell" href="">Add New Order</a> -->
        
     
      <!-- <input type="search" id="search" class="form-control" placeholder="search here..."> -->

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="peyTpl">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Device Name</th>
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Model</th> -->
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Size</th> -->
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color</th> -->
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Person</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Payment Type</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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


<div class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" id="invoiceMdl" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modalContent">
                <div class="modal-header">
                    <h5 class=" modal-title" style="" id="slnTitle">Salaan Solution</h5>
                    <button type="button" class="close" id="closeIcon" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Invoice Content -->
                    <div class="invoice">
                       <div class="row">
                        <div class="col-sm-6"> <h2 id="">Invoice:
                          
                        </h2></div>
                        <div class="col-sm-6"><h3 id="inId"></h3></div>
                       </div>
                        <div class="row">
                          <div class="col-sm-6">
                          <p><strong id="inDate"></strong></p>
                          </div>
                          <div class="col-sm-6"><p><strong id="inInfoPer"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="inphone"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="dName"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="dModal"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="dSize"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="dColor"></strong></p></div>
                          <div class="col-sm-6"><p><strong id="dDis"></strong></p></div>
                        </div>
                        
                        
                        
                        
                       

                        <table class="table" id="invoiceTbl">
                            <thead>
                                <tr>
                                  
                                    <th>Order Type</th>
                                    <th>Price</th>
                                    <th>Pey Method</th>
                                </tr>
                            </thead>
                           <tbody>

                           </tbody>
                            
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeIconn">Close</button>
                    <button type="button" class="btn btn-primary" id="daabac">Print</button>
                </div>
            </div>
        </div>
</div>

<script src="../js/payment.js"></script>