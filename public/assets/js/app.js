(function() {
    'use strict';

    angular
        .module('ordersApp',[])
        .config(function($interpolateProvider){
            $interpolateProvider.startSymbol('<%').endSymbol('%>');
        })
        .controller('OrdersCreateCtrl',OrdersCreateCtrl)
        .controller('OrdersViewCtrl',OrdersViewCtrl);

    function OrdersCreateCtrl($scope,$http){

        $http.get('/orders').success(function(orders){
            $scope.orders = orders;
        });

        $scope.getError = function(error){
            if(error.required){
                return "The field can not be blank";
            }
            if(error.number){
                return "The field must be a number ";
            }
            if(error.pattern){
                return "The field must be a number between 1-999999";
            }
        };

        $scope.saveOrder = function(addOrder,isValid){
            if(!isValid){
                $scope.showAddError = true;
            }
            else{
                $http.post('/save_order',addOrder).success(function(data){
                    if(data.status){
                        window.location = 'http://order-lar.dev';
                    }
                });
            }
        };
    };

    function OrdersViewCtrl($scope,$http) {

        $scope.getError = function(error){
            if(error.required){
                return "The field can not be blank";
            }
            if(error.number){
                return "The field must be a number ";
            }
            if(error.pattern){
                return "The field must be a number between 1-999999";
            }
        };

        $scope.orderId = window.order_id;

        $http.get('/get_order/'+$scope.orderId).success(function(data){
            $scope.ordersList = data;
        });

        $scope.deleteOrder = function(id,index){
            if(id){
                $http.get('/delete_order/'+id).success(function(data){
                    if(data.status){
                        $scope.ordersList.splice(index,1);
                    }
                });
            }
            else{
                $scope.ordersList.splice(index,1);
            }
        };

        $scope.addOrderBlock = function(){

            var newOrder = {
                order_id:'',
                price:'',
                description:'',
                available:''
            };

            $scope.ordersList.push(newOrder);
        };

        $scope.saveOrderList = function(isValid){
            if(!isValid){
                $scope.showError = true;
            }
            else{
                $http.post('/save_order_list',$scope.ordersList).success(function(data){
                    if(data.status){
                        window.location = 'http://order-lar.dev';
                    }
                });
            }
        }
    }

})();




