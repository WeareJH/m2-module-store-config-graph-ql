<?php

declare(strict_types=1);

namespace Jh\StoreConfigGraphQl\Plugin;

use Magento\Config\Model\Config\Backend\Image\Logo;
use Magento\Framework\UrlInterface;
use Magento\StoreGraphQl\Model\Resolver\Store\StoreConfigDataProvider;

class MakeUspImageFullUrl
{
    private const USPS_UPLOAD_DIR = 'usps';

    private const USP_IMAGE_VARS = [
        'usp_1_image',
        'usp_2_image',
        'usp_3_image',
        'usp_4_image'
    ];

    private UrlInterface $url;

    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }

    public function afterGetStoreConfigData(StoreConfigDataProvider $subject, array $result)
    {
        foreach (self::USP_IMAGE_VARS as $var) {
            if (isset($result[$var])) {
                $mediaUrl = rtrim($this->url->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]), '/');
                $result[$var] = $mediaUrl . '/' . self::USPS_UPLOAD_DIR . '/' . $result[$var];
            }
        }

        return $result;
    }
}
