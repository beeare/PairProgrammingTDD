<?php
namespace beeare\TDD\Example4;

class PersonTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Person
     */
    private $person;

    /**
     * @return Person
     */
    protected function setUp()
    {
        $this->person = new Person('Ben', 'Rack', 1);
    }

    public function testNewPerson()
    {
        $this->assertInstanceOf(Person::class, $this->person);
    }

    public function testSetAndGetFirstName()
    {
        $this->person->setFirstName('Benjamin');
        $this->assertEquals('Benjamin', $this->person->getFirstName());
    }

    public function testSetAndGetLastName()
    {
        $this->person->setLastName('Meier');
        $this->assertEquals('Meier', $this->person->getLastName());
    }

    public function testSetAndGetGender()
    {
        $this->person->setGender(2);
        $this->assertEquals(2, $this->person->getGender());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @dataProvider invalidGenderProvider
     *
     * @param $gender
     */
    public function testSetInvalidGender($gender)
    {
        $this->person->setGender($gender);
    }

    public function invalidGenderProvider()
    {
        return [[-1], [0], [3], [4]];
    }

    public function testSetTwoParents()
    {
        $father = new Person('Peter', 'Rack', Person::GENDER_MALE);
        $mother = new Person('Petra', 'Rack', Person::GENDER_FEMALE);
        $this->person->setParents([$father, $mother]);
        $this->assertEquals([$father, $mother], $this->person->getParents());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetMoreThanTwoParents()
    {
        $father = new Person('Peter', 'Rack', Person::GENDER_MALE);
        $mother1 = new Person('Petra', 'Rack', Person::GENDER_FEMALE);
        $mother2 = new Person('Christine', 'Bauer', Person::GENDER_FEMALE);
        $this->person->setParents([$father, $mother1, $mother2]);
    }
}
