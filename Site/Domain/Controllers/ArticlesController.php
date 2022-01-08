<?php
    function Delivery() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/Delivery.php";
        return DeliveryView();   
    }

    function ColdAsphalt() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/ColdAsphalt.php";
        return ColdAsphaltView();   
    }

    function Asphalt() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/Asphalt.php";
        return AsphaltView();   
    }

    function Emulsion() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/Emulsion.php";
        return EmulsionView();   
    }

    function Services() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/Services.php";
        return ServicesView();   
    }

    function Laboratory() {
        require_once LOCAL_PATH_ROOT."/Domain/Views/Articles/Laboratory.php";
        return LaboratoryView();   
    }