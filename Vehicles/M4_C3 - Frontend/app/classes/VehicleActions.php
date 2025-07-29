<?php
interface VehicleActions{
    public function addVehicle($data);
    public function editVehicle($id,$data);
    public function deleteVehicle($data);
    public function getVehicle($data);
}