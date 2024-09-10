<?php  include "../partials/links.php" ;
session_start();
// if (strlen(@$_SESSION['userName'])>0) {
//     header("location: ../");
//   }
if (!isset($_SESSION['my'])) {
  header("location:../../");
}
?>
<body class="g-sidenav-show  bg-gray-100">
 <?php include "../partials/sidepar.php" ?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <?php include "../partials/navpar.php" ?>
    <style>
                    #show {
                        width:150px;
                        height:150px;
                        border: solid 1px #445789;
                        border-radius: 50%;
                        object-fit:cover;
                        align-items:center;
                        justify-content:center
                    }
                </style>
<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Users table</h6>
            </div>
      <a class="btn bg-gradient-primary mt-3 w-20" id="addUser" href="">Add New User</a>
        
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="userTable">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">User Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Imege</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>

                  </tbody>
                </table>
              </div>
            </div>
            <?php 
                            include "../partials/footer.php";
                            ?>
          </div>
        </div>
  </div>
     
     
    </div>
</main>


<div class="modal" tabindex="-1" id="userModal">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Modal title</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                              <form id="userForm" method="POST" enctype="multipart/form-data" action="">
                                <div class="row">
                                  <input type="hidden" name="rowId" id="rowId">
                                  <div class="col-sm-12">
                              <div class="form-group">
                              <label for="">userName</label>
                                <input type="text" name="userName" id="userName" class="form-control" placeholder="UserName">
                              </div>
                              </div>
                              <div class="col-sm-12">
                              <div class="form-group">
                                <label for="">password</label>
                                <input type="passwoerd" name="password" id="password" class="form-control" placeholder="Password">
                              </div>
                                </div>
                              <div class="col-sm-12">
                              <div class="form-group">
                              <label for="">Imege</label>
                                <input type="file" name="prod_img" id="imege" class="form-control" placeholder="description">
                              </div>
                              </div>

                              <div class="col-sm-12">
                              <div class="form-group">
                                <label for="">Role</label>
                                <select name="role" id="role" class="form-control">
                                  <option value="Admin">Admin</option>
                                  <option value="user">user</option>
                                </select>
                              </div>
                                </div>
                              </div>
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-8">
                                <img id="show" alt="">
                            </div>
                        </div>
                            

                              
                              <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit" name="submit" class="btn btn-primary" id="submit">Save changes</button>
                            </div>
                           
                           
                          </form>

                            </div>
                           
                          </div>
                        </div>
           </div>
                            
           <script src="../js/users.js"></script>