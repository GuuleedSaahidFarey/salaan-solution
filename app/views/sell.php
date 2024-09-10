<?php  include "../partials/links.php" ?>
<?php 
include "../config/conn.php";
session_start();
if (!isset($_SESSION['my'])) {
  header("location:../../");
}

  


// The rest of your code for logged-in users goes here




?>
<link rel="stylesheet" href="./sell.css">
<body class="g-sidenav-show  bg-gray-100">
 <?php include "../partials/sidepar.php" ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include "../partials/navpar.php" ?>
    <div class="row" id="bar">
 
 
</div>
<div class="container-fluid py-4">            
      <div class="row">
        
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>selling table</h6>
            </div>
         <div class="col-12">
         <a class="btn bg-gradient-primary " id="addsell" href="">Register Data</a>
  <a class="btn bg-gradient-primary " id="dellAll" href="">Delete all</a>
 
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
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Size</th> -->
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Color</th> -->
                      <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th> -->
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">description</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Price</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Person</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Phone</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Type</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Method</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                      <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Method</th> -->
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


<div class="modal" tabindex="-1" id="sellModel">
                        <div class="modal-dialog">
                          <div class="modal-content">
                          <div class="col-sm-12">
                              <div class="alert alert-success d-none">
                                successsssssssssss
                              </div>
                              <div class="alert alert-danger d-none">
                                erorrrrrrrrrrrrrrrrrrrrr
                              </div>
                            </div>
                            <div class="modal-header">
                        
                              <h5 class="modal-title">sell  Form</h5>
                              <button pe="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="col-sm-12">
                              <div class="alert alert-success d-none">
                                successsssssssssss
                              </div>
                              <div class="alert alert-danger d-none">
                                erorrrrrrrrrrrrrrrrrrrrr
                              </div>
                            </div>
                            <div class="modal-body">
                              <form id="sellForm" method="POST">
                                <div class="row">
                                  <input type="hidden" name="rowId" id="rowId">
                                  <div class="col-sm-12">
                              <div class="form-group">
                              <label for="name">Device Name *</label>
                    <input
                    
                      id="name"
                      name="name"
                      type="text"
                      class="required form-control name "
                      
                      required
                    />
                            </div>
                              </div>
<!-- 
                              <div class="col-sm-12 model">
                              <div class="form-group">
                              <label for="model">Device model *</label>
                    <input
                      id="model"
                      name="model"
                      type="text"
                      class="required form-control"
                      required
                    />
                            </div>
                              </div>

                              

                              <div class="col-sm-12 size">
                              <div class="form-group">
                              <label for="size">Device size *</label>
                    <input
                      id="size"
                      name="size"
                      type="text"
                      class="required form-control"
                      required
                    /> -->
                            <!-- </div>
                              </div>

                              <div class="col-sm-12 color">
                              <div class="form-group">
                              <label for="color">Device color *</label>
                    <input
                      id="color"
                      name="color"
                      type="text"
                      class="required form-control"
                      required
                    />
                            </div>
                              </div> -->


                              <div class="col-sm-12 descrip">
                              <div class="form-group">
                              <label for="descrip">Device description *</label>
                <textarea name="" id="descrip" class="form-control"></textarea>
                            </div>
                              </div>

                              <div class="col-sm-12">
                              <div class="form-group">
                              <label for="descrip">  Price *</label>
                <input 
                type="number" id="price" step="any" min="1" value="1" class="form-control text-right required"   

                >
                            </div>
                              </div>

                              <input 
                type="number" id="sess" step="any" min="1" value="1" class="form-control text-right required"   
                hidden
                >


                <div class="col-sm-12">
                              <div class="form-group">
                              <label for="namePerson">name Person *</label>
                    <input
                      id="namePerson"
                      name="namePerson"
                      type="text"
                      class="required form-control"
                      required
                    />
                            </div>
                              </div>

                              <div class="col-sm-12 phone">
                              <div class="form-group">
                              <label for="phone"> phone *</label>
                    <input
                      id="phone"
                      name="phone"
                      type="text"
                      class="required form-control"
                      required
                    />
                            </div>
                              </div>

                              <div class="col-sm-12 type">
                              <div class="form-group">
                              <label for="name">Order Type *</label>
                    <select name="type" id="type" class="form-control">
                            <!-- <option value="selling">Selling</option> -->
                            <option value="solution">solution</option>
                            <option value="store">store</option>

                    </select>
                            </div>
                              </div>

                    <!-- <select name="" id="" class="form-control" hidden>
                      <option ></option>
                    </select> -->
                    <div class="col-sm-12 d-none" id="peyMethodd">
                              <div class="form-group">
                              <label for="name">Pyment Method *</label>
                    <select name="type" id="peyMethod" class="form-control">
                            <option value="cash">cash</option>
                            <option value="Edahab">Edahab</option>
                            <option value="Zaad">Zaad</option>
                            <option value="notPaid">Not Paid</option>

                    </select>
                            </div>
                              </div>

                              <div class="col-sm-12 d-none" id="peyStatus">
                              <div class="form-group">
                              <label for="name">status *</label>
                    <select name="peyStatus" id="peyStatus" class="form-control">
                            <option value="Peid">Paid</option>
                            <option value="notPaid">notPaid</option>
                            

                    </select>
                            </div>
                              </div>

                            </div>


                              </div>
                            
                              
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" id="close"data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="submit"class="btn btn-primary" id="submit">Save changes</button>
                            </div>
                            </div>
                          </form>

                            </div>
                           
                          </div>
                        </div>
</div>



<script src="../js/selling.js"></script>
<?php ?>