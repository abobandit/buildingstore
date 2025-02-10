<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Imagick\Driver;
use Intervention\Image\Decoders\FilePathImageDecoder;

class ImageController extends Controller
{
    public function getResizedImage($path, $width, $height)
    {
        // Путь к изображению в public директории
        $filePath = public_path("upload/$path");

        // Проверяем наличие файла
        if (!file_exists($filePath)) {
            abort(404, 'Image not found');
        }
        $manager = new ImageManager(new Driver());
        // Загружаем изображение
        $image = $manager->read($filePath, FilePathImageDecoder::class);

        // Используем Intervention для изменения размера
        $resizedImage = $image->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio(); // Сохраняем пропорции
            $constraint->upsize(); // Избегаем увеличения маленьких изображений
        });
        $encoded = $resizedImage->encode();
        // Возвращаем изображение в ответе
        return $encoded; // Или другой формат
    }
}
