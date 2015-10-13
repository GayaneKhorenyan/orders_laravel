
@extends('layouts.master')

@section('title', 'Orders')

@section('ng-app', 'ordersApp')

@section('content')
    <div class="container" ng-controller="OrdersViewCtrl">
        <div class="row orders-content">
            <div class="col-xs-6 col-xs-offset-3 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h4>Order </h4>
                        </div>
                    </div>
                    <div class="panel-body">
                        <ol id="prod_ol">
                            <form name="orderBlockForm" id="orders_form" novalidate class="form-inline" role="form" method="post" ng-submit="saveOrderList(orderBlockForm.$valid)">
                                <div id="orders_list_block" >
                                    <div ng-repeat="order in ordersList">
                                        <div data_id="<%$index%>" class="order-block" >
                                            <input type="hidden" name="order[<%$index%>][order_id]" value="<%order['order_id']%>" >
                                            <input type="hidden" name="order[<%$index%>][id]" value="<%order['id']%>" >
                                            <div style="margin-bottom: 25px; width: 100px;margin-right: 10px" class="form-group">
                                                <input style="width: 100% !important;" id="price" type="number" class="form-control input-fields" name="order[<%$index%>][price]" ng-model = "order['price']" required ng-pattern="/^[1-9]{1,6}$/" placeholder="price">
                                            </div>
                                            <div style="margin-bottom: 25px;vertical-align: top;" class="form-group">
                                                <input id="description" type="text" class="form-control input-fields"  name="order[<%$index%>][description]" ng-model = "order['description']" required placeholder="description">
                                            </div>
                                            <div style="margin-bottom: 25px;vertical-align: top;" class="form-group checkbox" >
                                                <label><input type="checkbox" name="order[<%$index%>][available]" ng-model = "order['available']" ng-checked="order['available']" ng-true-value="1"></label>
                                            </div>
                                            <div style="margin-bottom: 25px;vertical-align: top;" class="form-group" >
                                                <span class="glyphicon glyphicon-minus" ng-click="deleteOrder(order['id'],$index)" > </span>
                                            </div>
                                            <div style="margin-bottom: 25px;vertical-align: top;" class="form-group">
                                                <span class="glyphicon glyphicon-plus" ng-click="addOrderBlock()"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="button" style="margin-top:10px" class="form-group" ng-if="ordersList.length">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                    <a href="">Orders List</a>
                                </div>
                            </form>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var order_id = {{$order_id}};
        </script>
        <script src="{{ asset('assets/js/app.js')}}"></script>
    </div>
@stop
