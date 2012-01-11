<?php
/**                                                                       
 * This file is part of the FIREGENTO project.
 * 
 * FireGento_GermanSetup is free software; you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License version 3 as 
 * published by the Free Software Foundation.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS 
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * 
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_GermanSetup
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 * @since     0.1.0
 */
/**
 * Block to retrieve data from imprint config.
 *
 * @category  FireGento
 * @package   FireGento_GermanSetup
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 * @since     0.1.0
 */
class FireGento_GermanSetup_Block_Imprint_Content extends Mage_Core_Block_Template
{
    /**
     * Set StoreId to get impressum data for this store.
     *
     * @param int $storeId Store id.
     *
     * @return void
     */
    public function setStoreId($storeId)
    {
        $this->setData(Mage::getStoreConfig('general/imprint', $storeId));
    }

    /**
     * Getting StoreId to get proper store related
     * information in order comments.
     *
     * @return int|null
     */
    protected function getStoreId()
    {
        $orderId = $this->getRequest()->getParam('order_id', 0);

        if ($orderId > 0) {
            return Mage::getSingleton('sales/order')->load($orderId)->getStoreId();
        }
        return null;
    }

    /**
     * Constructor to set config store view.
     */
    public function __construct()
    {
        $storeId = $this->getStoreId();
        $this->setData(Mage::getStoreConfig('general/imprint', $storeId));
    }
}