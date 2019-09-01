<?php
namespace MageMaclean\Core\Plugin;

use Magento\Backend\Model\Menu\Builder\AbstractCommand;
use MageMaclean\Core\Helper\AbstractData;

class MoveMenu
{
    const MAGEMACLEAN_CORE = 'MageMaclean_Core::magemaclean';

    protected $helper;

    public function __construct(AbstractData $helper)
    {
        $this->helper = $helper;
    }

    public function afterExecute(AbstractCommand $subject, $itemParams)
    {
        if ($this->helper->getConfigGeneral('menu')) {
            if (strpos($itemParams['id'], 'MageMaclean_') !== false
                && isset($itemParams['parent'])
                && strpos($itemParams['parent'], 'MageMaclean_') === false) {
                $itemParams['parent'] = self::MAGEMACLEAN_CORE;
            }
        } elseif ((isset($itemParams['id']) && $itemParams['id'] === self::MAGEMACLEAN_CORE)
                || (isset($itemParams['parent']) && $itemParams['parent'] === self::MAGEMACLEAN_CORE)) {
            $itemParams['removed'] = true;
        }

        return $itemParams;
    }
}