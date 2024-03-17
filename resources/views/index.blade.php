<style>
.form{
    width: 50%;
   
}
.button{
    margin-left: 45%;
}
.centre{
    display: flex;
    justify-content: center;
    margin-top: 12%;
}


</style>

<!doctype html>
<html lang="en">
  <head>
    <title>API</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
        <div class="centre">
        <form class="form" method="Post" action="{{url('/')}}">
        @csrf
    <div class="name" >
        <label>Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter Your name">
    </div>
    <br>
    <div>
        <label>Email</label>
        <input type="text"  class="form-control" name="email" placeholder="Enter Your Email">
    </div>
    <br>
    <div>
        <label>Address</label>
        <input type="text"  class="form-control" name="address" placeholder="Enter Your address">
    </div>
    <br>
    <div >
        <label>password</label>
        <input type="text"  class="form-control" name="password" placeholder="Enter Your Password">
    </div>
    <br>
        <div class="button">
        <button class="btn btn-primary">submit</button>
    </div>
    </form>
        </div>
  </body>
</html>