<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>

                <div class="panel-body">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>