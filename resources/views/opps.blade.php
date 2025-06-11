@php
    // Contstructor Method
    class person
    {
        public $name, $age, $phone;

        function __construct($n = 'No Name', $a = 'No Age', $p = 'No Phone')
        {
            $this->name = $n;
            $this->age = $a;
            $this->phone = $p;
        }

        function show()
        {
            dd("Your Name Is {$this->name}.Your age is {$this->age}.Your Phone No is {$this->phone}.");
        }
    }

    // $p = new person('sanjay', 20, 4512666);
    // $p = new person(); // Default value come when no values given in this.
    // $p->show();

    //Inheritance

    class employees
    {
        public $name;
        public $age;
        public $salary;

        function __construct($n, $a, $s)
        {
            $this->name = $n;
            $this->age = $a;
            $this->salary = $s;
        }

        function show()
        {
            echo '<h3>Employee Information</h3>';
            echo "Employees Name: {$this->name}<br>";
            echo "Employees Age: {$this->age}<br>";
            echo "Employees Salary: {$this->salary}<br>";
        }
    }

    class manager extends employees
    {
        public $mobile = 200;
        public $elect = 2000;
        public $pani = 1000;
        public $totalSalary;
        function show()
        {
            $this->totalSalary = $this->salary + $this->mobile + $this->elect + $this->pani;
            echo '<br><h3>Manager Information</h3>';
            echo "Employees Name: {$this->name}<br>";
            echo "Employees Age: {$this->age}<br>";
            echo "Employees Salary: {$this->totalSalary}<br>";
        }
    }

    // $e = new employees('sanjay', 29, 40000);
    // $m = new manager('Manager', 29, 40000);
    // $e->show();
    // $m->show();

    // Abstract Class

    abstract class parentClass
    {
        public $name;

        abstract protected function calc($a, $b);
    }

    class childClass extends parentClass
    {
        public function calc($a, $b)
        {
            echo $a + $b;
        }
    }

    $p = new childClass();
    $p->calc(5, 5);

    interface parent1
    {
        function add($a, $b);
    }

    interface parent2
    {
        function sub($a, $b);
    }

    class childClass implements parent1, parent2
    {
        function add($a, $b)
        {
            $sum = $a + $b;
            echo "sum : $a + $b = $sum";
        }

        function sub($a, $b)
        {
            $sub = $a - $b;
            echo "sub : $a - $b = $sub";
        }
    }

    // $c = new childClass();
    // $c->add(20, 50);
    // echo '<br>';
    // $c->sub(70, 50);

    // Traits

    trait A
    {
        public function helow()
        {
            echo 'Hellow';
        }
    }

    trait b
    {
        public function bye()
        {
            echo 'Bye';
        }
    }

    class c
    {
        use a, b;
    }

    // $c = new c();
    // $c->helow();
    // $c->bye();

    // toString magic method
    class stringClass
    {
        private $name;

        public function show()
        {
            echo $this->name;
        }
        function __toString()
        {
            return 'Can not retrive object as string class : ' . get_class($this);
        }

        function __get($property)
        {
            return 'this is private or non existing property.' . $property;
        }

        function __set($property, $value)
        {
            if (property_exists($this, $property)) {
                $this->$property = $value;
            } else {
                echo "This is not existing property : $property";
            }
        }
    }

    // $str = new stringClass();
    // echo $str;
    // $str->name = 'sanjay';
    // $str->show();
    // $str->class = 'sanjay';
@endphp
