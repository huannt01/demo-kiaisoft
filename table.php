<?php

interface In_Table
{
    const LEAVING_MESSAGE = "GOODBYE";
    public function stack();
    public function goodBye();
}

class Table
{
    public $color;
    public $table_leg;

    function __construct($color, $table_leg)
    {
        $this->color = $color;
        $this->table_leg = $table_leg;
    }

    function intro()
    {
        echo 'Table color ' . $this->color . ' have ' . $this->table_leg . ' table legs';
    }

};

$table = new Table('red', 4);
echo '<pre>';
var_dump($table);
echo '</pre>';

class Table_Child extends Table implements In_Table
{
    private $material;

    function __construct($color, $table_leg, $material)
    {
        $this->color = $color;
        $this->table_leg = $table_leg;
        $this->material = $material;
    }

    public function getMaterial()
    {
        return $this->material;
    }

    public function setMaterial($material): void
    {
        $this->material = $material;
    }

    public function intro()
    {
        echo 'Table color ' . $this->color . ' have ' . $this->table_leg . ' table legs, made from ' . $this->material;
        parent::intro();
        parent::ham_dac_biet();
    }

    public function stack()
    {
        echo "Stackable";
    }

    public function goodBye()
    {
        echo self::LEAVING_MESSAGE;
    }
};

$table_child = new Table_Child('brown', 4, 'wood');






