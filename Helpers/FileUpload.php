<?php

class FileUpload
{
    const MAX_FILE_SIZE = 50000;
    private string $target_dir;
    private array $accept_file_types = ['jpg', 'jpeg', 'png', 'gif'];
    private string $target_file;
    private array $file;

    public function __construct($file, $targetDir = "")
    {
        $this->file = $file;
        $this->target_dir = !empty($targetDir) ? $targetDir : "/Upload/images";
    }
    public function save()
    {
        if(!$this->checkValidFileType())
            return false;

        if(!$this->checkValidFileSize())
            return false;
        if($this->checkFileExist())
            return false;

        if(!move_uploaded_file($this->file['tmp_name'], base_app($this->getTargetFile())))
            return false;

        return chmod(base_app($this->getTargetFile()), 0644);
    }
    public function checkValidFileType(): bool
    {
        return in_array($this->getImageFileType(), $this->accept_file_types);
    }
    public function checkValidFileSize() : bool
    {
        return $this->file['size'] > FileUpload::MAX_FILE_SIZE;
    }
    public function checkFileExist() : bool
    {
        return file_exists($this->getTargetFile());
    }
    public function getImageFileType(): string
    {
        return strtolower(pathinfo($this->target_dir . $this->getBaseName() ,PATHINFO_EXTENSION));
    }
    public function setTargetFile($value) {
        $this->target_file = $value;
    }
    public function getTargetFile(): string
    {
        $this->setTargetFile($this->target_dir . "/" . date('dmY_hms_') . md5($this->getBaseName()) . "." . $this->getImageFileType());
        return $this->target_file;
    }
    public function getBaseName(): string
    {
        return basename($this->file['name']);
    }
}