<?php

/**
 * @Entity
 * @Table(name="bar")
 **/
class Bar
{
    /**
     * @Column(type="integer")
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     *
     * @var integer
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ManyToOne(targetEntity="Foo", inversedBy="bars", cascade={"persist"})
     */
    private $foo;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getFoo()
    {
        return $this->foo;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setFoo(Foo $foo)
    {
        $this->foo = $foo;
    }
}