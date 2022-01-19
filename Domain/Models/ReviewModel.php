<?php
    class ReviewViewModel
    {
        public $reviewId;
        public $insDate;
        public $userName;
        public $userEmail;
        public $reviewText;
              
        function Set($reviewId, $insDate, $userName, $userEmail, $reviewText) {
            $this -> reviewId = $reviewId;
            $this -> insDate = $insDate;
            $this -> userName = $userName;
            $this -> userEmail = $userEmail;
            $this -> reviewText = $reviewText;
            return $this;
        }

        function Get() {
            return $this;
        }
    }