<?php
class Circle {
    private $radius = 1.0;
    private $color = "red";

    public function __construct1($radius) {
        //$this->radius = $radius;
    }
    
    public function __construct($radius,$color) {

    }

    public function getRadius() :float{
        return $this->radius;
    }

    public function setRadius($radius):void{
        $this->radius = $radius;
    }

    public function getArea() :float{
        return pi() * $this->radius * $this->radius;
    }

    public function getColor(): float
    {
        return $this->color;
    }

    public function setColor($color):void
    {
        $this->color = $color;
    }
    public function toString():string{
        return $this->color;
    }
}

class Employee{
    private int $id ;
    private string $firstName;
    private string $lastName;
    private int $salary;

    public function __construct($id,$firstName,$lastName,$salary)
    {
        
    }

    public function getId():int{
        return $this->id;
    }

    public function getFirstName() : string {
        return $this->firstName;
    }

    public function getLastName() : string {
        return $this->lastName;
    }

    public function name() : string {
        return $this->firstName . $this->lastName;
    }

    public function getSalary() : int {
        return $this->salary;
    }

    public function setSalary($salary) :void{
        $this->salary = $salary;
    }

    public function getAnnualSalary() : int {
        return $this->salary*12;
    }

    public function raiseSalary($percentage) : int {
        $perOfSalary = $this->salary * $percentage;
        $this->salary = $perOfSalary;
        return $this->salary;
    }

}

class Rectangle{
    private $length = 1.0;
    private $width = 1.0;

    public function __construct(){}

    public function __construct1($length,$width)
    {
        
    }

    public function getLength() : float {
        return $this->length;
    }
    public function setLength($length) :void {
        $this->length = $length;
    }

    public function getWidth() : float {
        return $this->width;
    }
    public function setWidth($width) :void {
        $this->width = $width;
    }

    public function getArea() : float {
        return $this->length * $this->width * 2;
    }


}

class IncoiceItem{
    private string $id;
    private string $desc;
    private int $qty;
    private float $unitPrice;

    public function __construct($id,$desc,$qty,$unitPrice)
    {
        
    }

    public function getId() : string {
        return $this->id;
    }

    public function getDesc() : string {
        return $this->desc;
    }

    public function getQty() : int {
        return $this->qty;
    }

    public function setQty($qty) : void {
        $this->qty = $qty;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function setUnitPrice($unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    public function getTotal() : float {
        return $this->unitPrice * $this->qty;
    }
    
}