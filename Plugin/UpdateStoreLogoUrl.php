<?php

declare(strict_types=1);

namespace Jh\StoreConfigGraphQl\Plugin;

use Magento\Config\Model\Config\Backend\Image\Logo;
use Magento\Framework\UrlInterface;
use Magento\StoreGraphQl\Model\Resolver\Store\StoreConfigDataProvider;

class UpdateStoreLogoUrl
{
    private UrlInterface $url;

    public function __construct(UrlInterface $url)
    {
        $this->url = $url;
    }

    public function afterGetStoreConfigData(StoreConfigDataProvider $subject, array $result)
    {
        if (isset($result['header_logo_src'])) {
            $mediaUrl = rtrim($this->url->getBaseUrl(['_type' => UrlInterface::URL_TYPE_MEDIA]), '/');
            $result['header_logo_src'] = $mediaUrl . '/' . Logo::UPLOAD_DIR . '/' . $result['header_logo_src'];
        }

        return $result;
    }
}
