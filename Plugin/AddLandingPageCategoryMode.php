<?php

declare(strict_types=1);

namespace Jh\StoreConfigGraphQl\Plugin;

use Magento\Catalog\Model\Category\Attribute\Source\Mode;

class AddLandingPageCategoryMode
{
    public const DM_LANDING = 'LANDING';

    public function afterGetAllOptions(Mode $subject, array $result): array
    {
        $result[] = [
            'value' => self::DM_LANDING,
            'label' => __('Landing page')
        ];
        return $result;
    }
}
