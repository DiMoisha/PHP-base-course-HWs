<?php
    class ProductModel
    {
        public $productId;
        public $productName;
        public $descr;
        public $unit;
        public $price;
        public $html_pg_title;
        public $html_mt_descr;
        public $html_mt_kwrds;
              
        function Set($productId, $productName, $descr, $unit, $price, $html_pg_title, $html_mt_descr, $html_mt_kwrds) {
            $this -> productId = $productId;
            $this -> productName = $productName;
            $this -> descr = $descr;
            $this -> unit = $unit;
            $this -> price = $price;
            $this -> html_pg_title = $html_pg_title;
            $this -> html_mt_descr = $html_mt_descr;
            $this -> html_mt_kwrds = $html_mt_kwrds;
            return $this;
        }

        function Get() {
            return $this;
        }
    }

    class ProductPicModel
    {
        public $productId;
        public $picName;

        function Set($productId, $picName) {
            $this -> productId = $productId;
            $this -> picName = $picName;
            return $this;
        }

        function Get() {
            return $this;
        }
    }

    class ProductShortViewModel
    {
        public $productId;
        public $productName;
        public $unit;
        public $price;

        function Set($productId, $productName, $unit, $price) {
            $this -> productId = $productId;
            $this -> productName = $productName;
            $this -> unit = $unit;
            $this -> price = $price;
            return $this;
        }

        function Get() {
            return $this;
        }
    }

    class ProductViewModel
    {
        public $product;
        public $productPics = [];

        function SetProduct($product) {
            $this -> product = $product;
        }

        function SetProductId($productId) {
            if ($this -> product) {
                $this -> product -> productId = $productId;

                if(count($this -> productPics) > 0) {
                    for($i = 0; $i < count($this -> productPics); $i ++) {
                        $this -> productPics[$i] -> productId = $productId;
                    }
                }
            }
        }

        function SetProductPics($pics) {
            $this -> productPics = $pics;
        }

        function AddPic($pic) {
            $this -> productPics[] = $pic;
        }

        function Get() {
            return $this;
        }
    }