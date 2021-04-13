@extends('User.layout')
@section('body')
<div class="login-register-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <button class="active" id="btnLogin" data-bs-toggle="tab" >
                            <h4 >Login</h4>
                        </button> ||
                        <button class="active" id="btnRegister">
                            <h4 class="login-toggle-btn">Register</h4>
                        </button>
                    </div>
                   
                    <div class="tab-content">
                      
                           
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <div class="container-login100-form-btn">
                                        
                                        <div class="btn-group">
                                           
                                            <a class='btn btn-primary ' href="https://localhost/BronzeLakeShop/login/facebook" style="   background-color: #1877F2; width:12em"> Sign in with Facebook</a>
                                        </div>
                                        {{-- <a  href="https://localhost/BronzeLakeShop/login/facebook">Login with Facebook</a> --}}
                                       <a href="https://localhost/BronzeLakeShop/login/google"><button type="button" style=" color:4285f4; border:none; width:110px; height:40px; "><img src="https://localhost/DACN/public/frontend/images/google.png" style="width:30px; background:white; " alt=""><b style="top: -10px; left: 5px; position: relative">Google</b></button></a>
                
                                    </div>
                                </br>
                                <div class="login-toggle-btn">
                                               
                                    <span id="result" style="color: hsl(0, 100%, 50%);
                                    font-weight: 600;
                                    font-family: "Raleway", sans-serif;
                                    display: inline-block;
                                    text-decoration: underline;
                                    font-size: 16px;" ></span>
                                   
                                </div>
                            </br>
                                    <form id="login" action="{{route('login')}}" method="post">
                                        {{ csrf_field() }}
                                        <input type="text" name="emailUser" id="emailUser" placeholder="Email">
                                        <input type="password" name="lgPassword" id="lgPassword" placeholder="Password">
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                
                                                @if (isset($error))
                                                <h6 class="font-weight-light btn-outline-danger">The Username or Password is Incorrect</h6>
                                            
                                                    
                                                @endif
                                            </div>
                                            
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                        
                                    </form>
                                    <form id="register"method="post">
                                        {{ csrf_field() }}
                                        <input type="text" name="reMail" id="reMail" placeholder="Email">
                                        <input type="text" name="name" id="txtname" placeholder="Name">
                                        <input type="password" name="Repass" id="Repass" placeholder="Password">
                                        <input type="password" name="Rerepass" id="Rerepass" placeholder=" Repassword">
                                            <button id="subRegister" type="button"><span>Register</span></button>
                                        
                                        </div>
                                        
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){

    $('#subRegister').click(function(){
        var email = $('#reMail').val();
        var password = $('#Repass').val();
        var name = $('#txtname').val();
        var repassword = $('#Rerepass').val();
        var _token = $('input[name="_token"]').val();
        var url="{{route('register')}}"; 
        $.ajax({
                    url:url,
                    method: 'POST',
                    data:{
                        email:email,
                        name:name,
                        password:password,
                        repassword:repassword,
                        _token:_token
                        },
                    success:function(s){
                        $('#result').text(s);
                    }

                });
    });

    $('#register').hide();
    $('#btnRegister').click(function(){
        $('#login').hide();
        $('#register').show();
    });

    $('#btnLogin').click(function(){
        $('#login').show();
        $('#register').hide();
       
    });
    
});
</script>
@endsection