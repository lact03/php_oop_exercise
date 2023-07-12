<?php
abstract class Shape {
    protected $name;
    abstract public function description();
}

interface IShape {
    public function getArea($length, $width = null);
    public function getPerimeter($length, $width = null);
}

class Square extends Shape implements IShape {
    public function description() {
        return "Square has four equal sides.";
    }

    public function getArea($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "Invalid: Length and width should be equal.";
        }

        return $length * $length;
    }

    public function getPerimeter($length, $width = null) {
        if ($width !== null && $length !== $width) {
            return "Invalid: Length and width should be equal.";
        }

        return 4 * $length;
    }
}

class Rectangle extends Shape implements IShape {
    public function description() {
        return "Rectangle has two equal sides.";
    }

    public function getArea($length, $width = null) {
        return $length * ($width !== null ? $width : $length);
    }

    public function getPerimeter($length, $width = null) {
        return 2 * ($length + ($width !== null ? $width : $length));
    }
}

class Triangle extends Shape implements IShape {
    public function description() {
        return "Triangle has three sides.";
    }

    public function getArea($length, $width = null) {
        return ($length * ($width !== null ? $width : $length)) / 2;
    }

    public function getPerimeter($length, $width = null) {
        return "Invalid: Triangle does not have a single perimeter. Use getTrianglePerimeter() method instead.";
    }

    public function getTrianglePerimeter($side1, $side2, $side3) {
        return $side1 + $side2 + $side3;
    }
}

class Circle extends Shape implements IShape {
    public function description() {
        return "Circle has no sides, only a curve.";
    }

    public function getArea($radius, $width = null) {
        return pi() * pow($radius, 2);
    }

    public function getPerimeter($length, $width = null) {
        $radius = $length;
        return 2 * pi() * $radius;
    }
}

$shape1 = new Square();
echo $shape1->description() . "<br>";
echo $shape1->getArea(5, 4) . "<br>";
echo $shape1->getArea(2, 2) . "<br>";
echo $shape1->getPerimeter(3, 4) . "<br>";
echo $shape1->getPerimeter(2, 2) . "<br><br>";

$shape2 = new Rectangle();
echo $shape2->description() . "<br>";
echo $shape2->getArea(4, 6) . "<br>";
echo $shape2->getPerimeter(4, 6) . "<br><br>";

$shape3 = new Triangle();
echo $shape3->description() . "<br>";
echo $shape3->getArea(4, 6) . "<br>";
echo $shape3->getTrianglePerimeter(4, 6, 7) . "<br><br>";

$shape4 = new Circle();
echo $shape4->description() . "<br>";
echo $shape4->getArea(5) . "<br>";
echo $shape4->getPerimeter(5) . "<br>";
?>