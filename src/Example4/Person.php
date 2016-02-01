<?php
namespace beeare\TDD\Example4;

class Person
{
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var int
     */
    private $gender;

    /**
     * @var array
     */
    private $parents;

    /**
     * Person constructor.
     *
     * @param string $firstName
     * @param string $lastName
     * @param int $gender
     */
    public function __construct($firstName, $lastName, $gender)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->gender = $gender;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param int $gender
     */
    public function setGender($gender)
    {
        $this->throwExceptionIfGenderInvalid($gender);
        $this->gender = $gender;
    }

    /**
     * @param int $gender
     */
    private function throwExceptionIfGenderInvalid($gender)
    {
        if ($this->isMale($gender) || $this->isFemale($gender)) {
            return;
        }

        throw new \InvalidArgumentException('Invalid gender specified. Pass 1 for male or 2 for female.');
    }

    /**
     * @param int $gender
     *
     * @return bool
     */
    private function isMale($gender)
    {
        return $gender == self::GENDER_MALE;
    }

    /**
     * @param int $gender
     *
     * @return bool
     */
    private function isFemale($gender)
    {
        return $gender == self::GENDER_FEMALE;
    }

    /**
     * @param array $parents
     */
    public function setParents($parents)
    {
        $this->throwExceptionIfTooManyParentsParents($parents);
        $this->parents = $parents;
    }

    /**
     * @param $parents
     */
    private function throwExceptionIfTooManyParentsParents($parents)
    {
        if (count($parents) > 2) {
            throw new \InvalidArgumentException(
                'Too many parents specified. A person can only have up to two parents.'
            );
        }
    }

    /**
     * @return array
     */
    public function getParents()
    {
        return $this->parents;
    }
}