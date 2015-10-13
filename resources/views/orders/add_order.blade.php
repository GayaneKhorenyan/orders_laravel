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
                            <h4>Add Order</h4>
                        </div>
                    </div>
                    <div class="panel-body " style="padding-left: 50px;padding-right: 50px;">
                        <form name="addOrderForm" id="add_order_form" novalidate class="form-horizontal" role="form" ng-submit="saveOrder(addOrder,addOrderForm.$valid)">
                            <div class="form-group">
                                <input id="price" type="number" class="form-control" name="price" placeholder="Price" ng-model="addOrder.price"  ng-pattern="/^[1-9]{1,6}$/" required>
                                <div class="error" ng-show="showAddError">
                                    <% getError(addOrderForm.price.$error) %>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="description" type="text" class="form-control" name="description" placeholder="Description" ng-model="addOrder.description" required>
                                <div class="error" ng-show="showAddError">
                                    <% getError(addOrderForm.description.$error) %>
                                </div>
                            </div>
                            <div class="form-group">
                                <input id="available " type="checkbox" class="form-control" name="available" value="1" placeholder="Available" ng-model="addOrder.available">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/app.js')}}"></script>
@stop


