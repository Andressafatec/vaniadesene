@extends('layouts.login')

@section('content')




<style>














</style>



@yield('pre-assets')







<div class="login-box">



    <div class="login-logo">



        <!-- <a href=""><b>PES </b>de Cristo</a> -->



    </div>



    <!-- /.login-logo -->



    <div class="card" style="background: none">



        <div class="card-body login-card-body" style="background: rgba(255,255,255,0.3);">

            <div class="text-center mb-4">

                <img src="{{ asset('images/logo.svg') }}" alt=""
                    style="margin: 0 auto; display: inline-block;">
            </div>


            <!-- <p class="login-box-msg">Acessar</p> -->







            <form action="{{ url('login') }}" method="post">



                {{ csrf_field() }}



                <div class="input-group mb-3">



                    <input type="email" class="form-control" name="email" placeholder="Email">



                    <div class="input-group-append">



                        <div class="input-group-text">



                            <span class="fas fa-envelope"></span>



                        </div>



                    </div>



                </div>



                <div class="input-group mb-3">



                    <input type="password" class="form-control" name="password" placeholder="Password">



                    <div class="input-group-append">



                        <div class="input-group-text">



                            <span class="fas fa-lock"></span>



                        </div>



                    </div>



                </div>



                <div class="row">







                    <!-- /.col -->



                    <div class="col-12">



                        <button type="submit" class="btn btn-success btn-block">Log in</button>



                    </div>



                    <!-- /.col -->



                </div>



            </form>











            <!-- /.social-auth-links -->















        </div>



        <!-- /.login-card-body -->



    </div>



</div>



@endsection



@section('pos-script')



@if($errors->any())



    @foreach($errors->all() as $error)



        <script>
            $(document).Toasts('create', {



                class: 'bg-danger',



                title: 'Erro',



                subtitle: '',



                body: '{{ $error }}'



            })
        </script>



    @endforeach



@endif







@endsection
