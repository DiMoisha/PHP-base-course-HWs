<?php
    class OrderModel
    {
        public $orderId;
        public $orderStatusId;
        public $status;
        public $custName;
        public $custTel;
        public $custEmail;
        public $contactPerson;
        public $isDelivery;
        public $deliveryAdress;
        public $deliverySum;
        public $isOnlinePay;
        public $orderSum;
        public $orderNote;
        public $insDate;

        function Set($orderId,$orderStatusId,$status,$custName,$custTel,$custEmail,$contactPerson,
                    $isDelivery,$deliveryAdress,$deliverySum,$isOnlinePay,$orderSum,$orderNote,$insDate) {
            $this -> orderId = $orderId;
            $this -> orderStatusId = $orderStatusId;
            $this -> status = $status;
            $this -> custName = $custName;
            $this -> custTel = $custTel;
            $this -> custEmail = $custEmail;
            $this -> contactPerson = $contactPerson;
            $this -> isDelivery = $isDelivery;
            $this -> deliveryAdress = $deliveryAdress;
            $this -> deliverySum = $deliverySum;
            $this -> isOnlinePay = $isOnlinePay;
            $this -> orderSum = $orderSum;
            $this -> orderNote = $orderNote;
            $this -> insDate = $insDate;
            return $this;
        }
     
        function Get() {
            return $this;
        }
    }

    class OrderDetailModel
    {
        public $orderDetailId;
        public $orderId;
        public $productId;
        public $productName;
        public $unit;
        public $price;
        public $quantity;
        public $sm;
 
        function Set($orderDetailId,$orderId,$productId,$productName,$unit,$price,$quantity,$sm) {
            $this -> orderDetailId = $orderDetailId;
            $this -> orderId = $orderId;
            $this -> productId = $productId;
            $this -> productName = $productName;
            $this -> unit = $unit;
            $this -> price = $price;
            $this -> quantity = $quantity;
            $this -> sm = $sm;
            return $this;
        }

        function Get() {
            return $this;
        }
    }

    class OrderViewModel extends OrderModel
    {
        public $orderDetails = [];

        function SetOrderId($orderId) {
            $this -> order -> orderId = $orderId;

            if(count($this -> orderDetails) > 0) {
                for($i = 0; $i < count($this -> orderDetails); $i ++) {
                    $this -> orderDetails[$i] -> orderId = $orderId;
                }
            }
        }

        function SetOrderDetails($items) {
            $this -> orderDetails = $items;
        }

        function AddItem($item) {
            $this -> orderDetails[] = $item;
        }

        function Get() {
            return $this;
        }
    }