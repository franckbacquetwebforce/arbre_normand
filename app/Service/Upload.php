<?php

namespace Service;

class Upload
{
  public function UploadProduct($file_tmp, $fileExtension, $endName)
  {
    $monUrl = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    // echo realpath();

      if(!is_dir("upload")) {
        mkdir("upload");
      }
      if(!is_dir("upload/".date('Y') )) {
        mkdir("upload/".date('Y'));
      }
      if(!is_dir("upload/".date('Y'). '/'.date('m') )) {
        mkdir("upload/".date('Y'). '/'.date('m'));
      }
  $dest_fichier = date('Y_m_d_H_i_s').$endName.$fileExtension;

  $generatedName = date('Y').'/'.date('m') . '/' . $dest_fichier;
    // ensure a safe filename
    if (move_uploaded_file($file_tmp,  'upload/'.$generatedName)) {
        return true;
    }
    // if (move_uploaded_file($file_tmp,  'upload/'.date('Y').'/'.date('m') . '/' . $dest_fichier)) {
    //     return true;
    // }
  return false;
  }

  public function getNewName($file_name, $endName)
  {
    $i_point = strrpos($file_name,'.');
    $fileExtension = substr($file_name, $i_point ,strlen($file_name) - $i_point);
    return date('Y_m_d_H_i_s').$endName.$fileExtension;
  }

  public function getPath()
  {
    return 'upload/'.date('Y').'/'.date('m') . '/';
  }






}
