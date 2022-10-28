<div class="col-lg-3 m-auto">
<form method="post" action="{{ url('/login') }}">
@csrf
<br> 
<h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Log in</h3>
  <div class="form-group">   
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email"><br>    
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Password"><br>
  </div>
    <button type="submit" class="btn btn-primary" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>

</form>
</div>