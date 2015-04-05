<?php namespace SimBlog\Http\Controllers\Util;

use Exception;
use Request;
use SimBlog\Http\Controllers\Controller;
use SimBlog\Utils\FileMessage;
use Validator;

class EditorFileUploadController extends Controller
{
    protected $savePath = '/upload';

    /**
     * Editor File Upload
     * @return string
     */
    public function image()
    {
        $message = new FileMessage();
        $file = $this->hasFile();
        if ($file != null && $this->fileCheck($file) == null) {
            $message = $this->fileSave($file);
        } else {
            $message->success = FileMessage::$UPFAIL;
            $message->message = $this->fileCheck($file);
        }
        return json_encode($message);
    }

    /**
     * Check File Has
     */
    protected function hasFile()
    {
        if (Request::hasFile('editormd-image-file')) {
            $file = Request::file('editormd-image-file');
            return $file;
        } else {
            return null;
        }
    }

    /**
     * Check File
     * @param $file
     * @return string
     */
    protected function fileCheck($file)
    {
        if ($file->isValid()) {
            $v = Validator::make(['file' => $file], array(
                'file' => 'max:2048|mimes:jpeg,bmp,png,jpg,gif,webp',
            ));
            if ($v->fails()) {
                return $v->messages()->first();
            }
        } else {
            return \Lang::get('fileUploadError');
        }
        return null;
    }

    /**
     * File Save
     * @param $file
     * @return FileMessage
     */
    protected function fileSave($file)
    {
        $message = new FileMessage();
        try {
            $extension = $file->getClientOriginalExtension();
            $fileName = md5_file($file) . "." . $extension;
            $destinationPath = \App::publicPath() . $this->savePath;
            $file->move($destinationPath, $fileName);
            $message->success = FileMessage::$UPUCCESS;
            $message->message = \Lang::get('file.fileSuccess');
            $message->url = $fileName = asset($this->savePath . '/' . $fileName);
            return $message;
        } catch (Exception $e) {
            \Log::error("Editor File Upload Error", $e);
            $message->success = FileMessage::$UPFAIL;
            $message->message = \Lang::get('file.fileSaveError');
            return $message;
        }
    }
}
