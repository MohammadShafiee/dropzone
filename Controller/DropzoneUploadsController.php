<?php
App::uses('DropzoneAppController', 'Dropzone.Controller');
/**
 * DropzoneUploads Controller
 *
 */
class DropzoneUploadsController extends DropzoneAppController {

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Components->disable('Security');
    }
    public function admin_upload(){
        $this->autoRender = false;
        $response = array(
            'status' => 'success',
        );
        if ($this->request->is('post') || !empty($this->request->data)) {
            $this->loadModel('FileManager.Attachment');
            $this->Attachment->create();
            if ($this->Attachment->save($this->request->data)) {
                Croogo::dispatchEvent('Dropzone.DropzoneUploads.afterSuccessUpload', $this, array(
                    'attachmentId' => $this->Attachment->id
                ));
                $response['data'] = array(
                    'attachment_id' => $this->Attachment->id
                );
                echo json_encode($response);
                return;
            }
        }
        $response['status'] = 'error';
        echo json_encode($response);
        return;
    }
}
