<?php
    class User {
        // properties that belong to a class
        private $name;
        public $email;
        protected $age;
        public $password;

        // constructor: function that runs when an object is instantiated
        public function __construct($name,
                                    $age,
                                    $email,
                                    $password) {
//            echo "constructor run<br>";
            $this->name = $name;
            $this->age = $age;
            $this->email = $email;
            $this->password = $password;
        }

        // method: a function that belong to a class
        function set_name($name) // setter
        {
            $this->name = $name;
        }

        function get_name() // getter
        {
            return $this->name;
        }
    }

    // init an object
//    $user1 = new User();
//    $user1->set_name('Phu Tam');
//    $user2 = new User();
//    $user2->set_name('Tran Thuy');
//    print_r($user1);
//    print_r($user2);

//    echo $user1->get_name().'<br>';
//    echo $user2->get_name();

    $user3 = new User('Phu Tam', 19, 'pt@gmail.com', 123456);
    print_r($user3);

    // inheritance
    #[AllowDynamicProperties] class Employee extends User {
        public function __construct($name,
                                    $age,
                                    $email,
                                    $password,
                                    $title)
        {
            parent::__construct($name, $age, $email, $password);
            $this->title = $title;
        }
        public function get_title() {
            return $this->title;
        }
    }
    $employee1 = new Employee('Tran Thuy', 19, 'tt@gmail.com', 123456, 'Boss');
    print_r($employee1);
?>