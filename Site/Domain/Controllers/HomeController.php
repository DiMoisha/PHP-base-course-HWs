<?php
    function Index() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/Index.php";
        return IndexView();
    }

    function About() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/About.php";
        return AboutView();
    }

    function Contact() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/Contact.php";
        return ContactView();
    }

    function Calculator() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/Calculator.php";
        return CalculatorView();
    }

    function PriceList() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/Pricelist.php";
        return PriceListView();
    }

    function News() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Home/News.php";
        return NewsView();
    }