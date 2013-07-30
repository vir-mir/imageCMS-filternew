<?php

/**
 * Skeleton subclass for representing a row from the 'shop_product_properties' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.Shop
 */
class SProperties extends BaseSProperties {

    public function attributeLabels() {
        return array(
            'ProductId' => ShopCore::t('ProductId'),
            'Name' => ShopCore::t('Название'),
            'CsvName' => ShopCore::t('Имя колнки CSV'),
            'Multiple' => ShopCore::t('Множественный выбор'),
            'Slide' => ShopCore::t('Ползунок'),
            'List' => ShopCore::t('Списком'),
            'Def' => ShopCore::t('По умолчанию'),
            'Active' => ShopCore::t('Активно'),
            'Position' => ShopCore::t('Позиция'),
            'Data' => ShopCore::t('Значения'),
            'ShowOnSite' => ShopCore::t('Показывать на странице товара'),
            'MainProperty' => ShopCore::t('Главное свойство'),
            'ShowInCompare' => ShopCore::t('Показывать в сравнении товаров'),
            'ShowInFilter' => ShopCore::t('Показывать в фильтре'),
            'UseInCategories' => ShopCore::t('Использовать в категориях'),
        );
    }

    /**
     * Gets an array of SProductPropertiesData objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SProperties is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      PropelPDO $con optional connection object
     * @return     PropelCollection|array SProductPropertiesData[] List of SProductPropertiesData objects
     * @throws     PropelException
     */
    public function getSProductPropertiesDatas($criteria = null, PropelPDO $con = null, $locale = null, $pid = null, $forced = false) {
        if ($locale == null)
            $locale = MY_Controller::getCurrentLocale();

        if ($forced) {
            $collSProductPropertiesDatas = SProductPropertiesDataQuery::create(null, $criteria)
                    ->filterByLocale($locale)
                    ->filterBySProperties($this);
            if ($pid)
                $collSProductPropertiesDatas = $collSProductPropertiesDatas->filterByProductId($pid);
            $collSProductPropertiesDatas = $collSProductPropertiesDatas->find($con);
            if (null !== $criteria) {
                return $collSProductPropertiesDatas;
            }
            $this->collSProductPropertiesDatas = $collSProductPropertiesDatas;
        } else {
            if (null === $this->collSProductPropertiesDatas || null !== $criteria) {
                if ($this->isNew() && null === $this->collSProductPropertiesDatas) {
                    $this->initSProductPropertiesDatas();
                } else {
                    $collSProductPropertiesDatas = SProductPropertiesDataQuery::create(null, $criteria)
                            ->useSPropertiesQuery()
                            ->orderByPosition()
                            ->endUse()
                            ->filterByLocale($locale)
                            ->filterBySProperties($this);
                    if ($pid)
                        $collSProductPropertiesDatas = $collSProductPropertiesDatas->filterByProductId($pid);
                    $collSProductPropertiesDatas = $collSProductPropertiesDatas->find($con);
                    if (null !== $criteria) {
                        return $collSProductPropertiesDatas;
                    }
                    $this->collSProductPropertiesDatas = $collSProductPropertiesDatas;
                }
            }
        }
        return $this->collSProductPropertiesDatas;
    }

    public function rules() {
        return array(
            array(
                'field' => 'Name',
                'label' => $this->getLabel('Name'),
                'rules' => 'required',
            ),
            array(
                'field' => 'CsvName',
                'label' => $this->getLabel('CsvName'),
                'rules' => 'required|alpha',
            ),
        );
    }

    public function preSave() {
        // Save data as serialized string
        $data = $this->_dataToArray();
        if ($data) {
            $data = $this->encodeData($data);
            $this->setData(serialize($data));
        }
        else
            $this->setData('');

        return true;
    }

    /**
     * Create array from text.
     *
     * @access public
     * @return void
     */
    public function _dataToArray() {
        $data = trim($this->getData());

        if ($data) {
            $result = explode("\n", $data);
            if (count($result) > 0) {
                $result = array_map('trim', $result);
                $result = array_unique($result);
            }
            else
                return false;
        }

        if (count($result) > 0)
            return $result;
        else
            return false;
    }

    /**
     * Convert array back to string
     *
     * @access public
     * @return void
     */
    public function asText() {
        $data = $this->getData();

        if ($data != '') {
            $data = unserialize($data);
            $data = $this->decodeData($data);
            $data = implode("\n", $data);
        }

        return $data;
    }

    public function decodeData($data) {
        foreach ($data as $k => $v)
            $data[$k] = htmlspecialchars_decode($v);
        return $data;
    }

    public function encodeData($data) {
        foreach ($data as $k => $v)
            $data[$k] = htmlspecialchars($v);
        return $data;
    }

    public function asArray($locale = 'ru') {
        $this->setLocale($locale);
        if ($this->getData() != '') {
            return unserialize($this->getData());
        }
    }

    public function asArrayAll($locale = 'ru') {
        $this->setLocale($locale);
        if ($this->getData() != '') {
            return unserialize($this->getData());
        } else {
            return SProductPropertiesDataQuery::create()->select('Value')->distinct()->filterByPropertyId($this->getId())->find()->toArray();
        }
    }

    /**
     * Get the [name] column value.
     *
     * @return     string
     */
    public function getData() {
        return $this->getCurrentTranslation()->getData();
    }

    /**
     * Set the value of [name] column.
     *
     * @param      string $v new value
     * @return     SProperties The current object (for fluent API support)
     */
    public function setData($v) {
        $this->getCurrentTranslation()->setData($v);

        return $this;
    }

    /**
     * Populates the translatable object using an array.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return     void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME) {
        $peerName = get_class($this) . I18nPeer;
        $keys = $peerName::getFieldNames($keyType);
        if (array_key_exists('Locale', $arr)) {
            $this->setLocale($arr['Locale']);
            unset($arr['Locale']);
        } else {
            $defaultLanguage = getDefaultLanguage();
            $this->setLocale($defaultLanguage['identif']);
        }

        foreach ($keys as $key)
            if (array_key_exists($key, $arr)) {
                $methodName = set . $key;
                $this->$methodName($arr[$key]);
            }

        parent::fromArray($arr, $keyType);
    }

}

// SProperties
