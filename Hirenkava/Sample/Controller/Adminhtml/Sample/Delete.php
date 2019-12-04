<?php


namespace Hirenkava\Sample\Controller\Adminhtml\Sample;

class Delete extends \Hirenkava\Sample\Controller\Adminhtml\Sample
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('sample_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Hirenkava\Sample\Model\Sample::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Sample.'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['sample_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can\'t find a Sample to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
