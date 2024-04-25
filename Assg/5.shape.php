<!DOCTYPE html>
<html>
<head>
    <title>Shape Area Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        input[type="radio"] {
            margin-right: 10px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .result {
            margin-top: 20px;
            font-weight: bold;
            padding: 10px;
            background-color: #f0f0f0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Shape Area Calculator</h2>
    <form method="post">
        <input type="radio" name="shape" value="triangle" checked> Triangle
        <input type="radio" name="shape" value="square"> Square
        <input type="radio" name="shape" value="circle"> Circle
        <br><br>
        <div id="inputs"></div>
        <br>
        <input type="submit" name="submit" value="Calculate Area">
    </form>
    <?php
    class Shape {
        public function calculateArea() {
            return 0;
        }
    }
    class Triangle extends Shape {
        private $base;
        private $height;
        public function __construct($base, $height) {
            $this->base = $base;
            $this->height = $height;
        }
        public function calculateArea() {
            return 0.5 * $this->base * $this->height;
        }
    }
    class Square extends Shape {
        private $side;
        public function __construct($side) {
            $this->side = $side;
        }
        public function calculateArea() {
            return $this->side * $this->side;
        }
    }
    class Circle extends Shape {
        private $radius;
        public function __construct($radius) {
            $this->radius = $radius;
        }
        public function calculateArea() {
            return pi() * $this->radius * $this->radius;
        }
    }
    if (isset($_POST['submit'])) {
        if (isset($_POST['shape'])) {
            $selectedShape = $_POST['shape'];
            switch ($selectedShape) {
                case 'triangle':
                    if(isset($_POST['base']) && isset($_POST['height'])) {
                        $base = $_POST['base'];
                        $height = $_POST['height'];
                        $triangle = new Triangle($base, $height);
                        echo "<div class='result'>Area of Triangle: " . $triangle->calculateArea() . "</div>";
                    }
                    break;
                case 'square':
                    if(isset($_POST['side'])) {
                        $side = $_POST['side'];
                        $square = new Square($side);
                        echo "<div class='result'>Area of Square: " . $square->calculateArea() . "</div>";
                    }
                    break;
                case 'circle':
                    if(isset($_POST['radius'])) {
                        $radius = $_POST['radius'];
                        $circle = new Circle($radius);
                        echo "<div class='result'>Area of Circle: " . $circle->calculateArea() . "</div>";
                    }
                    break;
                default:
                    echo "<div class='result'>Please select a shape.</div>";
            }
        }
    }
    ?>
</body>
<script type="text/javascript">
    const shapeRadios = document.querySelectorAll('input[name="shape"]');
    const inputsDiv = document.getElementById('inputs');
    shapeRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            if (this.value === 'triangle') {
                inputsDiv.innerHTML = '<label>Base:</label><input type="number" name="base" required><br><label>Height:</label><input type="number" name="height" required>';
            } else if (this.value === 'square') {
                inputsDiv.innerHTML = '<label>Side:</label><input type="number" name="side" required>';
            } else if (this.value === 'circle') {
                inputsDiv.innerHTML = '<label>Radius:</label><input type="number" name="radius" required>';
            }
        });
    });
</script>
</html>
