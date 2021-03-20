<?php





class Keys
{
    static $GOOGLE_PLACES = "GOOGLE_PLACES_API_KEY";

    private $keys;

    public function __construct()
    {

        $string = file_get_contents(__DIR__ . "/../keys.json", FILE_USE_INCLUDE_PATH);
        $this->keys =  json_decode($string, TRUE);
    }

    public function getKey($keyName)
    {
        return $this->keys[$keyName];
    }
}

$Keystore = new Keys();
