<?php include('Plugin\AddedLibraries.php'); ?>
<?php include('Plugin\PostLoginHeader.php'); ?>
<link rel="stylesheet" href="CSS\dashboard.css">
<script type="text/javascript">
    $(window).on('load',function(){
        $('#exampleModalCenter').modal('show');
    });
</script>
<div class="modal" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Check User Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <div class="center">
            <button type="button" class="btn btn-primary">Display</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container" style="padding-top:20px;">
  <div class="row align-items-center">
    <div class="col">
        <form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">User ID</label>
                <div class="col-sm-10">
                <input type="text" readonly class="form-control" value="Sytem Generated">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">DOB</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Salary</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Designation</label>
                <div class="col-sm-10">
                <input type="text" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Re-enter Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                </div>
            </div>
            
        </form>
    </div>
  </div>
</div>








<!---ender--->
</main>
</div>
</div>
</body>
</html>