@extends('layouts.master')

@section('title', 'Orders')

@section('ng-app', 'ordersApp')

@section('content')
    <div class="container" ng-controller = "OrdersCreateCtrl">
        <div class="row orders-content">
            <div class="col-xs-6 col-xs-offset-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Orders List</h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ol id="prod_ol">
                            <li ng-repeat="order in orders">
                                <a class='prod-a' href="<?=  url('/view_order')?>/<%order.order_id%>">Order<%order.order_id%></a>
                            </li>
                            <div id="add_order_button" class="form-group">
                                <a href=<?= url('/add_order')?> type="button" class="btn btn-primary">Add order</a>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js')}}"></script>
@stop
