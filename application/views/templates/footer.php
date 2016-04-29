<!-- Footer -->
<footer>
  <div class="row">
    <div class="col-lg-12">
      <p>BasketballStats</p>
    </div>
  </div>
</footer>

</div>
<!-- /.container -->

<div class="modal fade" id="registerSignIn" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="registerSignin-title">Sign up</h4>
      </div>
      <div class="modal-body">
        <p class="bg-danger" id="errorMsg"></p>
        <form role="form" id="registerSignIn-form">
          <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control"
                   id="inputEmail" placeholder="Enter email" name="email"/>
          </div>
          <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control"
                   id="inputPassword" placeholder="Password" name="password"/>
          </div>
        </form>
      </div>
      <div class="modal-footer" id="registerSignIn-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="registerButton">Register</button>
        <button type="button" class="btn btn-primary" id="signinButton">Sign In</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="createModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="create-title">Create Blackmail</h4>
      </div>
      <div class="modal-body">
        <p class="bg-danger" id="createBlackmail-errorMsg"></p>
        <form role="form" method="POST" action="upload/" id="create-form" enctype="multipart/form-data" onsubmit="return false">
          <div class="form-group">
            <label for="title">Title of blackmail</label>
            <input type="text" class="form-control"
                   id="title" placeholder="Enter Title" name="title"/>
          </div>
          <div class="form-group">
            <label for="recName">Name of blackmail recipient</label>
            <input type="text" class="form-control"
                   id="recName" placeholder="Recipient Name" name="recName"/>
          </div>
          <div class="form-group">
            <label for="recEmail">Email address of blackmail recipient</label>
            <input type="email" class="form-control"
                   id="recEmail" placeholder="Recipient Email" name="recEmail"/>
          </div>
          <div class="form-group">
            <label for="date">Set release date</label>
            <input type="text" class="form-control date"
                   id="date" placeholder="dd/mm/yyyy" name="date"/>
          </div>
          <div class="form-group">
            <label for="time">Set release time</label>
            <input type="text" class="form-control time"
                   id="time" placeholder="12:00 am" name="time"/>
          </div>
          <div class="form-group">
            <label for="demands">Enter your demands</label>
            <input type="text" class="form-control"
                   id="demands" placeholder="Demands" name="demands"/>
          </div>
          <div class="form-group">
            <label for="imageUpload">Upload Blackmail Photo</label>
            <input id="imageUpload" type="file" name="image" class="file" accept="image/jpeg"><br/>
            <input type="hidden" name="creator" id="creator">
            <input type="hidden" name="randomCode" id="randomCode">
          </div>
        </form>
      </div>
      <div class="modal-footer" id="createBlackmail-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" id="create" form="create-form" value="Create">
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>