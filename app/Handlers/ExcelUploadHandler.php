<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/29
 * Time: 18:14
 */

namespace App\Handlers;


class ExcelUploadHandler
{

    public function save($file, $floder) {
        $extension = $file->getClientOriginalExtension();
        $base_path = 'uploads/excel/' .$floder . '/' .  date('Ym/d', time());
        $upload_path = public_path() . '/'. $base_path;
        $filename = time() . '_' . str_random(10) . '.' . $extension;

        $file->move($upload_path, $filename);

        return [
            'path' => $base_path . '/' . $filename,
        ];
    }

}