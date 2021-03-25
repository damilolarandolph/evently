<?php
require_once __DIR__ . "/../data/dbconfig/pdo.php";
require_once __DIR__ . "/../data/dao/user.php";

class FieldTester
{
    private $data;
    /** @var TestItem[] */
    private $tests;
    private $foundErrors = false;

    public static function withArgs($data, $tests)
    {
        $check = new self;
        $check->data = $data;
        $check->tests = $tests;
        return $check;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function fieldHasError($fieldName)
    {

        if ($this->foundErrors) {

            return $this->getField($fieldName)->hasErrors;
        }

        return false;
    }

    public function getFieldData($fieldName)
    {

        return $this->getField($fieldName)->data;
    }

    public function getFieldError($fieldName)
    {
        return $this->getField($fieldName)->error;
    }

    public function setTests($tests)
    {
        $this->tests = $tests;
    }


    public function test()
    {
        foreach ($this->tests as $test) {
            $test->test($this->data, $this);
        }
    }

    public function setFoundErrors($val)
    {
        $this->foundErrors = $val;
    }

    public function getFoundErrors()
    {
        return $this->foundErrors;
    }

    public function getField($name)
    {
        foreach ($this->tests as $test) {
            if ($test->field == $name) {
                return $test;
            }
        }
    }
}

class TestItem
{
    public $field;
    public $hasErrors = false;
    public $data;
    public $error;
    public $tests;

    public function __construct($field, $tests)
    {
        $this->field = $field;
        $this->tests = $tests;
    }

    /**
     * 
     * @param array $map
     * @param FieldTester $tester
     */
    public function test($map, $tester)
    {
        $this->data = $map[$this->field];
        foreach ($this->tests as $test) {
            $result = $test($this->field, $map);
            if ($result !== true) {
                $this->error = $result;
                $this->hasErrors = true;
                $tester->setFoundErrors(true);
                break;
            }
        }
    }
}


class Test
{
    public static $exists;
    public static $isLength;
    public static $isEmail;
    public static $isEqualTo;
    public static $emailIsUnique;
}

/**
 * @param string $key
 */
Test::$exists = function () {
    return function ($key, $map) {
        if (!isset($map[$key]) || strlen($map[$key]) == 0) {
            return "required";
        }
        return true;
    };
};

/**
 * 
 * 
 * @param string $key
 */
Test::$isLength = function ($length) {
    return function ($key, $map) use ($length) {
        if (!strlen($map) >= $length) {
            return "should be greater than or equal to $length";
        }
        return true;
    };
};

/**
 * 
 * @param string $key
 */
Test::$isEmail = function () {
    return function ($key, $map) {
        $test = preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $map[$key]) ? TRUE : FALSE;
        if (!$test) {
            return "not a valid email";
        }
        return true;
    };
};

/**
 * 
 * @param string comparisonKey
 * 
 * @return string|boolean
 * 
 */
Test::$isEqualTo = function ($comparisonKey) {
    return function ($key, $map) use ($comparisonKey) {

        if ($map[$key] !== $map[$comparisonKey]) {
            return "does not match";
        }
        return true;
    };
};

/**
 * 
 * @param string email
 * 
 * @return string|boolean
 * 
 */
Test::$emailIsUnique = function () {
    $userDao = new UserDAO(PDOConn::instance());
    return function ($key, $map) use ($userDao) {
        if ($userDao->emailExists($map[$key])) {
            return "email already exists";
        }
        return true;
    };
};
