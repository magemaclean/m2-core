<?php

namespace MageMaclean\Core\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;

class Marketplace extends Action
{
    const ADMIN_RESOURCE = 'MageMaclean_Core::marketplace';
    
    public function execute()
    {
        $this->_response->setRedirect(
            'https://magemaclean.com/magento-2/'
        );
    }
}
