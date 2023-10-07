<?php

namespace MyCommon\Libraries\Masters;

abstract class Master
{
    protected $master = [];
    protected $masterEnglish = [];
    protected $urlMaster = [];

    public function get($key, $arrayName = 'master', $default = '')
    {
        return (isset($this->$arrayName[$key]) ? $this->$arrayName[$key] : $default);
    }

    public function set($key, $val)
    {
        $this->master[$key] = $val;
    }

    public function isEmpty($key)
    {
        return empty($this->master[$key]);
    }

    public function all()
    {
        return $this->master;
    }

    public function getKeys()
    {
        return array_keys($this->master);
    }

    public function getKeysAsString($glue = ',')
    {
        return implode($glue, $this->getKeys());
    }

    public function isValidId($id)
    {
        return in_array($id, $this->getKeys());
    }

    public function getUrls()
    {
        return array_values($this->urlMaster);
    }

    public function getUrl($key, $default = '')
    {
        return (isset($this->urlMaster[$key]) ? $this->urlMaster[$key] : $default);
    }

    public function getIndexFromUrl($url, $default = '')
    {
        foreach ($this->urlMaster as $key => $val) {
            if (strcmp($val, $url) === 0) {
                return $key;
            }
        }
        return $default;
    }

    public function getIndexFromUrlInParticularIndex($url, $particularIndexes = [], $default = '')
    {
        foreach ($this->urlMaster as $key => $val) {
            if (in_array($key, $particularIndexes)) {
                if (strcmp($val, $url) === 0) {
                    return $key;
                }
            }
        }
        return $default;
    }

    public function getIDList()
    {
        $retVal = "";

        if (count($this->master) == 0) {
            return "";
        }

        $tmp = $this->master;
        ksort($tmp);
        $sortKeys = array_keys($tmp);
        foreach ($sortKeys as $key) {
            $retVal .= $key . ",";
        }

        if ($retVal != "") {
            $retVal = substr($retVal, 0, -1);
        }

        return $retVal;
    }

    public function getNameByID($id, $exWord = '')
    {

        $tmpMstData = $this->master;

        $retVal = "";

        if (count($tmpMstData) == 0) {
            return "";
        }

        if (is_string($id) || is_numeric($id)) {
            if (array_key_exists($id, $tmpMstData) == FALSE) {
                return "";
            }
        } else {
            return "";
        }

        $retVal = $tmpMstData[$id] . $exWord;

        return $retVal;
    }
}
