<?php
    class CartItemModel
    {
        public $productId;
        public $productName;
        public $unit;
        public $price;
        public $quantity;
        public $sm;

        function SetQuantity($quantity) {
            $this -> quantity = $quantity;
            $this -> Calc();
            return $this;
        }

        function Set($productId, $productName, $unit, $price, $quantity, $sm) {
            $this -> productId = $productId;
            $this -> productName = $productName;
            $this -> unit = $unit;
            $this -> price = $price;
            $this -> quantity = $quantity;
            $this -> sm = $sm;
            $this -> Calc();
            return $this;
        }

        function Calc() {
            $this -> sm = $this -> price *  $this -> quantity;
        }

        function Get() {
            return $this;
        }
    }

    class CartViewModel
    {
        public $items = [];
        public $userid;
        public $status;
        public $total = 0;

        function SetUserId($userid) {
            $this -> userid = $userid;
        }

        function SetStatus($status) {
            $this -> status = $status;
        }

        function AddItem($item) {
            $this -> items[] = $item;
            $this -> Calc();
        }

        function Calc() {
            $this -> total = 0;

            if (count($this -> items) > 0) {
                foreach($this -> items as $item) {
                    $this -> total += $item -> sm;
                }
            }
        }

        function Get() {
            return $this;
        }
    }