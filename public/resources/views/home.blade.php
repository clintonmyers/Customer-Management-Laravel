@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>

                <div class="panel-body">

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php
                        require '../vendor/autoload.php';

                        $user = Auth::user()->email;
                        $password = 'clint1';

                        $client = new GuzzleHttp\Client();
                        $res = $client->request('GET', 'http://localhost:8887/api/customers', [
                            'auth' => [$user, $password]
                        ]);

                        $myArr = json_decode($res->getBody());

                        echo "<ul>";
                        
                        $i = 0; // variable i used for incrementing variable in foreach loop
                        // The loop generates the list of customers, as well as a removal button for each customer

                        foreach($myArr as $customer) {
                            echo Form::open(['url' => 'api/customers/remove/' . $i, 'method' => 'put']);
                            echo Form::submit('&times;', ['class' => 'close']);
                            echo Form::close();
                            echo $customer;
                            echo "<br>";
                            $i++;
                        }

                        // This form is for creating new customers
                        echo Form::open(['url' => 'api/customers/add/default', 'method' => 'put']);
                        echo Form::text('new-customer', '');
                        echo Form::submit('Add Customer');
                        echo Form::close();
                        echo "</ul>";

                    ?>
                    


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
