<?php
/**
 * @author Evgeny Gorchak <evgenygor89@gmail.com>
 * @version 1.0.0
 *
 */
namespace overals\GeoIP2;

use MaxMind\Db\Reader;
use Yii;
use Exception;
use yii\base\Object;

/**
 * Class GeoIP2
 */
class GeoIP2 extends Object {
    /**
     * @var string
     */
    public $mmdb = '@app/components/GeoIP2/GeoLite2-City.mmdb';
    /**
     * @var string
     */
    public $lng = 'en';
    /**
     * @var Reader
     */
    private $reader;

    /**
     * @var array
     */
    private $availableLng = ['de', 'en', 'es', 'ja', 'ru', 'zh-CN'];

    /**
     * @inheritDoc
     */
    public function init() {
        $db = Yii::getAlias($this->mmdb);
        $this->reader = new Reader($db);

        if(!in_array($this->lng, $this->availableLng)) throw new Exception("Unknown language");

        parent::init();
    }

    /**
     * @param string|null $ip
     * @return Result
     */
    public function getInfoByIP($ip = null) {
        if ($ip === null) {
            $ip = Yii::$app->request->getUserIP();
        }

        $result = $this->reader->get($ip);
        return new Result($result, $this->lng);
    }
}

