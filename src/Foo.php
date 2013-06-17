<?php 

/**
 * @Entity
 **/
class Foo implements Serializable
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
     * @OneToMany(targetEntity="Bar", mappedBy="foo", cascade={"persist"})
     */
    private $bars;

    public function __construct()
    {
        $this->bars = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBars()
    {
        return $this->bars;
    }

    public function serialize()
    {
        return serialize(array(
            $this->name,
            $this->id
        ));
    }

    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        list(
            $this->name,
            $this->id,
        ) = $data;
    }
}