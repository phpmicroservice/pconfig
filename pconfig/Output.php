<?php



namespace pconfig;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



/**
 * Output
 * 输出
 * @author dongasai
 */
class Output extends \Phalcon\Di\Injectable
{
    
    /**
     * 格式输出
     * @param type $data
     * @param type $type
     * @return type
     */
    public static function geshi($data,$type='json')
    {
      
        switch ($type){
            case 'json':
                return self::json($data);
                break;
            case 'xml':
                return self::xml($data);
                break;
            case 'yaml':
                return self::yaml($data);
                break;
            case 'csv':
                return self::csv($data);
                break;
            case 'ini':
                return self::ini($data);
                break;
            default :
                dump($data);
             
        }
        
    }
    
    
    
    /**
     * Json格式
     * @param type $person
     * @return type
     */
    public static function json($person)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        return $serializer->serialize($person, 'json');
    }
    
    /**
     * Xml格式
     * @param type $person
     * @return type
     */
    public static function xml($person)
    {
        $encoders = [new XmlEncoder()];
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        
        return $serializer->serialize($person, 'xml');
    }

    
    
    /**
     * yaml格式
     * @param type $person
     */
    public static function yaml($person)
    {
        return \Symfony\Component\Yaml\Yaml::dump($person);
    }
    
    /**
     * INI格式输出
     * @param type $person
     * @return type
     */
    public static function ini($person)
    {
	
	$writer = new \Matomo\Ini\IniWriter();
	try
	{
	    return $writer->writeToString($person);
	}
	catch (\Matomo\Ini\IniWritingException $ex)
	{
	    return $writer->writeToString([
			'sys' => [
			    'error'	 => 1,
			    'msg'	 => '您请求的内容不能以INI格式输出'
			]
	    ]);
	}
    }

    /**
     * csv
     * @param type $person
     */
    public static function csv($person)
    {
         $encoders = [new \Symfony\Component\Serializer\Encoder\CsvEncoder()];
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer()];

        $serializer = new Serializer($normalizers, $encoders);
        
        return $serializer->serialize($person, 'csv');
    }

}
